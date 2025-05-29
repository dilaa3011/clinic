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
use App\models\PembayaranModel;
use App\Models\ObatModel;
use CodeIgniter\I18n\Time;

class AntrianController extends BaseController
{
    protected $antrianModel;
    protected $PasienModel;
    protected $rekamMedisModel;
    protected $penyakitModel;
    protected $tindakanModel;
    protected $resepModel;
    protected $pembayaranModel;
    protected $obatModel;

    public function __construct()
    {
        $this->antrianModel = new AntrianModel();
        $this->PasienModel = new PasienModel();
        $this->rekamMedisModel = new RMModel();
        $this->penyakitModel = new PenyakitModel();
        $this->tindakanModel = new TindakanModel();
        $this->resepModel = new Resep();
        $this->pembayaranModel = new PembayaranModel();
        $this->obatModel = new ObatModel();
    }

    public function index()
    {
        // Ambil data rekam medis lengkap
        $rekamMedisRaw = $this->rekamMedisModel
            ->select('rekam_medis.*, pasien.id_pasien, pasien.nama_lengkap AS nama_pasien, pasien.tanggal_lahir, dokter.nama AS nama_dokter, antrian.*, resep.status_resep, penyakit.nama_penyakit, tindakan.nama_tindakan, tindakan.harga AS harga_tindakan')
            ->join('pasien', 'rekam_medis.pasien_id = pasien.id_pasien', 'left')
            ->join('dokter', 'rekam_medis.dokter_id = dokter.id_dokter', 'left')
            ->join('penyakit', 'rekam_medis.penyakit_id = penyakit.id_penyakit', 'left')
            ->join('tindakan', 'rekam_medis.tindakan_id = tindakan.id_tindakan', 'left')
            ->join('antrian', 'rekam_medis.id_rm = antrian.rm_id', 'left')
            ->join('resep', 'rekam_medis.id_rm = resep.rm_id', 'left')
            ->where('DATE(rekam_medis.tanggal_periksa)', date('Y-m-d'))
            ->orderBy('antrian.id_antrian', 'DESC')
            ->findAll();

        $rekamMedis = [];
        $resepPasien = [];

        foreach ($rekamMedisRaw as $rekam) {
            $rekamMedis[$rekam['id_rm']] = $rekam;

            // Ambil resep berdasarkan id_rm (rekam medis)
            $resepList = $this->resepModel
                ->select('resep.*, obat.nama_obat, obat.harga')
                ->join('obat', 'obat.id_obat = resep.obat_id', 'left')
                ->where('rm_id', $rekam['id_rm'])
                ->orderBy('tanggal_resep', 'DESC')
                ->findAll();

            $resepPasien[$rekam['id_rm']] = $resepList;
        }

        // Ambil antrian hari ini
        $antrian = $this->antrianModel
            ->select('antrian.*, pasien.nama_lengkap, rekam_medis.no_rm, rekam_medis.penyakit_id, rekam_medis.tindakan_id')
            ->join('pasien', 'pasien.id_pasien = antrian.pasien_id')
            ->join('rekam_medis', 'rekam_medis.id_rm = antrian.rm_id', 'left')
            ->where('DATE(antrian.tanggal_periksa)', date('Y-m-d'))
            ->orderBy('antrian.nomor_antrian', 'ASC')
            ->findAll();

        // Ambil semua data penyakit dan tindakan
        $penyakitList = $this->penyakitModel->findAll();
        $tindakanList = $this->tindakanModel->findAll();

        // Mapping
        $penyakitMap = [];
        foreach ($penyakitList as $penyakit) {
            $penyakitMap[$penyakit['id_penyakit']] = $penyakit['nama_penyakit'];
        }

        $tindakanMap = [];
        foreach ($tindakanList as $tindakan) {
            $tindakanMap[$tindakan['id_tindakan']] = [
                'nama' => $tindakan['nama_tindakan'],
                'harga' => $tindakan['harga'],
            ];
        }

        // Tambahkan data tambahan ke antrian
        foreach ($antrian as &$a) {
            $a['nama_penyakit'] = $penyakitMap[$a['penyakit_id']] ?? 'Penyakit Tidak Diketahui';
            $a['nama_tindakan'] = $tindakanMap[$a['tindakan_id']]['nama'] ?? 'Tindakan Tidak Diketahui';
            $a['harga_tindakan'] = $tindakanMap[$a['tindakan_id']]['harga'] ?? 0;

            // Ambil status resep (jika ada)
            $resep = $this->resepModel
                ->where('rm_id', $a['rm_id'])
                ->orderBy('tanggal_resep', 'DESC')
                ->first();

            $a['status_resep'] = $resep['status_resep'] ?? 'belum_diberikan';
        }

        // Hitung total tarif untuk setiap antrian
        // $tarifPerRM = [];

        // foreach ($rekamMedis as $id_rm => $rekam) {
        //     $resepList = $resepPasien[$id_rm] ?? [];
        //     $totalObat = 0;

        //     foreach ($resepList as $item) {
        //         $totalObat += $item['jumlah_obat'] * $item['harga'];
        //     }

        //     $hargaTindakan = $rekam['harga_tindakan'] ?? 0;
        //     $totalTarif = $totalObat + $hargaTindakan;

        //     $tarifPerRM[$id_rm] = $totalTarif;
        // }


        // Data pembayaran
        $caraPembayaranOptions = $this->pembayaranModel->getCaraPembayaranEnum();
        $pembayaran = $this->pembayaranModel->findAll();

        // Kirim ke view
        $data = [
            'tittle' => 'Antrian Hari Ini',
            'rekamMedis' => $rekamMedis,
            'antrian' => $antrian,
            'resepPasien' => $resepPasien,
            // 'tarif' =>  $tarifPerRM,
            'caraPembayaranOptions' => $caraPembayaranOptions,
            'pembayaran' => $pembayaran,
        ];

        return view('admin/antrian', $data);
    }

