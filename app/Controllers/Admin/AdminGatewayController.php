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
            $pg_method = [
                'deposit_method' => $this->request->getPost('depo_mthd'),
                'withdraw_method' => $this->request->getPost('wd_mthd'),
            ];
            $builder->where('id', 1);
            $builder->update($pg_method);
            return redirect()->back();
        }else{
            $payment_method = $builder->select(['deposit_method', 'withdraw_method'])->limit(1)->get();
            $data = [
                'paygateway' => $payment_method->getRow(),
            ];
            return view('admin/gateway/index', $data);
        }
    }
}
