<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AntrianModel;
use App\Models\PasienModel;
use App\Models\RMModel;
use App\Models\PenyakitModel;
use App\Controllers\TindakanController;
use App\Models\TindakanModel;
use App\models\Resep;
use CodeIgniter\I18n\Time;

class AntrianController extends BaseController
{
    protected $antrianModel;
    protected $PasienModel;
    protected $rekamMedisModel;
    protected $penyakitModel;
    protected $tindakanModel;
    protected $resepModel;

    public function __construct()
    {
        $this->antrianModel = new AntrianModel();
        $this->PasienModel = new PasienModel();
        $this->rekamMedisModel = new RMModel();
        $this->penyakitModel = new PenyakitModel();
        $this->tindakanModel = new TindakanModel();
        $this->resepModel = new Resep();
    }

    public function index()
    {

        $rekamMedisRaw = $this->rekamMedisModel
            ->select('rekam_medis.*, pasien.id_pasien, pasien.nama_lengkap AS nama_pasien, pasien.tanggal_lahir, dokter.nama AS nama_dokter, antrian.id_antrian AS antrian_id, penyakit.nama_penyakit, tindakan.nama_tindakan')
            ->join('pasien', 'rekam_medis.pasien_id = pasien.id_pasien', 'left')
            ->join('dokter', 'rekam_medis.dokter_id = dokter.id_dokter', 'left')
            ->join('penyakit', 'rekam_medis.penyakit_id = penyakit.id_penyakit', 'left')
            ->join('tindakan', 'rekam_medis.tindakan_id = tindakan.id_tindakan', 'left')
            ->join('antrian', 'rekam_medis.id_rm = antrian.rm_id', 'left')
            ->orderBy('antrian.id_antrian', 'DESC')
            ->findAll();

        $rekamMedis = [];
        foreach ($rekamMedisRaw as $rekam) {
            $rekamMedis[$rekam['id_rm']] = $rekam;
        }



        $antrian = $this->antrianModel
            ->select('antrian.*, rekam_medis.no_rm')
            ->join('rekam_medis', 'antrian.rm_id = rekam_medis.id_rm', 'left')
            ->where('DATE(antrian.tanggal_periksa)', date('Y-m-d'))
            ->findAll();
        // dd($rekamMedis);        

        $resepPasien = [];
        foreach ($rekamMedis as $rekam) {
            $resepPasien[$rekam['id_rm']] = $this->resepModel
                ->select('resep.*, obat.nama_obat')
                ->join('obat', 'obat.id_obat = resep.obat_id', 'left')
                ->where('pasien_id', $rekam['id_pasien'])
                ->orderBy('tanggal_resep', 'DESC')
                ->findAll();
        }



        $data = [
            'tittle' => 'Antrian',
            // 'antrian' => $this->antrianModel->getAntrianHariIni(),
            'rekamMedis' => $rekamMedis,
            'antrian' => $antrian,
            'resepPasien' => $resepPasien,
            // 'penyakitList' => $this->penyakitModel->findAll(),
            // 'tindakanList' => $this->tindakanModel->findAll(),
        ];
        return view('admin/antrian', $data);
    }

    // $tanggal = Time::now('Asia/Jakarta', 'Y-m-d H:i:s');

    public function ambilAntrian()
    {
        $nik = $this->request->getPost('nik');

        // Ambil data pasien berdasarkan NIK
        $pasien = $this->PasienModel->where('nik', $nik)->first();

        if (!$pasien) {
            return redirect()->back()->with('message', 'Pasien tidak ditemukan.');
        }

        // 1. Simpan rekam medis kosong
        $tanggal = date('Y-m-d');
        $noRm = 'RM-' . time(); // Atau sesuai kebutuhanmu

        $dataRekamMedis = [
            'pasien_id' => $pasien['id_pasien'],
            'dokter_id' => session('id_dokter'),
            'penyakit_id' => null,
            'resep_id' => null,
            'tindakan_id' => null,
            'no_rm' => $noRm,
            'riwayat_penyakit' => 'belum diisi',
            'riwayat_alergi' => 'belum diisi',
            'riwayat_pengobatan' => 'belum diisi',
            'keluhan' => 'belum diisi',
            'periksa_bibir_masuk_mulut' => 'belum diisi',
            'periksa_gigi_geligi' => 'belum diisi',
            'periksa_lidah' => 'belum diisi',
            'periksa_langit_langit' => 'belum diisi',
            'diagnosa' => 'belum diisi',
            // 'resep' => 'belum diisi',
            'catatan' => 'belum diisi',
            'tanggal_periksa' => $tanggal
        ];

        $this->rekamMedisModel->insert($dataRekamMedis);

        $idRekamMedis = $this->rekamMedisModel->getInsertID();

        // 2. Simpan antrian
        $dataAntrian = [
            'nik' => $nik,
            'pasien_id' => $pasien['id_pasien'],
            'rm_id' => $idRekamMedis,
            'status_pemeriksaan' => 'menunggu',
            'status_bayar' => 'belum lunas',
            'tarif' => 0 // default 0, bisa diubah nanti
        ];

        $this->antrianModel->tambahAntrian($dataAntrian);

        return redirect()->to(base_url('rekam-medis'))->with('message', 'Antrian berhasil diambil.');
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
