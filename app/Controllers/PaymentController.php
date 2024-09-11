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
        $session = (object)session()->get('user_data');
        $request = \Config\Services::request();
        $plan_id = $request->getPost('plan');

        $deposit_model = new DepositModel();
        $plan_model = new PlanModel();
        $user_plan_history_model = new UserPlanHistoryModel();
        $randomize = new RandomString();

        $get_plan = $plan_model->where('id', $plan_id)->get()->getRow();

        $create_deposit_plan = [
            'user_id' => $session->id,
            'plan_id' => $plan_id,
            'sum_deposit' => (string) $get_plan->price,
            'status' => 'pending',
            'hash_tx' => $randomize->gen(12,RandomString::ALPHA_NUM | RandomString::LOWER)
        ];
        $deposit_model->insert($create_deposit_plan);

        $purchase_plan = [
            'user_id' => $session->id,
            'plan_id' => $plan_id,
            'status' => 'inactive',
        ];
        $user_plan_history_model->save($purchase_plan);

        return redirect()->to('payment');
    }

    public function payment()
    {
        $data = array_merge([
            'address' => 'DT2XM8APUaz8nTusB8p6iVhJg4Xm7AtxgJ',
        ], $this->web_data);

        return view('user/payment', $data);
    }
}