    public function ambilAntrian()
    {
        $nik = $this->request->getPost('nik');
        $noRm = $this->request->getPost('nomor_rekam_medis');
        $tanggal = date('Y-m-d');

        $pasien = $this->PasienModel->where('nik', $nik)->first();
        if (!$pasien) {
            return redirect()->back()->with('message', 'Pasien tidak ditemukan.');
        }

        // Selalu insert rekam medis baru, walaupun no_rm sama
        $dataRekamMedis = [
            'pasien_id' => $pasien['id_pasien'],
            'dokter_id' => session('id_dokter'),
            'penyakit_id' => null,
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
            'catatan' => 'belum diisi',
            'tanggal_periksa' => $tanggal,
            'created_at' => Time::now()->toDateTimeString(),
            'updated_at' => Time::now()->toDateTimeString(),
        ];

        $this->rekamMedisModel->insert($dataRekamMedis);
        $idRekamMedis = $this->rekamMedisModel->getInsertID();

        $dataAntrian = [
            'nik' => $nik,
            'pasien_id' => $pasien['id_pasien'],
            'rm_id' => $idRekamMedis,
            'status_pemeriksaan' => 'menunggu',
            'status_bayar' => 'belum lunas',
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


    public function bayar()
    {
        $id_antrian = $this->request->getPost('id_antrian');
        $tarif = $this->request->getPost('tarif');
        $uang_dibayar = $this->request->getPost('uang_dibayar');
        $no_bayar = $this->request->getPost('no_bayar');
        // dd($tarif);

        // Ambil data antrian untuk dapatkan pasien_id dan rm_id
        $antrian = $this->antrianModel->find($id_antrian);
        if (!$antrian) {
            return redirect()->back()->with('error', 'Data antrian tidak ditemukan.');
        }

        $pasien_id = $antrian['pasien_id'];
        $rekam_id  = $antrian['rm_id'];

        // Ambil data tindakan dari rekam medis
        $rekam = $this->rekamMedisModel->find($rekam_id);

        // Ambil semua resep terkait rekam medis
        $resepList = $this->resepModel->where('rm_id', $rekam_id)->findAll();
        $resep_id  = !empty($resepList) ? $resepList[0]['id_resep'] : null;
        $obat_id   = !empty($resepList) ? $resepList[0]['obat_id'] : null;

        $dataPembayaran = [
            'pasien_id'       => $pasien_id,
            'tindakan_id'     => $rekam['tindakan_id'] ?? null,
            'obat_id'         => $obat_id,
            'resep_id'        => $resep_id,
            'no_bayar'        => $no_bayar,
            'cara_pembayaran' => $this->request->getPost('cara_pembayaran'),
            'nama_petugas'    => session()->get('nama') ?? 'Petugas Default',
            'total_bayar'     => (int) str_replace('.', '', $tarif),
            'uang_bayar'      => (int) str_replace('.', '', $uang_dibayar),
            'tanggal_bayar'   => date('Y-m-d'),
        ];
        // dd($dataPembayaran);
        
        $pembayaranLama = $this->pembayaranModel
            ->where('no_bayar', $no_bayar)
            ->first();

        if ($pembayaranLama) {
            $id_bayar = $pembayaranLama['id_bayar'];
            $this->pembayaranModel->update($id_bayar, $dataPembayaran);
        } else {
            $this->pembayaranModel->insert($dataPembayaran);
        }


        // Update status antrian jadi 'lunas'
        $this->antrianModel->update($id_antrian, ['status_bayar' => 'lunas']);
        $resep_id = !empty($resepList) ? (int) $resepList[0]['id_resep'] : 0;

        if ($resep_id) {
            $this->resepModel->update($resep_id, ['status_resep' => 'sudah_diberikan']);
        }

        return redirect()->to(base_url('/struk/' . $no_bayar));
    }

    public function cetakStruk($no_bayar)
    {
        $pembayaran = $this->pembayaranModel
            ->where('no_bayar', $no_bayar)
            ->first();

        if (!$pembayaran) {
            return redirect()->back()->with('error', 'Struk tidak ditemukan.');
        }

        $pasien = $this->PasienModel->find($pembayaran['pasien_id']);
        $tindakan = $this->tindakanModel->find($pembayaran['tindakan_id']);
        $obat = $this->obatModel->find($pembayaran['obat_id']);
        // dd($pembayaran, $pasien, $tindakan, $obat);

        return view('admin/cetak-struk', [
            'pembayaran' => $pembayaran,
            'pasien'     => $pasien,
            'tindakan'   => $tindakan,
            'obat'       => $obat,
        ]);
    }


    public function ubahStatusBayar($id)
    {
        $status = $this->request->getPost('status_bayar');
        $this->antrianModel->update($id, ['status_bayar' => $status]);

        return redirect()->to(base_url('/antrian'))->with('message', 'Status bayar berhasil diubah');
    }
}
