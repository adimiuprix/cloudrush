<?php

namespace App\Controllers\WebhookResolver;

use CodeIgniter\I18n\Time;
use CodeIgniter\HTTP\Response;
use App\Controllers\BaseController;
use App\Models\PlanModel;
use App\Models\DepositModel;
use App\Models\UserModel;
use App\Models\UserPlanHistoryModel;
use App\Models\WithdrawModel;

use App\Controllers\WebhookResolver\ApiHook;

class CcpaymentResolver extends BaseController
{
    public function resolver()
    {
        $apihook = ApiHook::getAppIdSecret();
        $app_id = $apihook['app_id'];
        $app_secret = $apihook['app_secret'];
    
        $timestamp = $this->request->getHeaderLine('Timestamp');
        $sign = $this->request->getHeaderLine('Sign');
        $sign_text = json_decode($this->request->getBody(), true);
    
        if (!$this->verifySignature($sign_text, $sign, $app_id, $app_secret, $timestamp)) {
            return $this->response->setStatusCode(Response::HTTP_UNAUTHORIZED)->setBody('Invalid signature');
        }
    
        $status = $sign_text['msg']['status'] ?? null;
        $orderId = $sign_text['msg']['orderId'] ?? null;
        $type = $sign_text['type'] ?? null;
    
        if (!$orderId || !$status) {
            return $this->response->setStatusCode(Response::HTTP_BAD_REQUEST)->setBody('Missing data');
        }
    
        if ($type === 'ApiDeposit') {
            $deposit_model = new DepositModel();
            $plan_model = new PlanModel();
            $user_plan_history_model = new UserPlanHistoryModel();
    
            $order = $deposit_model->where('hash_tx', $orderId)->first();
            if (!$order) {
                return $this->response->setStatusCode(Response::HTTP_NOT_FOUND)->setBody('Deposit order not found');
            }
    
            switch ($status) {
                case 'Procesing':
                    $deposit_model->update($order['id'], ['status' => 'processing']);
                    break;
    
                case 'Success':
                    $deposit_model->update($order['id'], ['status' => 'paid']);
    
                    $plan_user = $plan_model->asObject()->where('id', $order['plan_id'])->first();
                    $duration = $plan_user->duration ?? 0;
                    $exp_plan = Time::now()->addDays($duration)->toDateTimeString();
    
                    $user_plan_history_model->insert([
                        'user_id' => $order['user_id'],
                        'plan_id' => $order['plan_id'],
                        'status' => 'active',
                        'last_sum' => time(),
                        'expire_date' => $exp_plan,
                    ]);
                    break;
            }
        }
    
        if ($type === 'ApiWithdrawal') {
            $withdraw_model = new WithdrawModel();
            $user_model = new UserModel();
    
            $order = $withdraw_model->where('hash_tx', $orderId)->first();
            if (!$order) {
                return $this->response->setStatusCode(Response::HTTP_NOT_FOUND)->setBody('Withdrawal order not found');
            }
    
            switch ($status) {
                case 'Processing':
                    $withdraw_model->update($order['id'], ['status' => 'pending']);
                    break;
    
                case 'Success':
                    $withdraw_model->update($order['id'], ['status' => 'paid']);
                    break;
    
                case 'Failed':
                    $withdraw_model->update($order['id'], ['status' => 'fail']);
    
                    $user = $user_model->find($order['user_id']);
                    if ($user) {
                        $newBalance = $user['balance'] + $order['sum_withdraw'];
                        $user_model->update($user['id'], ['balance' => $newBalance]);
                    }
                    break;
            }
        }
    
        return $this->response->setStatusCode(Response::HTTP_OK)->setBody('success');
    }

    private function verifySignature($content, $signature, $app_id, $app_secret, $timestamp)
    {
        $sign_text = $app_id . $timestamp . json_encode($content, JSON_UNESCAPED_UNICODE);
        $server_sign = hash_hmac('sha256', $sign_text, $app_secret);
        return $signature === $server_sign;
    }
}

// $filePath = WRITEPATH . 'data.json';
// file_put_contents($filePath, json_decode($order['sum_withdraw'], JSON_PRETTY_PRINT));

// {
//     "type": "ApiDeposit",
//     "msg": {
//       "recordId": "20240313121919...",
//       "orderId": "202403131218361...",
//       "coinId": 1329,
//       "coinSymbol": "MATIC",
//       "status": "Success"
//     }
//   }