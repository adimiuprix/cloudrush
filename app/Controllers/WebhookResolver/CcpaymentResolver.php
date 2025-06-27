<?php

namespace App\Controllers\WebhookResolver;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\I18n\Time;
use App\Models\{DepositModel, PlanModel, UserModel, UserPlanHistoryModel, WithdrawModel};
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
            'ApiWithdrawal'     => $this->handleApiWithdrawals($parsedBody),
            default             => $this->fail("Invalid type: Expected 'ActivateWebhookURL', but got '" . ($type ?? 'undefined') . "'", 400),
        };
    }

    private function handleApiDeposits(array $data): ResponseInterface
    {
        $depositModel = new DepositModel();
        $planModel = new PlanModel();
        $historyModel = new UserPlanHistoryModel();

        $status = $data['msg']['status'] ?? null;
        $orderId = $data['msg']['orderId'] ?? null;
        if (!$orderId || !$status) {
            return $this->response->setStatusCode(400)->setBody('Missing data');
        }

        $order = $depositModel->where('hash_tx', $orderId)->first();
        if (!$order) {
            return $this->response->setStatusCode(404)->setBody('Deposit order not found');
        }

        return match ($status) {
            'Processing' => $this->updateStatus($depositModel, $order['id'], 'processing'),
            'Success'   => $this->processDepositSuccess($depositModel, $planModel, $historyModel, $order),
            default     => $this->response->setStatusCode(200)->setBody('Ignored'),
        };
    }

    private function processDepositSuccess(DepositModel $depositModel, PlanModel $planModel, array $order): ResponseInterface
    {
        $depositModel->update($order['id'], ['status' => 'paid']);

        $plan = $planModel->asObject()->find($order['plan_id']);
        $expire = Time::now()->addDays($plan->duration ?? 0)->toDateTimeString();

        model(UserPlanHistoryModel::class)->insert([
            'user_id'     => $order['user_id'],
            'plan_id'     => $order['plan_id'],
            'status'      => 'active',
            'last_sum'    => time(),
            'expire_date' => $expire,

        ]);

        return $this->response->setStatusCode(200)->setBody('Success');
    }

    private function handleApiWithdrawals(array $data): ResponseInterface
    {
        $withdrawModel = new WithdrawModel();
        $userModel = new UserModel();

        $status = $data['msg']['status'] ?? null;
        $orderId = $data['msg']['orderId'] ?? null;
        if (!$orderId || !$status) {
            return $this->response->setStatusCode(400)->setBody('Missing data');
        }

        $order = $withdrawModel->where('hash_tx', $orderId)->first();
        if (!$order) {
            return $this->response->setStatusCode(404)->setBody('Withdrawal order not found');
        }

        return match ($status) {
            'Processing' => $this->updateStatus($withdrawModel, $order['id'], 'pending'),
            'Success'    => $this->updateStatus($withdrawModel, $order['id'], 'paid'),
            'Failed'     => $this->handleWithdrawFail($withdrawModel, $userModel, $order),
            default      => $this->response->setStatusCode(200)->setBody('Ignored'),
        };
    }

    private function handleWithdrawFail(WithdrawModel $withdrawModel, UserModel $userModel, array $order): ResponseInterface
    {
        $withdrawModel->update($order['id'], ['status' => 'fail']);

        $user = $userModel->find($order['user_id']);
        if ($user) {
            $userModel->update($user['id'], [
                'balance' => (float) $user['balance'] + (float) $order['sum_withdraw']
            ]);
        }

        return $this->response->setStatusCode(200)->setBody('Withdrawal failed, balance refunded');
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

    private function updateStatus($model, int|string $id, string $status): ResponseInterface
    {
        $model->update($id, ['status' => $status]);
        return $this->response->setStatusCode(200)->setBody('Updated');
    }

}
