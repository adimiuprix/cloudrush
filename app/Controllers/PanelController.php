<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PlanModel;
use App\Models\UserModel;

class PanelController extends BaseController
{
    protected $user_model;
    protected $plan_model;
    protected $user_session;

    public function __construct()
    {
        $this->user_model = new UserModel();
        $this->plan_model = new PlanModel();
        $this->user_session = $this->user_model->get()->getFirstRow();
    }

    public function account()
    {
        $user_session = session()->get('user_data');

        $this->plan_model->plans_cron($user_session);

        $balance = $this->user_model->getBalance($user_session);

        $this->user_model->updateBalances($user_session, $balance);

        $user_balance = $this->user_model->getUserBalance($user_session);

        $total_balance = (float)number_format($user_balance,8,'.','');

        $active_plans = (array)$this->user_model->getActivePlans($user_session);

        $earning_point = array_reduce($active_plans, function($carry, $plan) {
            return $carry + (float) ($plan['earning_per_day'] ?? 0);
        }, 0);

        $earn_point = [
            'hourly' => number_format($earning_point / 24, 4),
            'daily' => number_format($earning_point, 4)
        ];

        $user_earning_rate = array_sum(array_column($active_plans, 'earning_rate'));

        $data = array_merge([
            'address' => $user_session['username'],
            'balance' => $total_balance,
            'earning_rate' => $user_earning_rate,
            'earning' => $earn_point,
        ], $this->web_data);

        return view('user/account', $data);
    }

    public function surf()
    {
        return view('user/surf/index', $this->web_data);
    }

    public function surfAdd()
    {
        return view('user/surf/add', $this->web_data);
    }

    public function surfLink()
    {
        return view('user/surf/link', $this->web_data);
    }

    public function bonus()
    {
        return view('user/bonus', $this->web_data);
    }

    public function refs()
    {
        $reff_link = base_url('refflink/' . $this->user_session->reff_code);

        $data = array_merge([
            'reff_link' => $reff_link
        ], $this->web_data);

        return view('user/refs', $data);
    }

    public function deposit()
    {
        return view('user/deposit', $this->web_data);
    }

    public function payment()
    {
        return view('user/payment', $this->web_data);
    }

    public function withdraw()
    {
        return view('user/withdraw', $this->web_data);
    }

}
