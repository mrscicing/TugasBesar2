<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Data Akun Blank'
        ];
        return view('home',$data);
    }
}
