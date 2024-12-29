<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AuthController extends BaseController
{
    public function index()
    {
        $data = [
            'tittle' => 'Login'
        ];
        return view('auth/login', $data);
    }
}
