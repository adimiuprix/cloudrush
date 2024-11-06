<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SettingModel;

class AdminSettingController extends BaseController
{
    protected $setting_model;

    public function __construct()
    {
        $this->setting_model = new SettingModel();
    }

    public function setting_index()
    {
        if ($this->request->getMethod() === 'POST') {

        }else{

            return view('admin/setting/index');
        }
    }

    public function setting_seo()
    {
        if ($this->request->getMethod() === 'POST') {

        }else{
            return view('admin/setting/seo');
        }
    }
}
