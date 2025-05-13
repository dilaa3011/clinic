<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RMModel;
use App\Models\AntrianModel;
use App\Models\PenyakitModel;
use App\Models\TindakanModel;
use App\Models\DokterModel;
use App\Models\ObatModel;
use App\Models\Resep;
use App\Models\PasienModel;
use Config\Session;

class RmController extends BaseController
{
    protected $rekamMedisModel;
    protected $antrianModel;
    protected $penyakitModel;
    protected $tindakanModel;
    protected $dokterModel;
    protected $obatModel;
    protected $resepModel;
    protected $pasienModel;

    public function __construct()
    {
        $this->rekamMedisModel = new RMModel();
        $this->antrianModel = new AntrianModel();
        $this->penyakitModel = new PenyakitModel();
        $this->tindakanModel = new TindakanModel();
        $this->dokterModel = new DokterModel();
        $this->obatModel = new ObatModel();
        $this->resepModel = new Resep();
        $this->pasienModel = new PasienModel();
    }

    public function index()
    {
        $tanggalHariIni = date('Y-m-d');

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
    tindakan.nama_tindakan,')

            ->join('pasien', 'rekam_medis.pasien_id = pasien.id_pasien', 'left')
            ->join('dokter', 'rekam_medis.dokter_id = dokter.id_dokter', 'left')
            ->join('antrian', 'rekam_medis.id_rm = antrian.rm_id', 'left')
            ->join('penyakit', 'rekam_medis.penyakit_id = penyakit.id_penyakit', 'left')
            ->join('tindakan', 'rekam_medis.tindakan_id = tindakan.id_tindakan', 'left')
            // ->join('resep', 'pasien.id_pasien = resep.pasien_id', 'left')
            ->where('rekam_medis.tanggal_periksa', $tanggalHariIni)
            ->asArray()
            ->findAll();
        $penyakit = $this->penyakitModel->findAll();
        $tindakan = $this->tindakanModel->findAll();
        $dokter = $this->dokterModel->findAll();


        $resepModel = new Resep();

        // Ambil semua resep dikelompokkan per pasien_id
        $resepData = $resepModel->findAll();
        $resepPerPasien = [];
        foreach ($resepData as $r) {
            $resepPerPasien[$r['pasien_id']][] = $r;
        }

        return view('dokter/data-rm', [
            'tittle' => 'Rekam Medis Hari Ini',
            'rekamMedis' => $rekamMedis,
            'penyakit' => $penyakit,
            'tindakan' => $tindakan,
            'dokter' => $dokter,
            'resepPerPasien' => $resepPerPasien
        ]);
    }



    public function all()
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
        tindakan.nama_tindakan,')

            ->join('pasien', 'rekam_medis.pasien_id = pasien.id_pasien', 'left')
            ->join('dokter', 'rekam_medis.dokter_id = dokter.id_dokter', 'left')
            ->join('penyakit', 'rekam_medis.penyakit_id = penyakit.id_penyakit', 'left')
            ->join('tindakan', 'rekam_medis.tindakan_id = tindakan.id_tindakan', 'left')
            ->join('antrian', 'rekam_medis.id_rm = antrian.rm_id', 'left')
            // ->join('resep', 'pasien.id_pasien = resep.pasien_id', 'left')
            ->asArray()
            ->findAll();

        // 1. Ambil RM hari ini
        $rmHariIni = $this->rekamMedisModel
            ->select('id_rm, pasien_id, tanggal_periksa')
            ->where('DATE(tanggal_periksa)', date('Y-m-d'))
            ->findAll();

        // Ambil semua pasien_id dari RM hari ini
        $pasienIdsHariIni = array_column($rmHariIni, 'pasien_id');

        // 2. Ambil resep sesuai pasien_id yang ada di RM hari ini
        $resepData = $this->resepModel
            ->select('resep.*, obat.nama_obat')
            ->join('obat', 'resep.obat_id = obat.id_obat', 'left')
            ->whereIn('resep.pasien_id', $pasienIdsHariIni)
            ->findAll();

        // 3. Kelompokkan berdasarkan pasien_id
        $resepPerPasien = [];
        foreach ($resepData as $r) {
            $resepPerPasien[$r['pasien_id']][] = $r;
        }

        // dd($rekamMedis);        

        $antrian = $this->antrianModel
            ->select('antrian.*, rekam_medis.no_rm')
            ->join('rekam_medis', 'antrian.rm_id = rekam_medis.id_rm', 'left')
            ->where('DATE(antrian.tanggal_periksa)', date('Y-m-d'))
            ->findAll();

        // dd($rekamMedis);

        $dokter = $this->dokterModel->findAll();

