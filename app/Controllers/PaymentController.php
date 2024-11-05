<?php

namespace App\Controllers;

use GuzzleHttp\Client;
use App\Models\PlanModel;
use CodeIgniter\HTTP\URI;
use App\Models\DepositModel;
use App\Controllers\BaseController;
use App\Models\UserPlanHistoryModel;
use Takuya\RandomString\RandomString;
use App\Models\SettingModel;
use App\Models\CcpaymentModel;

class PaymentController extends BaseController
{
    protected $setting;
    protected $ccpayments;

    public function __construct()
    {
        $this->setting = (new SettingModel())->first();
        $this->ccpayments = (new CcpaymentModel())->first();
    }

    public function buyplan(){
        $deposit_type = $this->setting['deposit_method'];
        $session = (object)session()->get('user_data');
        $request = \Config\Services::request();
        $plan_id = $request->getPost('plan');

        $plan_model = new PlanModel();
        $randomize = (new RandomString())->gen(12, RandomString::ALPHA_NUM | RandomString::LOWER);

        // Get plan id
        $get_plan = $plan_model->where('id', $plan_id)->get()->getRow();

        // Run deposit methods
        switch ($deposit_type) {
            case 'faucetpay':
                $this->faucetpay();
                break;
            case 'ccpayments':
                $this->ccpayment($session->id, $plan_id, $get_plan->price, $randomize);
                break;
            default:
                $this->manual($session->id, $plan_id, $get_plan->price, $randomize);
            break;
        }

        return redirect()->to('purchase-plan?pay=' . $randomize);
    }

    public function ccpayment(int $id, int $p_id, float $price, string $rand)
    {
        $ccpayment = $this->db->table('ccpayments')->get()->getFirstRow();
        $app_id = $ccpayment->app_id;
        $app_secret = $ccpayment->app_secret;
        $url = "https://ccpayment.com/ccpayment/v2/createAppOrderDepositAddress";

        $content = [
            "coinId"=> $ccpayment->coin_id,
            "price"=> (string)$price,
            "orderId"=> $rand,
            "chain"=> $ccpayment->chain
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
            'plan_id' => $p_id,
            'sum_deposit' => $price,
            'address' => $result['data']['address'],
            'status' => 'pending',
            'hash_tx' => $content['orderId']
        ];
        $deposit_model->insert($create_deposit_plan);
    }

    public function purchase_api()
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
            'address' => '',
        ], $this->web_data);

        return view('user/payment', $data);
    }

    public function faucetpay(){
        $baseUrl = 'https://faucetpay.io/merchant/webscr';
        $params = [
            'merchant_username' => 'popcet',
            'item_description'  => 'Buy plan on sakahayanginfo',
            'amount1'           => 2,
            'currency1'         => 'TRX',
        ];

        $uri = new URI($baseUrl);
        $uri->setQuery(http_build_query($params));
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
            'address' => 'DT2XM8APUaz8nTusB8p6iVhJg4Xm7AtxgJ',
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
