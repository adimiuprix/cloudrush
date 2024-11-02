<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SettingModel;

class AdminGatewayController extends BaseController
{
    protected $setting_model;

    public function __construct()
    {
        $this->setting_model = new SettingModel();
    }

    public function gateway_index()
    {
        $builder = $this->db->table('settings');

        if ($this->request->getMethod() === 'POST') {
            $builder->where('id', 1)->update([
                'deposit_method' => $this->request->getPost('depo_mthd'),
                'withdraw_method' => $this->request->getPost('wd_mthd'),
            ]);
            return redirect()->back();
        }

        return view('admin/gateway/index', [
            'paygateway' => $builder->select(['deposit_method', 'withdraw_method'])->get()->getRow()
        ]);
    }

    public function gateway_ccpayment()
    {
        return view('admin/gateway/ccpayment');
    }
}
