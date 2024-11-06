<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\DepositModel;
use App\Models\WithdrawModel;

class AdminPanelController extends BaseController
{
    public function login()
    {
        if ($this->session->get('logged_in')) {
            return redirect()->to('admin/panel');
        }

        return view('admin/login');
    }

    public function index()
    {
        $user_model = new UserModel();
        $deposit_model = new DepositModel();
        $withdraw_model = new WithdrawModel();

        $data = [
            'tot_member' => $user_model->countAll() ?: 0,
            'tot_depo' => $deposit_model->selectSum('sum_deposit')->where('status', 'paid')->get()->getRow(),
            'tot_wd' => $withdraw_model->selectSum('sum_withdraw')->where('status', 'paid')->get()->getRow(),
            'users' => $user_model->get()->getResult(),
        ];

        return view('admin/index', $data);
    }

    public function about(){
        return view('admin/about');
    }
}
