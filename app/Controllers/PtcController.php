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
            'surfs' => $availableAds,
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
                'user_id'       => $user_session['id'],
                'title'         => $title,
                'link'          => $link,
                'timer'         => $timer,
                'is_vip'        => $vip,
                'period'        => $period,
                'reward'        => '0.01',
                'total_view'    => '1000',
                'views'         => '0',
                'status'        => 'active',
            ];
            $this->ptc_model->save($surf_order_data);

            $newEarnBalance = $user->earning_balance - $priceview;
            $this->user_model->update($user_session['id'], [
                'earning_balance' => $newEarnBalance,
            ]);

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

    // This function for get all ads from owner (My ads)
    public function surfLink()
    {
        $user_session = session()->get('user_data');
        $adsense = $this->ptc_model->where('user_id', $user_session['id'])->asObject()->findAll();

        $data = array_merge([
            'my_adsense' => $adsense
        ], $this->web_data);

        return view('user/surf/link', $data);
    }

    public function surfView($ptcId){
        $infoWeb = $this->web_data;

        $adsDetail = $this->ptc_model->where('id', $ptcId)->get()->getFirstRow();

        $ads = [
            'ptc_id' => $adsDetail->id,
            'timer' => $adsDetail->timer,
            'ads_url' => $adsDetail->link,
            'site_name' => $infoWeb['sitename'],
        ];

        return view('user/surf/view', $ads);
    }

    public function surfVerify(int $id){
        // hcaptcha verify
        $captcha_response = $this->request->getPost('h-captcha-response');
        $secret = "ES_221c6a57085c4832ae5cda9a7dadece4";
        $response = $this->verifyCaptcha($captcha_response, $secret, $this->request->getIPAddress());
        if ($response === false) {
            return redirect()->to('surf')->with('surf', 'captcha_failed');
        }

        $user_session = session()->get('user_data')['id'];

        if (!is_numeric($id)) {
            return redirect()->to('surf')->with('surf', 'surf_alert');
        }

        $ads_focus = $this->ptc_model->getAdById($id);

        $startTime = session()->set('start_view', time());

        if (time() - $startTime < $ads_focus['timer']) {
            return redirect()->to('surf')->with('surf', 'cant_claim');
        }

        session()->remove('start_view');

        if ($ads_focus['views'] >= $ads_focus['total_view']) {
            return redirect()->to('surf')->with('surf', 'max_views');
        }

        $check = $this->ptc_model->verify($user_session, $id);

        if (!$check) {
            return redirect()->to('surf')->with('surf', 'invalid_claim');
        }

        $this->ptc_model->updateUser($user_session, $ads_focus['reward']);

        $this->ptc_model->addView($ads_focus['id']);

        if (($ads_focus['views'] + 1) == $ads_focus['total_view']) {
            $this->ptc_model->setCompleted($ads_focus['id']);
        }

        $this->ptc_model->insertHistory($user_session, $ads_focus['id'], $ads_focus['reward']);

        return redirect()->to('surf')->with('surf', 'success');
    }

    private function verifyCaptcha(string $response, string $secret, string $ip): bool
    {
        $res = json_decode(
            file_get_contents('https://hcaptcha.com/siteverify?' . http_build_query([
                'secret' => $secret,
                'response' => $response,
                'remoteip' => $ip
            ])), true);

        return !empty($res['success']) && $res['success'] === true;
    }
}
