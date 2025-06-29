<?php

namespace App\Controllers\WebhookResolver;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\I18n\Time;
use App\Models\{DepositModel, PlanModel, UserPlanHistoryModel};
use Exception;

class CcpaymentResolver extends BaseController
{
    use ResponseTrait;

    public function resolver(): ResponseInterface
    {
        $validation = $this->verifyRequest();

        if ($validation instanceof ResponseInterface) {
            return $validation;
        }

        [, , $parsedBody] = $validation;

        $type = $parsedBody['type'] ?? null;

        return match ($type) {
            'ActivateWebhookURL' => $this->respond(['msg' => 'success']),
            'ApiDeposit'        => $this->handleApiDeposits($parsedBody),
            default             => $this->fail("Invalid type: Expected 'ActivateWebhookURL', but got '" . ($type ?? 'undefined') . "'", 400),
        };
    }

    private function handleApiDeposits(array $data): ResponseInterface
    {
        $depositModel = new DepositModel();
        $planModel = new PlanModel();

        $status = $data['msg']['status'] ?? null;      // 'Processing', 'Success', 'Failed'
        $hashId = $data['msg']['orderId'] ?? null;     // from Api

        if (!$hashId || !$status) {
            return $this->response->setStatusCode(400)->setBody('Missing data');
        }

        $order = $depositModel->where('hash_tx', $hashId)->first();
        if (!$order) {
            return $this->response->setStatusCode(404)->setBody('Deposit order not found');
        }

        return match ($status) {
            'Processing'    => $this->depositProcess($order['id'], 'processing'),
            'Success'       => $this->depositSuccess($depositModel, $planModel, $order, $hashId),
            'Failed'        => $this->response->setStatusCode(200)->setHeader('Content-Type', 'text/plain; charset=utf-8')->setBody('Success'),
        };
    }

    private function depositProcess(int|string $id, string $state): ResponseInterface
    {
        $deposit = model(DepositModel::class);
        $deposit->update($id, ['status' => $state]);

        return $this->response->setStatusCode(200)->setBody('Deposit order not found');
    }

    private function depositSuccess(DepositModel $depositModel, PlanModel $planModel, array $order, string $hashId): ResponseInterface
    {
        $depositModel->where('hash_tx', $order['hash_tx'])->set(['status' => 'paid'])->update();
        $plan = $planModel->asObject()->find($order['plan_id']);
        $expire = Time::now()->addDays($plan->duration ?? 0)->toDateTimeString();

        model(UserPlanHistoryModel::class)->where('hash_tx', $hashId)->set([
            'status'      => 'active',
            'last_sum'    => time(),
            'expire_date' => $expire,
        ])->update();

        $upline = $this->getUplineByHash($hashId);
        if ($upline) {
            $this->db->table('users')->where('id', $upline->id)->set([
                'upline_reward' => $upline->upline_reward + 1.00000000,
                'earning_balance' => $upline->earning_balance + 1.00000000,
            ])->update();
        };

        return $this->response
            ->setStatusCode(200)
            ->setHeader('Content-Type', 'text/plain; charset=utf-8')
            ->setBody('Success');
    }

    private function verifyRequest(): array|ResponseInterface
    {
        $ccpayment = $this->db->table('ccpayments')->get()->getFirstRow();

        $request  = $this->request;
        $appId    = $request->getHeaderLine('Appid');
        $sign     = $request->getHeaderLine('Sign');
        $timestampRaw = $request->getHeaderLine('Timestamp');

        if ($appId !== $ccpayment->app_id) {
            return $this->failUnauthorized('Invalid AppId');
        }

        try {
            $timestamp = intval($timestampRaw);
            if (abs(time() - $timestamp) > 300) {
                return $this->failUnauthorized('The timestamp is invalid or has expired');
            }
        } catch (Exception $e) {
            return $this->fail('Invalid timestamp format', 400);
        }

        $body = $request->getBody();
        $signText = $appId . $timestamp . $body;
        $expectedSign = hash_hmac('sha256', $signText, $ccpayment->app_secret);

        if ($sign !== $expectedSign) {
            return $this->fail('Invalid signature', 402);
        }

        $parsedBody = json_decode($body, true);
        if (!is_array($parsedBody)) {
            return $this->fail('Invalid JSON format', 400);
        }

        return [$timestamp, $body, $parsedBody];
    }

    function getUplineByHash(string $hash): ?object
    {
        $userId = $this->db->table('deposit_histories')
            ->select('user_id')
            ->where('hash_tx', $hash)
            ->get()
            ->getRow('user_id');
    
        if (!$userId) {
            return null;
        }
    
        $reffBy = $this->db->table('users')
            ->select('reff_by')
            ->where('id', $userId)
            ->get()
            ->getRow('reff_by');
    
        if (!$reffBy || $reffBy === '0') {
            return null;
        }
    
        return $this->db->table('users')
            ->where('id', $reffBy)
            ->get()
            ->getRow();
    }
}
