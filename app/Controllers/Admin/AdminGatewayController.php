<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SettingModel;
use App\Models\CcpaymentModel;

class AdminGatewayController extends BaseController
{
    protected $setting_model;
    protected $ccpayment_model;

    public function __construct()
    {
        $this->setting_model = new SettingModel();
        $this->ccpayment_model = new CcpaymentModel();
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
        if ($this->request->getMethod() === 'POST') {
            $builder = $this->db->table('ccpayments');
            $builder->where('id', 1)->update([
                'coin_id'       => $this->request->getPost('coin_id'),
                'chain'         => $this->request->getPost('chain'),
                'app_id'        => $this->request->getPost('app_id'),
                'app_secret'    => $this->request->getPost('app_sec'),
            ]);

            return redirect()->back();
        }else{
            $data = [
                'ccp' => $this->ccpayment_model->asObject()->first(),
            ];
            return view('admin/gateway/ccpayment', $data);
        }
    }

    public function gateway_faucetpay()
    {
        if ($this->request->getMethod() === 'POST') {

        }else{
            return view('admin/gateway/faucetpay');
        }
    }
}
