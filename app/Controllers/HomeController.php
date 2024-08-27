<?php

namespace App\Controllers;
use App\Models\UserModel;

class HomeController extends BaseController
{
    public function index(): string
    {
        return view('homepage',$this->web_data);
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
        return view('news',$this->web_data);
    }

    public function bounty(): string
    {
        return view('bounty', $this->web_data);
    }

    public function rules(): string
    {
        return view('terms', $this->web_data);
    }

    public function faq(): string
    {
        return view('faq', $this->web_data);
    }
}
