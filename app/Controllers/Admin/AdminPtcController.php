<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AdminPtcController extends BaseController
{
    public function ptc_index()
    {
        return view('admin/ptc/index');
    }

    public function ptc_active()
    {
        return view('admin/ptc/active');
    }

    public function ptc_completed()
    {
        return view('admin/ptc/completed');
    }

    public function ptc_setting()
    {
        return view('admin/ptc/setting');
    }

}
