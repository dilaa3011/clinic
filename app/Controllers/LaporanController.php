<?php

namespace App\Controllers;

use Dompdf\Dompdf;
use App\Controllers\BaseController;
use App\Database\Migrations\ResumePasien;
use App\Database\Seeds\Tindakan;
use App\Models\AntrianModel;
use App\Models\PasienModel;
use App\Models\RMModel;
use App\Models\PenyakitModel;
use App\models\TindakanModel;
use App\models\ResumePasienModel;
use App\models\FormTindakanModel;
use App\models\DokterModel;
use App\Models\Resep;
use App\models\PembayaranModel;

class LaporanController extends BaseController
{
    protected $antrianModel;
    protected $PasienModel;
    protected $rekamMedisModel;
    protected $penyakitModel;
    protected $tindakanModel;
    protected $resumeModel;
    protected $formTindakan;
    protected $dokterModel;
    protected $resepModel;
    protected $pembayaranModel;

    public function __construct()
    {
        $this->rekamMedisModel = new RMModel();
        $this->antrianModel = new AntrianModel();
        $this->PasienModel = new PasienModel();
        $this->penyakitModel = new PenyakitModel();
        $this->tindakanModel = new TindakanModel();
        $this->resumeModel = new ResumePasienModel();
        $this->formTindakan = new FormTindakanModel();
        $this->dokterModel = new DokterModel();
        $this->resepModel = new Resep();
        $this->pembayaranModel = new PembayaranModel();
    }

