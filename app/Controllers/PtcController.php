<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdsvertModel;

class PtcController extends BaseController
{
    protected $ads_model;

    public function __construct()
    {
        $this->ads_model = new AdsvertModel();
    }

    public function surf()
    {
        $surfs = $this->ads_model->findAll();

        $data = array_merge([
            'surfs' => $surfs,
        ], $this->web_data);

        return view('user/surf/index', $data);
    }

    public function surfAdd()
    {
        $data = array_merge([

        ], $this->web_data);

        return view('user/surf/add', $data);
    }

    public function surfLink()
    {
        $data = array_merge([

        ], $this->web_data);

        return view('user/surf/link', $data);
    }

}
