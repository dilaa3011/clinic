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
        $tanggal_awal = $this->request->getPost('tanggal_awal');
        $tanggal_akhir = $this->request->getPost('tanggal_akhir');

        $builder = $this->rekamMedisModel
            ->select('rekam_medis.*, pasien.nama AS nama_pasien, pasien.nik, tb_dokter.nama AS nama_dokter, antrian.tarif')
            ->join('pasien', 'rekam_medis.pasien_id = pasien.id', 'left')
            ->join('tb_dokter', 'rekam_medis.dokter_id = tb_dokter.id', 'left')
            ->join('antrian', 'pasien.nik = antrian.nik', 'left');

        if ($tanggal_awal && $tanggal_akhir) {
            $builder->where('rekam_medis.tanggal_periksa >=', $tanggal_awal)
                ->where('rekam_medis.tanggal_periksa <=', $tanggal_akhir);
        }

        $rekamMedis = $builder->findAll();

        $data = [
            'tittle' => 'Laporan',
            'rekamMedis' => $rekamMedis,
            'tanggal_awal' => $tanggal_awal,
            'tanggal_akhir' => $tanggal_akhir,
        ];

        return view('admin/laporan', $data);
    }

    public function cetak()
    {
        $tanggalAwal = $this->request->getPost('tanggal_awal');
        $tanggalAkhir = $this->request->getPost('tanggal_akhir');

        $builder = $this->rekamMedisModel
            ->select('rekam_medis.*, pasien.nama AS nama_pasien, pasien.nik, tb_dokter.nama AS nama_dokter, antrian.tarif')
            ->join('pasien', 'rekam_medis.pasien_id = pasien.id', 'left')
            ->join('tb_dokter', 'rekam_medis.dokter_id = tb_dokter.id', 'left')
            ->join('antrian', 'pasien.nik = antrian.nik', 'left');

        if ($tanggalAwal && $tanggalAkhir) {
            $builder->where('rekam_medis.tanggal_periksa >=', $tanggalAwal)
                ->where('rekam_medis.tanggal_periksa <=', $tanggalAkhir);
        }

        $rekamMedis = $builder->findAll();
        $data = [
            'tittle' => 'Cetak Laporan',
            'rekamMedis' => $rekamMedis,
            'tanggal_awal' => $tanggalAwal,
            'tanggal_akhir' => $tanggalAkhir
        ];

        return view('admin/cetak_laporan', $data);
    }
}
