<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DokterController extends BaseController
{
    public function index()
    {
        $data = [
            'tittle' => 'Rekam Medis',
        ];
        return view('dokter/data-rm', $data);
    }
}
