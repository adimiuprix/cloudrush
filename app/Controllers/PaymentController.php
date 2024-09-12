<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DepositModel;
use App\Models\PlanModel;
use App\Models\UserPlanHistoryModel;
use Takuya\RandomString\RandomString;
use GuzzleHttp\Client;

class PaymentController extends BaseController
{
    public function buyplan(){
        $deposit_type = 'manual';
        $session = (object)session()->get('user_data');
        $request = \Config\Services::request();
        $plan_id = $request->getPost('plan');

        $plan_model = new PlanModel();
        $randomize = new RandomString();

        // Get plan id
        $get_plan = $plan_model->where('id', $plan_id)->get()->getRow();

        // Run deposit methods
        switch ($deposit_type) {
            case 'faucetpay':
                $this->faucetpay();
                break;
            default:
                $this->manual($session->id, $plan_id, $get_plan->price, $randomize->gen(12, RandomString::ALPHA_NUM | RandomString::LOWER));
            break;
        }

        return redirect()->to('payment');
    }

    public function payment()
    {
        $data = array_merge([
            'address' => 'DT2XM8APUaz8nTusB8p6iVhJg4Xm7AtxgJ',
        ], $this->web_data);

        return view('user/payment', $data);
    }

    // Manual Payments
    public function manual(int $id, int $plan_id, float $amount, string $rand)
    {
        $deposit_model = new DepositModel();
        $user_plan_history_model = new UserPlanHistoryModel();

        $create_deposit_plan = [
            'user_id' => $id,
            'plan_id' => $plan_id,
            'sum_deposit' => $amount,
            'status' => 'pending',
            'hash_tx' => $rand
        ];
        $deposit_model->insert($create_deposit_plan);

        $purchase_plan = [
            'user_id' => $id,
            'plan_id' => $plan_id,
            'status' => 'inactive',
        ];
        $user_plan_history_model->save($purchase_plan);
    }

    public function faucetpay(){
        $params = [
            'merchant_username' => 'MERCHANT_NAME',
            'item_description' => 'ITEM_DESCRPTION',
            'amount1' => 'AMOUNT1',
            'currency1' => 'USD',
            'currency2' => 'TRX',
            'custom' => 'ORDER_ID',
            'callback_url' => 'CALLBACK_URL',
            'success_url' => 'SUCCESS_URL',
            'cancel_url' => 'CANCEL_URL'
        ];
        $client = new Client();
        $response = $client->post('https://faucetpay.io/merchant/webscr', [
            'form_params' => $params,
        ]);
    }

    public function ccpayment(){
        $app_id = "*** your app_id ***";
        $app_secret = "*** your app_secret ***";
        $url = "*** your_url ***";

        $content = [
            "coinId"  => 1280,
            "price"   => "1",
            "orderId" => "testorderid111133",
            "chain"   => "POLYGON"
        ];

        $timestamp = time();
        $body = json_encode($content);
        $sign_text = $app_id . $timestamp;

        if (strlen($body) != 2) {
            $sign_text .= $body;
        } else {
            $body = "";
        }

        $server_sign = hash_hmac('sha256', $sign_text, $app_secret);

        $client = new Client();
        try {
            $response = $client->post($url, [
                'headers' => [
                    'Content-Type' => 'application/json;charset=utf-8',
                    'Appid'        => $app_id,
                    'Sign'         => $server_sign,
                    'Timestamp'    => $timestamp,
                ],
                'body' => $body,
            ]);

            $result = json_decode($response->getBody(), true);
            return $this->response->setJSON($result);

        } catch (\Exception $e) {
            return $this->response->setJSON(['error' => $e->getMessage()]);
        }
    }

}
