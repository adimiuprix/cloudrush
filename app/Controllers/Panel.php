<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Panel extends BaseController
{
    public function account()
    {
        return view('user/account');
    }

    public function surf()
    {
        return view('user/surf/index');
    }

    public function surfAdd()
    {
        return view('user/surf/add');
    }

    public function surfLink()
    {
        return view('user/surf/link');
    }

    public function bonus()
    {
        return view('user/bonus');
    }

    public function refs()
    {
        return view('user/refs');
    }

    public function deposit()
    {
        return view('user/deposit');
    }

    public function payment()
    {
        return view('user/payment');
    }

    public function withdraw()
    {
        return view('user/withdraw');
    }

}
