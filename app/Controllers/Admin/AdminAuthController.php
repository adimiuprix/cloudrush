<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class AdminAuthController extends BaseController
{
    public function sessionchecker(){
        $admin_model = new AdminModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $this->validation->setRules([
            'username' => 'required|alpha_numeric|min_length[5]|max_length[20]',
            'password' => 'required|alpha_numeric'
        ]);

        if (!$this->validation->withRequest($this->request)->run()) {
            return redirect()->back()->with('error', 'Invalid input')->withInput();
        }

        $admin = $admin_model->where('username', $username)->first();

        if ($admin && password_verify($password, $admin['password'])) {
            // Set session data
            $this->session->set([
                'admin_id' => $admin['id'],
                'username' => $admin['username'],
                'logged_in' => true
            ]);

            // Redirect to dashboard
            return redirect()->to('/admin/panel');
        }else{
            return redirect()->to('/admin/login');
        }
    }
}