    public function pasien()
    {
        $rekamMedis = $this->rekamMedisModel
            ->select('rekam_medis.*, 
        pasien.nama_lengkap AS nama_pasien, 
        pasien.tanggal_lahir, 
        pasien.id_pasien AS pasien_id, 
        dokter.nama AS nama_dokter, 
        dokter.id_dokter AS dokter_id,
        antrian.id_antrian AS antrian_id, 
        antrian.nomor_antrian,
        penyakit.nama_penyakit,
        tindakan.nama_tindakan')
            ->join('pasien', 'rekam_medis.pasien_id = pasien.id_pasien', 'left')
            ->join('dokter', 'rekam_medis.dokter_id = dokter.id_dokter', 'left')
            ->join('penyakit', 'rekam_medis.penyakit_id = penyakit.id_penyakit', 'left')
            ->join('tindakan', 'rekam_medis.tindakan_id = tindakan.id_tindakan', 'left')
            ->join('antrian', 'rekam_medis.id_rm = antrian.rm_id', 'left')
            ->asArray()
            ->findAll();

        // Ambil resep + info obat
        $resepData = $this->resepModel
            ->select('resep.*, obat.nama_obat, obat.harga')
            ->join('obat', 'obat.id_obat = resep.obat_id', 'left')
            ->findAll();

        // Mapping resep per rm_id
        $resepPerPasien = [];
        foreach ($resepData as $r) {
            $resepPerPasien[$r['rm_id']][] = $r;
        }

        $antrian = $this->antrianModel
            ->select('antrian.*, rekam_medis.no_rm')
            ->join('rekam_medis', 'antrian.rm_id = rekam_medis.id_rm', 'left')
            ->where('DATE(antrian.tanggal_periksa)', date('Y-m-d'))
            ->findAll();

        $dokter = $this->dokterModel->findAll();

        return view('admin/laporan-pasien', [
            'tittle' => 'Laporan Pasien',
            'rekamMedis' => $rekamMedis,
            'antrian' => $antrian,
            'list_dokter' => $dokter,
            'resepPerRM' => $resepPerPasien,
        ]);
    }

    public function cetakSuratSakit($id_rm)
    {
        // Ambil data resume pasien
        $resume = $this->resumeModel
            ->select('resumepasien.*, pasien.*, jenis_kelamin.nama_jenis_kelamin')
            ->join('pasien', 'resumepasien.pasien_id = pasien.id_pasien')
            ->join('jenis_kelamin', 'pasien.jenis_kelamin_id = jenis_kelamin.id_jenis_kelamin')
            ->where('rm_id', $id_rm)
            ->first();

        // dd($id_rm, $resume);


        // dd($resume);
        if (!$resume) {
            return redirect()->to(base_url('/master-lap-pasien'))->with('error', 'Data resume pasien tidak ditemukan.');
        }

        // Ambil data tindakan dari formulir_tindakan
        $formulir = $this->formTindakan
            ->where('pasien_id', $resume['pasien_id'])
            ->orderBy('tanggal_pelaksanaan', 'DESC')
            ->first();

        // Jika tidak ada formulir, buat data default
        if (!$formulir) {
            $formulir = [
                'tindakan_id'         => null,
                'petugas_pelaksana'   => 'Tidak Ada',
                'tanggal_pelaksanaan' => 'Tidak Ada',
                'waktu_mulai'         => 'Tidak Ada',
                'waktu_selesai'       => 'Tidak Ada',
            ];
        }

        // Ambil nama tindakan
        $tindakan = null;
        if ($formulir) {
            $tindakan = $this->tindakanModel->find($formulir['tindakan_id']);
        }

        // Data dokter dari session
        $role = session('role');
        if ($role == '1') {
            $jabatan = 'Dokter';
        } elseif ($role == '2') {
            $jabatan = 'Admin';
        } else {
            $jabatan = 'Staff';
        }
        $id_dokter = session('id_dokter');
        $dokterData = $this->dokterModel->find($id_dokter);

        $dokter = [
            'nama'  => $dokterData['nama'],
            'role'  => $jabatan,
            'no_hp' => $dokterData['nomor_hp'],
            'ttd'   => $dokterData['ttd'],
        ];

        return view('admin/cetak-surat-sakit', [
            'dokter'   => $dokter,
            'resume'   => $resume,
            'formulir' => $formulir,
            'tindakan' => $tindakan,
        ]);
    }

    public function cetakResumePasien($id_rm)
    {
        // Ambil data resume pasien
        $resume = $this->resumeModel
            ->select('resumepasien.*, pasien.*, jenis_kelamin.nama_jenis_kelamin')
            ->join('pasien', 'resumepasien.pasien_id = pasien.id_pasien')
            ->join('jenis_kelamin', 'pasien.jenis_kelamin_id = jenis_kelamin.id_jenis_kelamin')
            ->where('rm_id', $id_rm)
            ->first();

        // dd($resume);

        if (!$resume) {
            return redirect()->to(base_url('/master-lap-pasien'))->with('error', 'Data resume pasien tidak ditemukan.');
        }

        $resep = $this->resepModel
            ->select('resep.*, obat.nama_obat, obat.kode_obat, obat.satuan')
            ->join('obat', 'resep.obat_id = obat.id_obat')
            ->where('resep.rm_id', $id_rm)
            ->findAll();
        // dd($resume);

        // Ambil data tindakan dari formulir_tindakan
        $formulir = $this->formTindakan
            ->where('pasien_id', $resume['pasien_id'])
            ->orderBy('tanggal_pelaksanaan', 'DESC')
            ->first();

        $tindakan = null;
        if ($formulir) {
            $tindakan = $this->tindakanModel->find($formulir['tindakan_id']);
        }

        // Data dokter dari session
        $role = session('role');
        if ($role == '1') {
            $jabatan = 'Admin';
        } elseif ($role == '2') {
            $jabatan = 'Dokter';
        } else {
            $jabatan = 'Staff';
        }

        $id_dokter = session('id_dokter');
        $dokterData = $this->dokterModel->find($id_dokter);

        $dokter = [
            'nama'  => $dokterData['nama'],
            'role'  => $jabatan,
            'no_hp' => $dokterData['nomor_hp'],
            'ttd'   => $dokterData['ttd'],
        ];

        return view('admin/cetak-resume-pasien', [
            'dokter'   => $dokter,
            'resume'   => $resume,
            'formulir' => $formulir,
            'tindakan' => $tindakan,
            'resep'    => $resep,
        ]);
    }


    public function klinik()
    {
        $tanggal_awal = $this->request->getPost('tanggal_awal');
        $tanggal_akhir = $this->request->getPost('tanggal_akhir');

        $builder = $this->pembayaranModel
            ->select('pembayaran.*, pasien.nama_lengkap, pasien.nik, tindakan.nama_tindakan, obat.nama_obat, resep.dosis')
            ->join('pasien', 'pasien.id_pasien = pembayaran.pasien_id', 'left')
            ->join('tindakan', 'tindakan.id_tindakan = pembayaran.tindakan_id', 'left')
            ->join('obat', 'obat.id_obat = pembayaran.obat_id', 'left')
            ->join('resep', 'resep.id_resep = pembayaran.resep_id', 'left');

        if ($tanggal_awal && $tanggal_akhir) {
            $builder->where('tanggal_bayar >=', $tanggal_awal)
                ->where('tanggal_bayar <=', $tanggal_akhir);
        }

        $dataPembayaran = $builder->orderBy('tanggal_bayar', 'desc')->findAll();
        $total = array_sum(array_column($dataPembayaran, 'total_bayar'));

        return view('admin/laporan', [
            'tittle' => 'Laporan Clinik',
            'pembayaran' => $dataPembayaran,
            'tanggal_awal' => $tanggal_awal,
            'tanggal_akhir' => $tanggal_akhir,
            'total' => $total,
        ]);
    }

    public function cetakLapKlinik()
    {
        $tanggal_awal = $this->request->getPost('tanggal_awal');
        $tanggal_akhir = $this->request->getPost('tanggal_akhir');

        $builder = $this->pembayaranModel
            ->select('pembayaran.*, pasien.nama_lengkap, pasien.nik, tindakan.nama_tindakan, obat.nama_obat, resep.dosis')
            ->join('pasien', 'pasien.id_pasien = pembayaran.pasien_id', 'left')
            ->join('tindakan', 'tindakan.id_tindakan = pembayaran.tindakan_id', 'left')
            ->join('obat', 'obat.id_obat = pembayaran.obat_id', 'left')
            ->join('resep', 'resep.id_resep = pembayaran.resep_id', 'left');

        if ($tanggal_awal && $tanggal_akhir) {
            $builder->where('tanggal_bayar >=', $tanggal_awal)
                ->where('tanggal_bayar <=', $tanggal_akhir);
        }

        $dataPembayaran = $builder->orderBy('tanggal_bayar', 'desc')->findAll();
        $total = array_sum(array_column($dataPembayaran, 'total_bayar'));

        return view('admin/cetak_laporan', [
            'pembayaran' => $dataPembayaran,
            'tanggal_awal' => $tanggal_awal,
            'tanggal_akhir' => $tanggal_akhir,
            'total' => $total,
        ]);
    }


    public function cetakInformed($id)
    {
        // Ambil data resume pasien
        $resume = $this->resumeModel
            ->select('resumepasien.*, pasien.*, jenis_kelamin.nama_jenis_kelamin')
            ->join('pasien', 'resumepasien.pasien_id = pasien.id_pasien')
            ->join('jenis_kelamin', 'pasien.jenis_kelamin_id = jenis_kelamin.id_jenis_kelamin')
            ->where('rm_id', $id)
            ->first();

        // dd($resume);
        if (!$resume) {
            return redirect()->to(base_url('/rekam-medis'))->with('error', 'Data resume pasien tidak ditemukan.');
        }

        // Ambil data tindakan dari formulir_tindakan
        $formulir = $this->formTindakan
            ->where('pasien_id', $resume['pasien_id'])
            ->orderBy('tanggal_pelaksanaan', 'DESC')
            ->first();

        if (!$formulir) {
            return redirect()->to(base_url('/rekam-medis'))->with('error', 'Data formulir tindakan tidak ditemukan.');
        }

        // Ambil nama tindakan
        $tindakan = $this->tindakanModel
            ->find($formulir['tindakan_id']);

        // Data dokter dari session
        $role = session('role');
        if ($role == '1') {
            $jabatan = 'Admin';
        } elseif ($role == '2') {
            $jabatan = 'Dokter';
        } else {
            $jabatan = 'Staff';
        }
        $id_dokter = session('id_dokter');
        $dokterData = $this->dokterModel->find($id_dokter);

        $dokter = [
            'nama'  => $dokterData['nama'],
            'role'  => $jabatan,
            'no_hp' => $dokterData['nomor_hp'],
            'ttd'   => $dokterData['ttd'],
        ];

        return view('admin/cetak-surat-persetujuan', [
            'dokter'   => $dokter,
            'resume'   => $resume,
            'formulir' => $formulir,
            'tindakan' => $tindakan,
        ]);
    }

    public function cetakGeneral($id)
    {
        // Ambil data resume pasien
        $resume = $this->resumeModel
            ->select('resumepasien.*, pasien.*, jenis_kelamin.nama_jenis_kelamin')
            ->join('pasien', 'resumepasien.pasien_id = pasien.id_pasien')
            ->join('jenis_kelamin', 'pasien.jenis_kelamin_id = jenis_kelamin.id_jenis_kelamin')
            ->where('rm_id', $id)
            ->first();

        // dd($resume);
        if (!$resume) {
            return redirect()->to(base_url('/rekam-medis'))->with('error', 'Data resume pasien tidak ditemukan.');
        }

        // Ambil data tindakan dari formulir_tindakan
        $formulir = $this->formTindakan
            ->where('pasien_id', $resume['pasien_id'])
            ->orderBy('tanggal_pelaksanaan', 'DESC')
            ->first();

        if (!$formulir) {
            return redirect()->to(base_url('/rekam-medis'))->with('error', 'Data formulir tindakan tidak ditemukan.');
        }

        // Ambil nama tindakan
        $tindakan = $this->tindakanModel
            ->find($formulir['tindakan_id']);

        // Data dokter dari session
        $role = session('role');
        if ($role == '1') {
            $jabatan = 'Admin';
        } elseif ($role == '2') {
            $jabatan = 'Dokter';
        } else {
            $jabatan = 'Staff';
        }
        $id_dokter = session('id_dokter');
        $dokterData = $this->dokterModel->find($id_dokter);

        $dokter = [
            'nama'  => $dokterData['nama'],
            'role'  => $jabatan,
            'no_hp' => $dokterData['nomor_hp'],
            'ttd'   => $dokterData['ttd'],
        ];

        return view('admin/cetak-general-consent', [
            'dokter'   => $dokter,
            'resume'   => $resume,
            'formulir' => $formulir,
            'tindakan' => $tindakan,
        ]);
    }
}
