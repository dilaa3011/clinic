<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PasienController extends BaseController
{
    public function index()
    {
        $data = [
            'tittle' => 'Pasien',
        ];
        return view('pasien/data_pasien', $data);
    }
}
