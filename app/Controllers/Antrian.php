<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Antrian extends BaseController
{
    public function index()
    {
        $data = [
            'tittle' => 'Antrian',
        ];
        return view('admin/antrian', $data);
    }
}
