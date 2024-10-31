<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AdminPlanController extends BaseController
{
    public function plan_index()
    {
        return view('admin/plan/index');
    }

    public function plan_create()
    {
        return view('admin/plan/create');
    }

}
