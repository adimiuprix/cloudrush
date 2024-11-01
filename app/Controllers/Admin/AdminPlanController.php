<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PlanModel;

class AdminPlanController extends BaseController
{
    public function plan_index()
    {
        $plan_model = new PlanModel();

        $data = [
            'plans' => $plan_model->where('id !=', 1)->findAll(),
        ];

        return view('admin/plan/index', $data);
    }

    public function plan_create()
    {
        return view('admin/plan/create');
    }

}
