<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PasienModel;
use App\Models\RMModel;
use App\Models\JeniskelaminModel;
use App\Models\AgamaModel;
use App\Models\PendidikanModel;


class DetailPasien extends BaseController
{
    protected $pasienModel;
    protected $rekamMedisModel;
    protected $jenisKelaminModel;
    protected $agamaModel;
    protected $pendidikanModel;
    protected $db;

    public function __construct()
    {
        $this->pasienModel = new PasienModel();
        $this->rekamMedisModel = new RMModel();
        $this->jenisKelaminModel = new JeniskelaminModel();
        $this->agamaModel = new AgamaModel();
        $this->pendidikanModel = new PendidikanModel();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $tanggal = date('Ymd'); 
        $prefix = 'RM - ' . $tanggal;

        $last = $this->pasienModel->like('nomor_rekam_medis', $prefix, 'after')
            ->orderBy('nomor_rekam_medis', 'DESC')
            ->first();

        if ($last) {
            $lastNumber = (int)substr($last['nomor_rekam_medis'], -3) + 1;
        } else {
            $lastNumber = 1;
        }

        $newNumber = str_pad($lastNumber, 4, '0', STR_PAD_LEFT);        
        $nomor_rekam_medis = $prefix . ' - ' .  $newNumber;

        $pasien = $this->pasienModel
            ->select('pasien.*, jenis_kelamin.nama_jenis_kelamin, agama.nama_agama, pendidikan.nama_pendidikan')
            ->join('jenis_kelamin', 'jenis_kelamin.id_jenis_kelamin = pasien.jenis_kelamin_id')
            ->join('agama', 'agama.id_agama = pasien.agama_id')
            ->join('pendidikan', 'pendidikan.id_pendidikan = pasien.pendidikan_id')
            ->findAll();

        $jenis_kelamin = $this->jenisKelaminModel->findAll();
        $agama = $this->agamaModel->findAll();
        $pendidikan = $this->pendidikanModel->findAll();

        $data = [
            'tittle' => 'Tambah Pasien',
            'pasien' => $pasien,
            'jenis_kelamin' => $jenis_kelamin,
            'agama' => $agama,
            'pendidikan' => $pendidikan,
            'nomor_rekam_medis' => $nomor_rekam_medis,
        ];

        return view('pasien/add-pasien', $data);
    }
}
