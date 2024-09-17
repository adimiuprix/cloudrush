<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AdminPanelController extends BaseController
{
    public function index()
    {
        return view('admin/index');
    }
}
