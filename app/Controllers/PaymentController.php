<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DepositModel;

class PaymentController extends BaseController
{
    public function buyplan(){
        $user_id = (object)session()->get('user_data');
        $request = \Config\Services::request();

        $plan_id = $request->getPost('plan');

        return redirect()->to('payment');
    }

    public function payment()
    {
        return view('user/payment', $this->web_data);
    }
}
