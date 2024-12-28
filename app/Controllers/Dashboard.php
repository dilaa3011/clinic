<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'tittle' => 'Dashboard',
        ];
        return view('admin/dashboard', $data);
    }
    public function sidebar()
    {
        return view('/layout/template');
    }
}
