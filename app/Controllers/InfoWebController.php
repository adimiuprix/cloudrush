<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\SettingModel;
use App\Models\DepositModel;
use App\Models\WithdrawModel;

class InfoWebController extends BaseController
{
    public function getInfoApp(): array
    {
        $user_model = new UserModel();

        $deposits_array = (new DepositModel())
            ->join('users', 'users.id = deposit_histories.user_id')
            ->where('status', 'paid')
            ->get()
            ->getResult();

        $withdraws_array = (new WithdrawModel())
            ->join('users', 'users.id = withdraw_histories.user_id')
            ->where('status', 'paid')
            ->get()
            ->getResult();

        $start = (new SettingModel())->find(1)['start_from'];
        $targetDate = new \DateTime($start, new \DateTimeZone('UTC'));
        $currentDate = new \DateTime('now', new \DateTimeZone('UTC'));
        $interval = $currentDate->diff($targetDate);

        $data = [
            'web_stats' => [
                'total_user' => $user_model->countAll(),
                'total_deposit' => '200',
                'total_withdraw' => '50',
                'online_day' => $interval->days,
            ],
            'deposits' => $deposits_array,
            'withdraws' => $withdraws_array,
        ];

        return $data;
    }
}
