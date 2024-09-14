<?php

namespace App\Controllers;

use GuzzleHttp\Client;
use App\Models\UserModel;
use App\Models\WithdrawModel;
use App\Controllers\BaseController;
use App\Models\UserPlanHistoryModel;
use Takuya\RandomString\RandomString;

class WithdrawController extends BaseController
{
    public function withdrawreq()
    {
        $withdraw_type = "manual";
        $deposit_mandatory = true;
        $min_wd = 10.00000000; // minimum withdrawal
        $id_user = session()->get('user_data')['id'];   // get id user
        $balance = $this->user_model->where('id', $id_user)->get()->getFirstRow()->earning_balance; // current balance
        $amount = $this->request->getPost('amount');
        $randomize = (new RandomString())->gen(12, RandomString::ALPHA_NUM | RandomString::LOWER);

        $plan_available = new UserPlanHistoryModel();
        $check_avaiblity = $plan_available
            ->where('user_id', $id_user)
            ->where('plan_id !=', 1)
            ->get()
            ->getRow();

        // Run this code when deposit needed for withdraw
        if($deposit_mandatory == true){

            // check deposit plan is available, this mean user make a deposit active
            if($check_avaiblity ==! 1){
                session()->setFlashdata('payout', 'free_plan');
                return redirect()->to('withdraw');
            }

            // if amount lowest from minimum
            if($amount <= $min_wd){
                session()->setFlashdata('payout', 'payout_minimum');
                return redirect()->to('withdraw');
            }

            // check minimum withdrawal
            if($balance >= $min_wd && $amount >= $min_wd){
                switch ($withdraw_type) {
                    case 'faucetpay':
                        break;
                    case 'ccpayment':
                        $this->ccpayment($id_user, $amount, $randomize);
                        break;
                    default:
                        $this->manual($id_user, $amount);
                        break;
                }

                session()->setFlashdata('payout', 'payout_ok');
                return redirect()->to('withdraw');
            }else{
                session()->setFlashdata('payout', 'payout_failed');
                return redirect()->to('withdraw');
            }
        }else{
            if($balance >= $min_wd){
                switch ($withdraw_type) {
                    case 'faucetpay':
                        break;
                    case 'ccpayment':
                        $this->ccpayment($id_user, $amount, $randomize);
                        break;
                    default:
                        $this->manual($id_user, $amount);
                        break;
                }
                session()->setFlashdata('payout', 'payout_ok');
                return redirect()->to('withdraw');
            }else{
                session()->setFlashdata('payout', 'payout_failed');
                return redirect()->to('withdraw');
            }
        }
    }

    public function ccpayment(int $id, $sum_wd, string $rand){
        // Initiall class
        $user_model = new UserModel();
        $withdraw_model = new WithdrawModel();

        $user = $user_model->where('id', $id)->get()->getFirstRow(); // find user

        $app_id = "OjuEsrv33924OwLH";
        $app_secret = "9e1e0fa9388253bd77f23a86c472645d";
        $url = "https://ccpayment.com/ccpayment/v2/applyAppWithdrawToNetwork";

        $content = [
            "coinId"=> 1482,
            "address" => $user->user_wallet,
            "orderId"=> $rand,
            "chain"=> "TRX",
            "amount"=> (string)$sum_wd,
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
        json_decode($response->getBody(), true);

        // update balance for user request
        $newBalance = $user->balance - $sum_wd;
        $user_model->update($user->id, [
            'earning_balance' => $newBalance,
        ]);

        // create record withdrawal with pending status
        $wd_request = [
            'user_id' => $id,
            'sum_withdraw' => $sum_wd,
            'hash_tx' => $content['orderId'],
            'status' => 'pending'
        ];
        $withdraw_model->insert($wd_request);
    }

    public function manual(int $id, $amount)
    {
        // Initiall class
        $user_model = new UserModel();
        $withdraw_model = new WithdrawModel();

        $user = $user_model->where('id', $id)->get()->getFirstRow(); // find user

        // update balance for user request
        $newBalance = $user->earning_balance - $amount;
        $user_model->update($user->id, [
            'earning_balance' => $newBalance,
        ]);

        // create record withdrawal with pending status
        $wd_request = [
            'user_id' => $id,
            'sum_withdraw' => $amount,
            'hash_tx' => null,
            'status' => 'pending'
        ];
        $withdraw_model->insert($wd_request);
    }
}
