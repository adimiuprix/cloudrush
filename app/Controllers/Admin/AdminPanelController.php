<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AdminPanelController extends BaseController
{
    public function login()
    {
        if ($this->session->get('logged_in')) {
            return redirect()->to('admin/panel');
        }

        return view('admin/login');
    }

    public function index()
    {
        $user_model = new UserModel();

        $data = [
            'users' => $user_model->get()->getResult(),
        ];

        return view('admin/index', $data);
    }

    public function about(){
        return view('admin/about');
    }
}
