<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ValidasiModel;


class ValidasiController extends BaseController
{
    protected $validasiModel;

    public function __construct()
    {
     $this->validasiModel = new ValidasiModel();   
    }
    public function simpan()
    {        
        // $data = [
        //     'tindakan_id' => $this->request->getPost('tindakan'),
        //     'validasi'    => $this->request->getPost('validasi'),
        // ];

        // $this->validasiModel->insert($data);

        // return redirect()->back()->with('success', 'Validasi tindakan berhasil disimpan.');
    }
}