        return view('dokter/data-rm-all', [
            'tittle' => 'Rekam Medis',
            'rekamMedis' => $rekamMedis,
            'antrian' => $antrian,
            'list_dokter' => $dokter,
            'resepPerRM' => $resepPerPasien,

        ]);
    }

    public function detail()
    {
        $id = $this->request->getPost('id_rm');
        $rekam = $this->rekamMedisModel
            ->select('rekam_medis.*, pasien.nama_lengkap')
            ->join('pasien', 'rekam_medis.pasien_id = pasien.id_pasien', 'left')
            ->where('rekam_medis.id_rm', $id)
            ->asArray()
            ->first();

        if (!$rekam) {
            return redirect()->to(base_url('/rekam-medis'))->with('error', 'Data rekam medis tidak ditemukan.');
        }

        // dd(session('id_dokter'));

        // Ambil data obat
        $obatModel = new ObatModel();  // Pastikan ini sesuai dengan nama model kamu
        $obatList = $obatModel->findAll();

        // Ambil data resep berdasarkan pasien        
        $resepPasien = $this->resepModel
            ->select('resep.*, obat.nama_obat')
            ->join('obat', 'obat.id_obat = resep.obat_id', 'left')
            ->where('pasien_id', $rekam['pasien_id'])
            ->orderBy('tanggal_resep', 'DESC')
            ->findAll();
        // dd($resepPasien);

        // Ambil data penyakit dan tindakan
        $penyakit = $this->penyakitModel->findAll();
        $tindakan = $this->tindakanModel->findAll();

        $data = [
            'tittle' => 'Detail Rekam Medis',
            'rekamMedis' => $rekam,
            'penyakit' => $penyakit,
            'tindakan' => $tindakan,
            'resepPasien' => $resepPasien,
            'obatList' => $obatList, // Data obat
        ];

        return view('dokter/form-rm', $data);
    }

    public function updateRekamMedis()
{
    $id = $this->request->getPost('rekam_id');

    $data = [

        'keluhan'               => $this->request->getPost('keluhan') ?: $this->rekamMedisModel->find($id)['keluhan'],
        'riwayat_penyakit'      => $this->request->getPost('riwayat_penyakit') ?: $this->rekamMedisModel->find($id)['riwayat_penyakit'],
        'riwayat_alergi'        => $this->request->getPost('riwayat_alergi') ?: $this->rekamMedisModel->find($id)['riwayat_alergi'],
        'riwayat_pengobatan'    => $this->request->getPost('riwayat_pengobatan') ?: $this->rekamMedisModel->find($id)['riwayat_pengobatan'],
        'diagnosa'              => $this->request->getPost('diagnosa') ?: $this->rekamMedisModel->find($id)['diagnosa'],
        'periksa_bibir_masuk_mulut'         => $this->request->getPost('periksa_bibir') ?: $this->rekamMedisModel->find($id)['periksa_bibir'],
        'periksa_gigi_geligi'   => $this->request->getPost('periksa_gigi_geligi') ?: $this->rekamMedisModel->find($id)['periksa_gigi_geligi'],
        'periksa_lidah'         => $this->request->getPost('periksa_lidah') ?: $this->rekamMedisModel->find($id)['periksa_lidah'],
        'periksa_langit_langit' => $this->request->getPost('periksa_langit_langit') ?: $this->rekamMedisModel->find($id)['periksa_langit_langit'],
        'penyakit_id'           => $this->request->getPost('penyakit') ?: $this->rekamMedisModel->find($id)['penyakit_id'],
        'tindakan_id'           => $this->request->getPost('tindakan') ?: $this->rekamMedisModel->find($id)['tindakan_id'],
        'catatan'               => $this->request->getPost('catatan') ?: $this->rekamMedisModel->find($id)['catatan'],
    ];

    if ($this->rekamMedisModel->update($id, $data)) {
        // Update status_pemeriksaan di tabel antrian
        $this->antrianModel
            ->where('rm_id', $id)
            ->set(['status_pemeriksaan' => 'Selesai'])
            ->update();

        return redirect()->to(base_url('/rekam-medis'))->with('success', 'Rekam medis berhasil diperbarui dan status antrian diubah.');
    } else {
        return redirect()->to(base_url('/rekam-medis'))->with('error', 'Gagal memperbarui rekam medis.');
    }
}


    // resep

    public function simpan()
    {
        $pasienId = $this->request->getPost('pasien_id');
        $dokterId = session('id_dokter');
        $rekamId  = $this->request->getPost('rekam_id'); // ambil rekam medis ID
        $obat     = $this->request->getPost('obat_id');
        $jumlah   = $this->request->getPost('jumlah_obat');
        $dosis    = $this->request->getPost('dosis');
        $aturan   = $this->request->getPost('aturan_pakai');
        $unit      = $this->request->getPost('unit');
        $keterangan = $this->request->getPost('keterangan');

        $pasien = $this->pasienModel->find($pasienId);
        $namaPasien = $pasien ? $pasien['nama_lengkap'] : 'Pasien Tidak Dikenal';

        $tanggalPeriksa = $this->rekamMedisModel->find($rekamId)['tanggal_periksa'];

        for ($i = 0; $i < count($obat); $i++) {
            $this->resepModel->insert([
                'pasien_id'      => $pasienId,
                'dokter_id'      => $dokterId,
                'obat_id'        => $obat[$i],
                'jumlah_obat'    => $jumlah[$i],
                'dosis'          => $dosis[$i],
                'unit'           => $unit[$i],          // ← DITAMBAH
                'keterangan'     => $keterangan[$i],    // ← DITAMBAH
                'aturan_pakai'   => $aturan[$i],
                'tanggal_resep'  => $tanggalPeriksa,
                'status_resep'   => 'sudah diberikan',  // ← Ubah ke huruf kecil
            ]);
        }

        // Redirect ke halaman detail rekam medis (ganti sesuai URL-mu)
        return redirect()->to(base_url('/rekam-medis'))
            ->with('success', 'Resep untuk ' . $namaPasien . ' berhasil disimpan.');
    }

    public function hapusResep($id)
    {
        $resep = $this->resepModel->find($id);
        if (!$resep) {
            return redirect()->back()->with('error', 'Resep tidak ditemukan.');
        }

        $pasien = $this->pasienModel->find($resep['pasien_id']);
        $namaPasien = $pasien ? $pasien['nama_lengkap'] : 'Pasien Tidak Dikenal';

        $this->resepModel->delete($id);

        return redirect()->to(base_url('/rekam-medis'))
            ->with('success', 'Resep untuk ' . $namaPasien . ' berhasil dihapus.');
    }
}
