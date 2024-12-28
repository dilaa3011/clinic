<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('admin/dashboard');
    }
    public function sidebar()
    {
        return view('/layout/template');
    }
}
