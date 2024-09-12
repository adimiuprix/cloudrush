<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\PlanModel;
use App\Models\FaqModel;

class HomeController extends BaseController
{
    public function index(): string
    {
        $plan_model = new PlanModel();
        $plans = $plan_model->where('is_free', 0)->get()->getResultObject();

        $data = array_merge([
            'plans' => $plans,
        ], $this->web_data);

        return view('homepage', $data);
    }

    public function auth()
    {
        $address = $this->request->getPost('wallet');   // Tangkap Wallet

        $user = new UserModel();
        $isUser = $user->where('user_wallet', $address)->first();

        if($isUser){    // Jika User ada
            $session = session();
            $session->set([
                'user_id' => $isUser['id'],
                'user_wallet' => $isUser['user_wallet'],
                'is_logged_in' => true
            ]);
            return redirect()->to('account');
        }else{      // Jika user tidak ada
            $newUser = [
                'user_wallet' => $address
            ];
            $user->insert($newUser);
            $newUserData = $user->where('user_wallet', $address)->first();
            $session = session();
            $session->set([
                'user_id' => $newUserData['id'],
                'user_wallet' => $newUserData['user_wallet'],
                'is_logged_in' => true
            ]);
            return redirect()->to('account');
        }
    }

    public function news(): string
    {
        $r = $this->request->headers();
        dd($r);
        return view('news',$this->web_data);
    }

    public function bounty(): string
    {
        $user_session = session()->has('user_data');

        $data = array_merge([
            'session_avail' => $user_session,
        ], $this->web_data);

        return view('bounty', $data);
    }

    public function rules(): string
    {
        return view('terms', $this->web_data);
    }

    public function faq(): string
    {
        $faq_model = new FaqModel();
        $faqs = $faq_model->findAll();

        $data = array_merge(['faqs' => $faqs], $this->web_data);

        return view('faq', $data);
    }
}
