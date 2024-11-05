<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\FaqModel;

class AdminFaqsController extends BaseController
{
    protected $faq_model;

    public function __construct()
    {
        $this->faq_model = new FaqModel();
    }

    public function faqs_index()
    {
        $data = [
            'faqs' => $this->faq_model->get()->getResult()
        ];

        return view('admin/faqs/index', $data);
    }
}
