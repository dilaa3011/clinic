<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AntrianModel;
use App\Models\PasienModel;
use App\Models\RMModel;
use CodeIgniter\I18n\Time;

class AntrianController extends BaseController
{
    protected $antrianModel;
    protected $PasienModel;
    protected $rekamMedisModel;

    public function __construct()
    {
        $this->antrianModel = new AntrianModel();
        $this->PasienModel = new PasienModel();
        $this->rekamMedisModel = new RMModel();
    }

    public function index()
    {

        $rekamMedis = $this->rekamMedisModel
            ->select('rekam_medis.*, pasien.nama AS nama_pasien, pasien.tanggal_lahir, tb_dokter.nama AS nama_dokter, antrian.id AS antrian_id')
            ->join('pasien', 'rekam_medis.pasien_id = pasien.id', 'left')
            ->join('tb_dokter', 'rekam_medis.dokter_id = tb_dokter.id', 'left')
            ->join('antrian', 'rekam_medis.id = antrian.rm_id', 'left')
            ->orderBy('antrian.id', 'DESC')
            ->findAll();


        $antrian = $this->antrianModel
            ->select('antrian.*, rekam_medis.no_rm')
            ->join('rekam_medis', 'antrian.rm_id = rekam_medis.id', 'left')
            ->where('DATE(antrian.tanggal_periksa)', date('Y-m-d'))
            ->findAll();        
        // dd($rekamMedis);

        $data = [
            'tittle' => 'Antrian',
            // 'antrian' => $this->antrianModel->getAntrianHariIni(),
            'rekamMedis' => $rekamMedis,
            'antrian' => $antrian
        ];
        return view('admin/antrian', $data);
    }

    // $tanggal = Time::now('Asia/Jakarta', 'Y-m-d H:i:s');

    public function ambilAntrian()
    {
        $nik = $this->request->getPost('nik');
        $pasien = $this->PasienModel->where('nik', $nik)->first();
        $tanggal = date('Y-m-d');

        if (!$pasien) {
            session()->setFlashdata('error', 'Pasien tidak ditemukan. Harap mendaftar terlebih dahulu.');
            return redirect()->back();
        }

        $cekAntrianHariIni = $this->antrianModel
            ->where('nik', $nik)
            ->where('tanggal_periksa', $tanggal)
            ->first();

        if ($cekAntrianHariIni) {
            session()->setFlashdata('message', 'Anda sudah memiliki antrian hari ini. Nomor antrian: ' . $cekAntrianHariIni['nomor_antrian']);
            return redirect()->to(base_url('/antrian'));
        }

        $rekamMedisLama = $this->rekamMedisModel->where('pasien_id', $pasien['id'])->first();
        $no_rm = $rekamMedisLama ? $rekamMedisLama['no_rm'] : str_pad($pasien['id'], 6, "0", STR_PAD_LEFT);

        $rekamMedisData = [
            'pasien_id' => $pasien['id'],
        'dokter_id' => 101, 
        'no_rm' => $no_rm,  
            'keluhan' => 'belum diisi',
            'diagnosa' => 'belum diisi',
            'tindakan' => 'belum diisi',
            'resep' => 'belum diisi',
            'catatan' => 'belum diisi',
            'tanggal_periksa' => $tanggal,
        ];
        $this->rekamMedisModel->insert($rekamMedisData);
        
        $rekamMedisBaru = $this->rekamMedisModel->where('pasien_id', $pasien['id'])->orderBy('id', 'DESC')->first();
        
        $jumlahAntrianHariIni = $this->antrianModel->where('tanggal_periksa', $tanggal)->countAllResults();
        $no_antrian = $jumlahAntrianHariIni + 1;
        
        $this->antrianModel->insert([
            'rm_id' => $rekamMedisBaru['id'],
            'nik' => $nik,
            'nomor_antrian' => $no_antrian,
            'tanggal_periksa' => $tanggal,
            'status_pemeriksaan' => 'menunggu',
            'status_bayar' => 'belum lunas',
            'tarif' => 0,
        ]);

        session()->setFlashdata('message', "Antrian berhasil diambil. Nomor antrian Anda: $no_antrian");
        return redirect()->to(base_url('/antrian'));
    }
    
    public function ubahStatus($id)
    {
        $status = $this->request->getPost('status_pemeriksaan');
        $this->antrianModel->update($id, ['status_pemeriksaan' => $status]);

        return redirect()->to(base_url('/antrian'))->with('message', 'Status berhasil diubah');
    }

    public function updateTarif()
    {
        $id = $this->request->getPost('id_antrian');
        $tarif = $this->request->getPost('tarif');
        $this->antrianModel->update($id, ['tarif' => $tarif]);

        return redirect()->to(base_url('/antrian'))->with('message', 'Tarif berhasil diubah');
    }

    public function ubahStatusBayar($id)
    {
        $status = $this->request->getPost('status_bayar');
        $this->antrianModel->update($id, ['status_bayar' => $status]);

        return redirect()->to(base_url('/antrian'))->with('message', 'Status bayar berhasil diubah');
    }
}
