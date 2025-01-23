<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AntrianModel;
use App\Models\PasienModel;
use App\Models\RMModel;

class LaporanController extends BaseController
{
    protected $antrianModel;
    protected $PasienModel;
    protected $rekamMedisModel;

    public function __construct()
    {
        $this->rekamMedisModel = new RMModel();
        $this->antrianModel = new AntrianModel();
        $this->PasienModel = new PasienModel();
    }

    public function index()
    {

        $rekamMedis = $this->rekamMedisModel
            ->select('rekam_medis.*, pasien.nama AS nama_pasien, pasien.nik, tb_dokter.nama AS nama_dokter, antrian.tarif')
            ->join('pasien', 'rekam_medis.pasien_id = pasien.id', 'left')
            ->join('tb_dokter', 'rekam_medis.dokter_id = tb_dokter.id', 'left')
            ->join('antrian', 'pasien.nik = antrian.nik', 'left')
            ->findAll();



        $data = [
            'tittle' => 'Laporan',
            'rekamMedis' => $rekamMedis,
        ];

        return view('admin/laporan', $data);
    }
}
