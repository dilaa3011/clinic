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

        $nik = $this->request->getPost('nik');

        // $pasienId = $pasienModel->insert($data);

        if (strlen($nik) !== 16) {
            session()->setFlashdata('error', 'Gagal menambahkan data pasien. NIK harus terdiri dari 16 karakter.');
            return redirect()->back()->withInput();
        } else {

            $pasienModel = new PasienModel();

            $lastId = $this->pasienModel->selectMax('id')->first();

            $newId = $lastId ? $lastId['id'] + 1 : 1;
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

            $pasienModel->insert($data);

            session()->setFlashdata('success', 'Data pasien dan rekam medis berhasil ditambahkan!');
        }


        return redirect()->to(base_url('pasien'));
    }
}
