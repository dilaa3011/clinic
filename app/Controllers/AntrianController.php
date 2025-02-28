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
            ->select('rekam_medis.*, pasien.nama AS nama_pasien, pasien.tanggal_lahir, tb_dokter.nama AS nama_dokter')
            ->join('pasien', 'rekam_medis.pasien_id = pasien.id')
            ->join('tb_dokter', 'rekam_medis.dokter_id = tb_dokter.id', 'left')
            ->findAll();

        $antrian = $this->antrianModel
            ->select('antrian.*, rekam_medis.no_rm') 
            ->join('rekam_medis', 'antrian.rm_id = rekam_medis.id')
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

    public function ambilAntrian()
    {
        $nik = $this->request->getPost('nik');
        $pasien = $this->PasienModel->getPasienByNik($nik);
        $tanggal = Time::now('Asia/Jakarta', 'Y-m-d H:i:s');

        if ($pasien) {
            // Periksa jumlah antrian pada tanggal yang sama
            $lastAntrian = $this->antrianModel
                ->where('tanggal_periksa', $tanggal)
                ->orderBy('nomor_antrian', 'DESC')
                ->first();

            // Jika belum ada antrian untuk hari ini, mulai dari 1
            $no_antrian = $lastAntrian ? $lastAntrian['nomor_antrian'] + 1 : 1;

            // Tambah data antrian baru
            $this->antrianModel->insert([
                'nik' => $nik,
                'nomor_antrian' => $no_antrian,
                'tanggal_periksa' => $tanggal,
                'status_pemeriksaan' => 'menunggu',
                'status_bayar' => 'belum lunas',
                'tarif' => 0,
            ]);

            // Tambah data rekam medis

            $rekam = $this->rekamMedisModel->findAll();
            $lastRm = $rekam['no_rm'];
            $rm =  $lastRm ? $rekam['no_rm'] + 1 : 1;
            $rekamMedisData = [
                'pasien_id' => $pasien['id'],
                'dokter_id' => 101,
                'no_rm' => $rm,
                'nomor_antrian' => $no_antrian,
                'keluhan' => 'belum diisi',
                'diagnosa' => 'belum diisi',
                'tindakan' => 'belum diisi',
                'resep' => 'belum diisi',
                'catatan' => 'belum diisi',
                'tanggal_periksa' => Time::now('Asia/Jakarta', 'Y-m-d H:i:s'),
            ];
            $this->rekamMedisModel->addRekamMedis($rekamMedisData);

            session()->setFlashdata('message', "Antrian berhasil diambil. Nomor antrian Anda: $no_antrian");

            return redirect()->to(base_url('/antrian'));
        } else {
            session()->setFlashdata('error', 'Pasien tidak ditemukan');
            return redirect()->to(base_url('/pasien'));
        }
    }

    //
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
