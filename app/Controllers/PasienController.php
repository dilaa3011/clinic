<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PasienModel;
use App\Models\RMModel;

class PasienController extends BaseController
{
    protected $pasienModel;
    protected $rekamMedisModel;

    public function __construct()
    {
        $this->pasienModel = new PasienModel();
        $this->rekamMedisModel = new RMModel();
    }

    public function index()
    {
        $pasienList = $this->pasienModel->findAll();

        foreach ($pasienList as &$pasien) {
            $pasien['rekam_medis'] = $this->rekamMedisModel
                ->where('pasien_id', $pasien['id'])
                ->orderBy('tanggal_periksa', 'DESC')
                ->findAll();
        }

        $data = [
            'tittle' => 'Data Pasien',
            'pasien' => $pasienList
        ];

        return view('pasien/data_pasien', $data);
    }

    public function save()
    {
        $nik = $this->request->getPost('nik');

        if (strlen($nik) !== 16) {
            session()->setFlashdata('error', 'Gagal menambahkan data pasien. NIK harus terdiri dari 16 karakter.');
            return redirect()->back()->withInput();
        }

        $pasienModel = new PasienModel();

        $existingPasien = $pasienModel->where('nik', $nik)->first();
        if ($existingPasien) {
            session()->setFlashdata('error', 'Gagal menambahkan data pasien. NIK sudah terdaftar.');
            return redirect()->back()->withInput();
        }

        try {
            $lastId = $pasienModel->selectMax('id')->first();
            $newId = $lastId ? $lastId['id'] + 1 : 1;

            $data = [
                'id' => $newId,
                'nik' => $nik,
                'nama' => $this->request->getPost('nama'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'alamat' => $this->request->getPost('alamat'),
                'telepon' => $this->request->getPost('telepon'),
                'pekerjaan' => $this->request->getPost('pekerjaan'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            ];

            $pasienModel->insert($data);

            session()->setFlashdata('success', 'Data pasien berhasil ditambahkan!');
        } catch (\Exception $e) {
            session()->setFlashdata('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }

        return redirect()->to(base_url('pasien'));
    }
}
