<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PasienModel;
use App\Models\RMModel;

class PasienController extends BaseController
{
    protected $pasienModel;

    public function __construct()
    {
        $this->pasienModel = new PasienModel();
    }

    public function index()
    {
        $data = [
            'tittle' => 'Data Pasien',
            'pasien' => $this->pasienModel->findAll(),
        ];

        return view('pasien/data_pasien', $data);
    }

    public function save()
    {
        $pasienModel = new PasienModel();
        $rekamMedisModel = new RMModel();

        $lastId = $this->pasienModel->selectMax('id')->first();

        $newId = $lastId ? $lastId['id'] + 1 : 1;

        // simpan data 
        $data = [
            'id' => $newId,
            'nik' => $this->request->getPost('nik'),
            'nama' => $this->request->getPost('nama'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'alamat' => $this->request->getPost('alamat'),
            'telepon' => $this->request->getPost('telepon'),
            'pekerjaan' => $this->request->getPost('pekerjaan'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
        ];


        $pasienId = $pasienModel->insert($data);

        if ($pasienId) {
            $rekamMedisData = [
                'pasien_id' => $pasienId,
                'dokter_id' => 101,
                'tanggal_periksa' => date('Y-m-d'),
                'keluhan' => 'Form belum diisi',
                'diagnosa' => 'Form belum diisi',
                'tindakan' => 'Form belum diisi',
                'resep' => 'Form belum diisi',
                'catatan' => 'Form belum diisi',
            ];
            $rekamMedisModel->insert($rekamMedisData);

            session()->setFlashdata('success', 'Data pasien dan rekam medis berhasil ditambahkan!');
        } else {
            session()->setFlashdata('error', 'Gagal menambahkan data pasien.');
        }


        return redirect()->to(base_url('pasien'));
    }
}
