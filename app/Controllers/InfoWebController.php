<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\SettingModel;

class InfoWebController extends BaseController
{
    public function getInfoApp(): array
    {
        $user_model = new UserModel();

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

            'depo_stat' => [
                '0' => [
                    'username' => 'TEjCaB1Fa8FJ***',
                    'amount' => '143',
                    'time' => '07 Jun 2024 - 02:52'
                ],
                '1' => [
                    'username' => 'TCaB1FEja8FJ***',
                    'amount' => '143',
                    'time' => '07 Jun 2024 - 02:52'
                ],
            ],

            'wd_stat' => [
                '0' => [
                    'username' => 'T8FaEjFaJCB1***',
                    'amount' => '20',
                    'time' => '07 Jun 2024 - 02:52'
                ],
                '1' => [
                    'username' => 'TFFEja8CaB1J***',
                    'amount' => '12',
                    'time' => '07 Jun 2024 - 02:52'
                ],
            ]

        ];

        return $data;
    }
}
