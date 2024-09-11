<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserPlanHistoryModel;

class WithdrawController extends BaseController
{
    public function withdrawreq()
    {
        $deposit_mandatory = true;
        $min_wd = 10.00000000;
        $id_user = session()->get('user_data')['id'];
        $balance = $this->user_model->where('id', $id_user)->get()->getFirstRow()->balance;

        $plan_available = new UserPlanHistoryModel();
        $check_avaiblity = $plan_available
            ->where('user_id', $id_user)
            ->where('plan_id !=', 1)
            ->get()
            ->getRow();

        if($deposit_mandatory == true){

            // check deposit plan is available, this mean user make a deposit active
            if($check_avaiblity ==! 1){
                session()->setFlashdata('payout', 'free_plan');
                return redirect()->to('withdraw');
            }

            if($balance >= $min_wd){
                session()->setFlashdata('payout', 'payout_ok');
                return redirect()->to('withdraw');
            }else{
                session()->setFlashdata('payout', 'payout_failed');
                return redirect()->to('withdraw');
            }
        }else{
            if($balance >= $min_wd){
                session()->setFlashdata('payout', 'payout_ok');
                return redirect()->to('withdraw');
            }else{
                session()->setFlashdata('payout', 'payout_failed');
                return redirect()->to('withdraw');
            }
        }

    }
}
