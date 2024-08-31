<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PaymentController extends BaseController
{
    public function payment()
    {
        return view('user/payment', $this->web_data);
    }
}
