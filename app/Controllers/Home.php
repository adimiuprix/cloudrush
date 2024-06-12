<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('homepage');
    }
    
    public function news(): string
    {
        return view('news');
    }
    
    public function bounty(): string
    {
        return view('bounty');
    }

    public function rules(): string
    {
        return view('terms');
    }

    public function faq(): string
    {
        return view('faq');
    }
} 
