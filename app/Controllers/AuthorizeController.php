<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\UserPlanHistoryModel;
use PragmaRX\Random\Random;

class AuthorizeController extends BaseController
{
    protected $user_plan_history;

    public function __construct()
    {
        $this->user_model = new UserModel();
        $this->user_plan_history = new UserPlanHistoryModel();
    }

    public function process()
    {
        $wallet_post = $this->request->getPost('wallet');

        $this->validation->setRules([
            'wallet' => 'required|alpha_numeric|min_length[15]|max_length[60]',
            'referral_code' => 'permit_empty'
        ]);

        $result = $this->user_model->getUserByWallet($wallet_post);

        if ($result) {
            session()->set('user_data', $result);
            session()->setFlashdata('alert', 'success');

            return redirect()->to('account');
        }else{
            $random_string = new Random();

            $ref = $this->request->getCookie('refflink');
            $userId = $this->user_model->where('reff_code', $ref)->get()->getRow();

            $new_user = [
                'user_wallet' => $wallet_post,
                'reff_code' => $random_string->mixedcase()->size(8)->get(),
                'reff_by' => $userId->id ?? 0,
                'ip_address' => service('request')->getIPAddress()
            ];

            $this->user_model->insert($new_user);
            $user_id = $this->user_model->insertID();

            $plan = $this->db->table('plans')
                ->select('id')
                ->where('is_free', 1)
                ->get()
                ->getRow();

            // Insert ke tabel user_plan_history sebagai plan gratis
            $free_plan = [
                'user_id' => $user_id,
                'plan_id' => $plan->id,
                'status' => 'active',
                'last_sum' => time(),
                'expire_date' => date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . ' + 7 days')),
            ];
            $this->user_plan_history->save($free_plan);

            $result = $this->user_model->getUserByWallet($wallet_post);

            session()->set('user_data', $result);
            session()->setFlashdata('alert', 'success');

            return redirect()->to('account');
        }
    }

    public function refflink()
    {
        $reffcode = $this->request->getGet('refflink');

        setcookie('refflink', $reffcode, time() + 8400, "/");
        return redirect()->to('/');
    }

    public function session_flush()
    {
        session()->destroy();

        return redirect()->to('/');
    }
}
