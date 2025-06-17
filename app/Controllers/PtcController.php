<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PtcModel;
use App\Models\UserModel;

class PtcController extends BaseController
{
    protected $ptc_model;

    public function __construct()
    {
        $this->ptc_model = new PtcModel();
    }

    public function surf()
    {
        $userId = session()->get('user_data')['id'];
        $totalReward = 0;

        $availableAds = $this->ptc_model->availableAds($userId);

        $totalAds = count($availableAds);

        foreach ($availableAds as $ads) {
			$totalReward += $ads['reward'];
		}

        $data = array_merge([
            'surfs' => $totalAds,
        ], $this->web_data);

        return view('user/surf/index', $data);
    }

    public function surfAdd()
    {
        $data = array_merge([
            'buy_p' => 0.04,
            'buy_pt' => 0.005,
            'buy_pm' => 0.005,
        ], $this->web_data);

        return view('user/surf/add', $data);
    }

    public function surfOrder()
    {
        $user_session = session()->get('user_data');
        $user = (new UserModel())->asObject()->find($user_session['id']);

        $title = $this->request->getPost('title');
        $link = $this->request->getPost('link');
        $timer = $this->request->getPost('timer');
        $vip = $this->request->getPost('vip');
        $period = $this->request->getPost('period');
        $priceview = $this->calculatePrice(0.04, 0.005, 0.005, $vip, $timer);

        if($user->earning_balance >= $priceview){
            $surf_order_data = [
                'user_id' => $user_session['id'],
                'title' => $title,
                'link' => $link,
                'timer' => $timer,
                'is_vip' => $vip,
                'period' => $period,
            ];
            $this->ads_model->save($surf_order_data);
            session()->setFlashdata('surf', 'surf_ok');
            return redirect()->to('account');
        }else{
            session()->setFlashdata('surf', 'surf_failed');
            return redirect()->to('surf/add');
        }
    }

    public function calculatePrice($buy_price, $buy_price_move, $buy_price_timer, $vip, $timer) {
        $lprice = $buy_price;

        // VIP price addition
        if ($vip == 1) {
            $lprice += $buy_price_move;
        }

        // Timer price addition
        $timerMultiplier = intval($timer) / 10;
        $lprice += ($buy_price_timer * $timerMultiplier);

        // Format price with 6 decimal places
        return number_format($lprice, 6, '.', '');
    }

    public function surfLink()
    {
        $user_session = session()->get('user_data');
        $adsense = $this->ads_model->where('user_id', $user_session['id'])->asObject()->findAll();

        $data = array_merge([
            'my_adsense' => $adsense
        ], $this->web_data);

        return view('user/surf/link', $data);
    }

    public function surfView(){
        return view('user/surf/view');
    }
}
