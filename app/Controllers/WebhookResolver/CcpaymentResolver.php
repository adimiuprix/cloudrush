<?php

namespace App\Controllers\WebhookResolver;

use App\Controllers\BaseController;
use App\Models\{DepositModel, PlanModel, UserModel, UserPlanHistoryModel, WithdrawModel};
use App\Controllers\WebhookResolver\ApiHook;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;

class CcpaymentResolver extends BaseController
{
    public function resolver(): ResponseInterface
    {
        $hook = ApiHook::getAppIdSecret();
        $timestamp = $this->request->getHeaderLine('Timestamp');
        $signature = $this->request->getHeaderLine('Sign');

        $payload = json_decode($this->request->getBody(), true);

        if (!$this->verifySignature($payload, $signature, $hook['app_id'], $hook['app_secret'], $timestamp)) {
            return $this->response->setStatusCode(401)->setBody('Invalid signature');
        }

        $type     = $payload['type'] ?? null;
        $msg      = $payload['msg'] ?? [];
        $status   = $msg['status'] ?? null;
        $orderId  = $msg['orderId'] ?? null;

        if (!$orderId || !$status) {
            return $this->response->setStatusCode(400)->setBody('Missing data');
        }

        return match ($type) {
            'ApiDeposit'    => $this->handleDeposit($orderId, $status),
            'ApiWithdrawal' => $this->handleWithdrawal($orderId, $status),
            default         => $this->response->setStatusCode(400)->setBody('Unknown type')
        };
    }

    private function handleDeposit(string $orderId, string $status): ResponseInterface
    {
        $depositModel = new DepositModel();
        $planModel = new PlanModel();
        $historyModel = new UserPlanHistoryModel();

        $order = $depositModel->where('hash_tx', $orderId)->first();
        if (!$order) {
            return $this->response->setStatusCode(404)->setBody('Deposit order not found');
        }

        return match ($status) {
            'Procesing' => $this->updateStatus($depositModel, $order['id'], 'processing'),
            'Success'   => $this->processDepositSuccess($depositModel, $planModel, $historyModel, $order),
            default     => $this->response->setStatusCode(200)->setBody('Ignored'),
        };
    }

    private function processDepositSuccess(DepositModel $depositModel, PlanModel $planModel, UserPlanHistoryModel $historyModel, array $order): ResponseInterface
    {
        $depositModel->update($order['id'], ['status' => 'paid']);

        $plan = $planModel->asObject()->find($order['plan_id']);
        $expire = Time::now()->addDays($plan->duration ?? 0)->toDateTimeString();

        $historyModel->insert([
            'user_id'     => $order['user_id'],
            'plan_id'     => $order['plan_id'],
            'status'      => 'active',
            'last_sum'    => time(),
            'expire_date' => $expire,
        ]);

        return $this->response->setStatusCode(200)->setBody('Deposit success');
    }

    private function handleWithdrawal(string $orderId, string $status): ResponseInterface
    {
        $withdrawModel = new WithdrawModel();
        $userModel = new UserModel();

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
                'balance' => $user['balance'] + $order['sum_withdraw']
            ]);
        }

        return $this->response->setStatusCode(200)->setBody('Withdrawal failed, balance refunded');
    }

    private function updateStatus($model, int|string $id, string $status): ResponseInterface
    {
        $model->update($id, ['status' => $status]);
        return $this->response->setStatusCode(200)->setBody('Updated');
    }

    private function verifySignature(array $content, string $signature, string $appId, string $secret, string $timestamp): bool
    {
        $signText = $appId . $timestamp . json_encode($content, JSON_UNESCAPED_UNICODE);
        $expected = hash_hmac('sha256', $signText, $secret);
        return $signature === $expected;
    }
}
