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
        // Ambil semua nomor rekam medis
        $allNomor = $this->pasienModel->select('nomor_rekam_medis')->findAll();

        $lasNum = 0;
        foreach ($allNomor as $item) {
            $nomor = $item['nomor_rekam_medis'];
            // ambil 4 digit terakhir
            $last4 = substr($nomor, -4);
            if (is_numeric($last4)) {
                $num = (int)$last4;
                if ($num > $lasNum) {
                    $lasNum = $num;
                }
            }
        }

        // nomor baru
        $newNumber = str_pad($lasNum + 1, 4, '0', STR_PAD_LEFT);

        $tanggal = date('Ymd');
        $prefix = 'RM - ' . $tanggal;
        $nomor_rekam_medis = $prefix . ' - ' . $newNumber;


        // Sisanya seperti biasa...
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
