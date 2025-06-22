<?php

namespace App\Controllers\WebhookResolver;
use App\Controllers\WebhookResolver\ApiHook;
use CodeIgniter\HTTP\Response;
use CodeIgniter\I18n\Time;
use App\Models\PlanModel;
use App\Models\DepositModel;
use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\UserPlanHistoryModel;
use App\Models\WithdrawModel;

class CcpaymentResolver extends BaseController
{
    public function resolver()
    {
        $apihook = ApiHook::getAppIdSecret();
        $app_id = $apihook['app_id'];
        $app_secret = $apihook['app_secret'];

        $timestamp = $this->request->getHeaderLine('Timestamp');
        $sign = $this->request->getHeaderLine('Sign');
        $sign_text = $this->request->getBody();

        if ($this->verifySignature($sign_text, $sign, $app_id, $app_secret, $timestamp)) {
                
            $data = $this->request->getJSON(true);
            $type = $data['type'];
            $orderId = $data['msg']['orderId'];
            $status = $data['msg']['status'];

            $deposit_model = new DepositModel();
            $user_plan_history_model = new UserPlanHistoryModel();
            $plan_model = new PlanModel();
            $withdraw_model = new WithdrawModel();
            $user_model = new UserModel();

            if($type == 'ApiDeposit'){
                switch ($status) {
                    case 'Procesing':
                        $order = $deposit_model->where('hash_tx', $orderId)->first();
                        $deposit_model->update($order['id'], ['status' => 'processing']);
                    break;
                    case 'Success':
                        $order = $deposit_model->where('hash_tx', $orderId)->first();
                        $deposit_model->update($order['id'], ['status' => 'paid']);
                        $plan_user = $plan_model->asObject()->where('id', $order['plan_id'])->first();
                        $duration = $plan_user->duration;
                        $exp_plan = Time::now()->addDays($duration)->toDateTimeString();

                        $new_plan = [
                            'user_id' => $order['id'],
                            'plan_id' => $order['plan_id'],
                            'status' => 'active',
                            'last_sum' => time(),
                            'expire_date' => $exp_plan,
                        ];
                        $user_plan_history_model->insert($new_plan);
                    break;
                }
            }

            if($type == 'ApiWithdrawal'){
                switch($status){
                    case 'Processing':
                        $order = $withdraw_model->where('hash_tx', $orderId)->first();
                        $withdraw_model->update($order['user_id'], ['status' => 'pending']);
                    break;
                    case 'Success':
                        $order = $withdraw_model->where('hash_tx', $orderId)->first();
                        $withdraw_model->update($order['user_id'], ['status' => 'paid']);
                    break;
                    case 'Failed':
                        $order = $withdraw_model->where('hash_tx', $orderId)->first();
                        $withdraw_model->update($order['user_id'], ['status' => 'fail']);

                        $user = $user_model->where('id', $order['user_id'])->get()->getFirstRow(); // find user

                        // return balance for user request
                        $newBalance = $user->balance + $order['sum_withdraw'];
                        $user_model->update($user->id, [
                            'balance' => $newBalance,
                        ]);
                    break;
                }
            }

            return $this->response->setStatusCode(Response::HTTP_OK)->setBody('success');
        } else {
            return $this->response->setStatusCode(Response::HTTP_UNAUTHORIZED)->setBody('Invalid signature');
        }
    }

    private function verifySignature($content, $signature, $app_id, $app_secret, $timestamp)
    {
        $sign_text = $app_id . $timestamp . $content;
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