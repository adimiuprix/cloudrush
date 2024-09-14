<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\CollectModel;

class CollectController extends BaseController
{
    public function collect()
    {
        $limit_collect = 2; // limit per day
        $user_model = new UserModel(); // Init class modell
        $collect_model = new CollectModel();
        $session = (object)session()->get('user_data'); // get session

        // fetch user based session and select two coloumn
        $user = $user_model
            ->where('id', $session->id)
            ->get()
            ->getFirstRow('object');

        $count_collect = $collect_model
            ->where('user_id', $session->id)
            ->where('date_time', date('Y-m-d'))
            ->get()->getNumRows();

        if($count_collect >= $limit_collect){
            session()->setFlashdata('collect', 'collect_exceded');
            return redirect()->back();
        }

        // save current balance before set to 0
        $current_balance = $user->balance;

        if($current_balance >= 0.00000100){

            // set balance to 0
            $user_model->update($session->id, [
                'balance' => 0,
            ]);

            $new_earning_balance = $current_balance + $user->earning_balance;
            $user_model->update($session->id, [
                'earning_balance' => $new_earning_balance,
            ]);

            $collect_h = [
                'user_id' => $session->id,
                'date_time' => date('Y-m-d'),
            ];
            $collect_model->save($collect_h);

            session()->setFlashdata('collect', 'collect_ok');
            return redirect()->back();
        }else{
            session()->setFlashdata('collect', 'collect_failed');
            return redirect()->back();
        }

    }
}
