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
        $deposit_type = 'ccpayment';
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
            case 'ccpayment':
                $this->ccpayment($session->id, $plan_id, $get_plan->price, $randomize->gen(12, RandomString::ALPHA_NUM | RandomString::LOWER));
                break;
            default:
                $this->manual($session->id, $plan_id, $get_plan->price, $randomize->gen(12, RandomString::ALPHA_NUM | RandomString::LOWER));
            break;
        }

        return redirect()->to('payment');
    }

    public function ccpayment(int $id, int $plan_id, float $amount, string $rand){
        $app_id = "OjuEsrv33924OwLH";
        $app_secret = "9e1e0fa9388253bd77f23a86c472645d";
        $url = "https://ccpayment.com/ccpayment/v2/createAppOrderDepositAddress";

        $content = [
            "coinId"=> 1482,
            "price"=> "1",
            "orderId"=> $rand,
            "chain"=> "TRX"
        ];

        $timestamp = time();
        $body = json_encode($content);

        $signText = $app_id . $timestamp;
        if (strlen($body) !== 2) {
            $signText .= $body;
        }

        $serverSign = hash_hmac('sha256', $signText, $app_secret);

        $headers = [
            'Content-Type' => 'application/json;charset=utf-8',
            'Appid' => $app_id,
            'Sign' => $serverSign,
            'Timestamp' => $timestamp,
        ];

        $client = new Client();

        $response = $client->post($url, [
            'headers' => $headers,
            'body' => $body,
        ]);
        $result = json_decode($response->getBody(), true);

        $deposit_model = new DepositModel();

        $create_deposit_plan = [
            'user_id' => $id,
            'plan_id' => $plan_id,
            'sum_deposit' => $amount,
            'address' => $result['data']['address'],
            'status' => 'pending',
            'hash_tx' => $content['orderId']
        ];
        $deposit_model->insert($create_deposit_plan);

        return redirect()->to('purchase-plan?pay=' . $content['orderId']);
    }

    public function purchase_api($data)
    {
        $payCode = $this->request->getGet('pay');
        $payment_model = (new DepositModel())->where('hash_tx', $payCode)->get()->getRow();

        $data = array_merge([
            'address' => $payment_model->address,
            'amount' => $payment_model->sum_deposit
        ], $this->web_data);

        return view('user/payment', $data);
    }

    public function payment()
    {
        $data = array_merge([
            'address' => 'DT2XM8APUaz8nTusB8p6iVhJg4Xm7AtxgJ',
        ], $this->web_data);

        return view('user/payment', $data);
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
    
    public function ccpaylist(){
        $app_id = "OjuEsrv33924OwLH";
        $app_secret = "9e1e0fa9388253bd77f23a86c472645d";
        $url = "https://ccpayment.com/ccpayment/v2/getCoinList";
        $content = array();
    
        $timestamp = time();
        $body = json_encode($content);
        $sign_text = $app_id . $timestamp;

        if (strlen($body) != 2) {
            $sign_text = $sign_text . $body;
        } else {
            $body = "";
        }
    
        $server_sign = hash_hmac('sha256', $sign_text, $app_secret);
    
        $data = array(
            "headers" => array(
                "Content-Type: application/json;charset=utf-8",
                "Appid: " . $app_id,
                "Sign: " . $server_sign,
                "Timestamp: " . $timestamp
            ), "body" => $body
        );
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data['body']);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $data['headers']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
        $response = curl_exec($ch);
        curl_close($ch);
    
    }
}
