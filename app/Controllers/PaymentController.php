<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DepositModel;
use App\Models\PlanModel;
use App\Models\UserPlanHistoryModel;
use Takuya\RandomString\RandomString;

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

    }
}
