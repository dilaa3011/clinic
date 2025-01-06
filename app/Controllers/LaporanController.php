<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class LaporanController extends BaseController
{
    public function index()
    {
        $data = [
            'tittle' => 'Laporan',
        ];

        return view('admin/laporan', $data);
    }
}
