<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

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
        return view('admin/index');
    }
}
