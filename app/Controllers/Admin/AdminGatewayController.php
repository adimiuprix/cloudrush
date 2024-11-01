<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AdminGatewayController extends BaseController
{
    protected $user_model;

    public function __construct()
    {
        $this->user_model = new UserModel();
    }

    public function user_index()
    {
        $builder = $this->db->table('users');

        $data = [
            'users' => $builder->get()->getResult(),
        ];

        return view('admin/user/index', $data);
    }

    public function plan_create()
    {
        return view('admin/plan/create');
    }

    public function plan_edit($id)
    {
        if ($this->request->getMethod() === 'POST') {
            $data_plan = [
                'plan_name' => $this->request->getPost('plan_name'),
                'is_free' => 0,
                'earning_per_day' => $this->request->getPost('earn_day'),
                'earning_rate' => $this->request->getPost('earn_rate'),
                'price' => $this->request->getPost('plan_price'),
                'profit' => $this->request->getPost('plan_profit'),
            ];
            $this->plan_model->update($id, $data_plan);

            return redirect()->to('/admin/plan');
        } else {
            $data = [
                'plan' => (object)$this->plan_model->find($id),
            ];

            return view('admin/plan/edit', $data);
        }
    }

    public function plan_delete($id)
    {
        if ($this->plan_model->find($id)) {
            // Hapus data dari database
            $this->plan_model->delete($id);
            return redirect()->to('admin/plan')->with('success', 'Plan berhasil dihapus.');
        } else {
            return redirect()->to('admin/plan')->with('error', 'Plan tidak ditemukan.');
        }
    }

    public function plan_free()
    {
        if ($this->request->getMethod() === 'POST') {
            $free_plan = [
                'plan_name' => $this->request->getPost('plan_name'),
                'is_free' => 1,
                'earning_per_day' => $this->request->getPost('earn_day'),
                'earning_rate' => $this->request->getPost('earn_rate'),
                'price' => 0.00000000,
                'profit' => $this->request->getPost('plan_profit'),
            ];
            $this->plan_model->update(1, $free_plan);
            return redirect()->to('/admin/plan');
        } else {
            $data = [
                'plan' => (object)$this->plan_model->find(1),
            ];

            return view('admin/plan/free', $data);
        }
    }

}
