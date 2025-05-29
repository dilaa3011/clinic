<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;
use App\Models\RMModel;
use App\Models\AntrianModel;
use App\Models\PenyakitModel;
use App\Models\TindakanModel;
use App\Models\DokterModel;
use App\Models\ObatModel;
use App\Models\Resep;
use App\Models\PasienModel;
use App\Models\ValidasiModel;
use App\Models\FormTindakanModel;
use App\Models\ResumePasienModel;
use App\models\OdontogramModel;

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
    protected $validasiModel;
    protected $formulirTindakanModel;
    protected $resumePasienModel;
    protected $odontogramModel;

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
        $this->validasiModel = new ValidasiModel();
        $this->formulirTindakanModel = new FormTindakanModel();
        $this->resumePasienModel = new ResumePasienModel();
        $this->odontogramModel = new OdontogramModel();
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

        $rekamMedisGrouped = [];
        foreach ($rekamMedis as $rm) {
            $id_rm = $rm['id_rm'];
            if (!isset($rekamMedisGrouped[$id_rm])) {
                $rekamMedisGrouped[$id_rm] = $rm;
            }
        }

        $resepData = $this->resepModel->findAll();
        $resepPerPasien = [];
        foreach ($resepData as $r) {
            $resepPerPasien[$r['rm_id']][] = $r;
        }

        return view('dokter/data-rm', [
            'tittle' => 'Rekam Medis Hari Ini',
            'rekamMedis' => $rekamMedisGrouped,
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
        $id = $this->request->getGet('id_rm');

        $rekam = $this->rekamMedisModel
            ->select('rekam_medis.*, pasien.nama_lengkap')
            ->join('pasien', 'rekam_medis.pasien_id = pasien.id_pasien', 'left')
            ->where('rekam_medis.id_rm', $id)
            ->asArray()
            ->first();


        if (!$rekam) {
            return redirect()->to(base_url('/rekam-medis'))->with('error', 'Data rekam medis tidak ditemukan.');
        }


        $obatModel = new ObatModel();
        $obatList = $obatModel->findAll();

        $resepPasien = $this->resepModel
            ->select('resep.*, obat.nama_obat')
            ->join('obat', 'obat.id_obat = resep.obat_id', 'left')
            ->where('resep.rm_id', $rekam['id_rm'])
            ->orderBy('tanggal_resep', 'DESC')
            ->findAll();

        $penyakit = $this->penyakitModel->findAll();
        $tindakan = $this->tindakanModel->findAll();

        // Ambil berdasarkan pasien_id dan tindakan_id
        $formTindakan = $this->formulirTindakanModel
            ->where('pasien_id', $rekam['pasien_id'])
            ->where('tindakan_id', $rekam['tindakan_id'])
            ->orderBy('tanggal_pelaksanaan', 'DESC')
            ->first();

        $odontogram = $this->odontogramModel->where('rm_id', $rekam['id_rm'])->first();

        $data = [
            'tittle'         => 'Detail Rekam Medis',
            'rekamMedis'     => $rekam,
            'penyakit'       => $penyakit,
            'tindakan'       => $tindakan,
            'resepPasien'    => $resepPasien,
            'obatList'       => $obatList,
            'formTindakan'   => $formTindakan,
            'odontogram' => $odontogram,
        ];

        return view('dokter/detail/detail-rm', $data);
    }

    public function batal($idRm)
    {
        $tanggalHariIni = date('Y-m-d');

        // Cek apakah rekam medis tersebut dibuat hari ini
        $rekam = $this->rekamMedisModel
            ->where('id_rm', $idRm)
            ->where('tanggal_periksa', $tanggalHariIni)
            ->first();

        if (!$rekam) {
            return redirect()->to(base_url('/rekam-medis'))->with('message', 'Data tidak ditemukan atau bukan untuk hari ini.');
        }

        // Hapus antrian yang terkait
        $this->antrianModel->where('rm_id', $idRm)->delete();

        // Hapus rekam medis
        $this->rekamMedisModel->delete($idRm);

        return redirect()->to(base_url('/rekam-medis'))->with('message', 'Pemeriksaan berhasil dibatalkan.');
    }


    public function updateRekamMedis()
    {
        $id = $this->request->getPost('rekam_id');

        $existingRekam = $this->rekamMedisModel
            ->select('rekam_medis.*, pasien.nama_lengkap, pasien.tanggal_lahir, dokter.nama')
            ->join('pasien', 'rekam_medis.pasien_id = pasien.id_pasien', 'left')
            ->join('dokter', 'rekam_medis.dokter_id = dokter.id_dokter', 'left')
            ->where('rekam_medis.id_rm', $id)
            ->asArray()
            ->first();

        if (is_null($existingRekam['dokter_id'])) {
            $dokterId = session('id_dokter');
            $this->rekamMedisModel->update($id, ['dokter_id' => $dokterId]);

            $existingRekam['dokter_id'] = $dokterId;

            $dokter = $this->dokterModel->find($dokterId);
            $existingRekam['nama'] = $dokter['nama'] ?? '';
        }


        if (!$existingRekam) {
            return redirect()->to(base_url('/rekam-medis'))->with('error', 'Data rekam medis tidak ditemukan.');
        }

        $validasi = $this->request->getPost('validasi');
        $validasi = $validasi === null ? $existingRekam['validasi'] : $validasi;
        $tindakan_id = ($validasi == 1) ? $this->request->getPost('tindakan') : null;

        $data = [
            'keluhan'               => $this->request->getPost('keluhan') ?: $existingRekam['keluhan'],
            'riwayat_penyakit'      => $this->request->getPost('riwayat_penyakit') ?: $existingRekam['riwayat_penyakit'],
            'riwayat_alergi'        => $this->request->getPost('riwayat_alergi') ?: $existingRekam['riwayat_alergi'],
            'riwayat_pengobatan'    => $this->request->getPost('riwayat_pengobatan') ?: $existingRekam['riwayat_pengobatan'],
            'diagnosa'              => $this->request->getPost('diagnosa') ?: $existingRekam['diagnosa'],
            'periksa_bibir_masuk_mulut' => $this->request->getPost('periksa_bibir') ?: $existingRekam['periksa_bibir_masuk_mulut'],
            'periksa_gigi_geligi'   => $this->request->getPost('periksa_gigi_geligi') ?: $existingRekam['periksa_gigi_geligi'],
            'periksa_lidah'         => $this->request->getPost('periksa_lidah') ?: $existingRekam['periksa_lidah'],
            'periksa_langit_langit' => $this->request->getPost('periksa_langit_langit') ?: $existingRekam['periksa_langit_langit'],
            'penyakit_id'           => $this->request->getPost('penyakit') ?: $existingRekam['penyakit_id'],
            'tindakan_id'           => $tindakan_id,
            'validasi'              => $validasi,
            'catatan'               => $this->request->getPost('catatan') ?: $existingRekam['catatan'],
            'updated_at'            => Time::now()->toDateTimeString(),
        ];

        // Cek apakah ada perubahan data dibanding sebelumnya
        $hasChanged = false;
        foreach ($data as $key => $value) {
            if ($existingRekam[$key] != $value) {
                $hasChanged = true;
                break;
            }
        }

        if (!$hasChanged) {
            return redirect()->to(base_url('/rekam-medis'))->with('info', 'Tidak ada perubahan pada data rekam medis.');
        }

        if ($this->rekamMedisModel->update($id, $data)) {

            // Ubah status antrian jadi "Selesai"
            $this->antrianModel
                ->where('rm_id', $id)
                ->set(['status_pemeriksaan' => 'Selesai'])
                ->update();

            // Simpan validasi tindakan meskipun validasi = 0
            $existingValidasi = $this->validasiModel
                ->where('rm_id', $id)
                ->first();

            $validasiData = [
                'rm_id'       => $id,
                'tindakan_id' => $tindakan_id, // bisa null jika validasi = 0
                'validasi'    => $validasi,
                'updated_at'  => Time::now()->toDateTimeString(),
            ];

            if ($existingValidasi) {
                $this->validasiModel->update($existingValidasi['id_validasi'], $validasiData);
            } else {
                $validasiData['created_at'] = Time::now()->toDateTimeString();
                $this->validasiModel->insert($validasiData);
            }

            $pasienId  = $existingRekam['pasien_id'];
            $tanggal   = date('Y-m-d');

            if ($validasi == 1 && $tindakan_id) {
                // Simpan/update formulir tindakan seperti sebelumnya
                $dataTindakan = [
                    'pasien_id'           => $pasienId,
                    'tindakan_id'         => $tindakan_id,
                    'petugas_pelaksana'   => session('nama'),
                    'tanggal_pelaksanaan' => $tanggal,
                    'waktu_mulai'         => $this->request->getPost('waktu_mulai') ?: date('H:i:s'),
                    'waktu_selesai'       => $this->request->getPost('waktu_selesai') ?: date('H:i:s'),
                    'updated_at'          => Time::now()->toDateTimeString(),
                ];

                $existingTindakan = $this->formulirTindakanModel
                    ->where('pasien_id', $pasienId)
                    ->where('tindakan_id', $tindakan_id)
                    ->where('tanggal_pelaksanaan', $tanggal)
                    ->first();

                if ($existingTindakan) {
                    $this->formulirTindakanModel->update($existingTindakan['id_formulir'], $dataTindakan);
                } else {
                    $dataTindakan['created_at'] = Time::now()->toDateTimeString();
                    $this->formulirTindakanModel->insert($dataTindakan);
                }
            } else {
                // Jika validasi != 1, hapus SEMUA tindakan pasien pada tanggal tersebut
                $this->formulirTindakanModel
                    ->where('pasien_id', $pasienId)
                    ->where('tanggal_pelaksanaan', $tanggal)
                    ->delete();
            }


            // Simpan atau update resume pasien
            $resumeData = [
                'nomer_rm'        => $existingRekam['no_rm'],
                'pasien_id'       => $existingRekam['pasien_id'],
                'rm_id'           => $id,
                'dokter_id'       => $existingRekam['dokter_id'],
                'nama_lengkap'    => $existingRekam['nama_lengkap'],
                'tanggal_lahir'   => $existingRekam['tanggal_lahir'],
                'tanggal_periksa' => $existingRekam['tanggal_periksa'],
                'nama_dpjp'       => $existingRekam['nama'],
                'anamnesa'        => $data['keluhan'],
                'diagnosa'        => $data['diagnosa'],
                'catatan'         => $data['catatan'],
                'updated_at'      => Time::now()->toDateTimeString(),
            ];

            $existingResume = $this->resumePasienModel->where('rm_id', $id)->first();

            if ($existingResume) {
                $this->resumePasienModel->update($existingResume['id_resume'], $resumeData);
            } else {
                $resumeData['created_at'] = Time::now()->toDateTimeString();
                $this->resumePasienModel->insert($resumeData);
            }

            // Simpan atau update odontogram
            $odontogramData = [
                'pasien_id' => $existingRekam['pasien_id'],
                'rm_id'     => $id,
            ];

            $gigi = [
                '11',
                '12',
                '13',
                '14',
                '15',
                '16',
                '17',
                '18',
                '21',
                '22',
                '23',
                '24',
                '25',
                '26',
                '27',
                '28',
                '31',
                '32',
                '33',
                '34',
                '35',
                '36',
                '37',
                '38',
                '41',
                '42',
                '43',
                '44',
                '45',
                '46',
                '47',
                '48'
            ];

            $existingOdontogram = $this->odontogramModel->where('rm_id', $id)->first();

            if ($existingOdontogram) {
                foreach ($gigi as $kode) {
                    $input = $this->request->getPost($kode);
                    $odontogramData["g$kode"] = ($input !== null && $input !== '') ? $input : $existingOdontogram["g$kode"];
                }

                $this->odontogramModel->update($existingOdontogram['id_odontogram'], $odontogramData);
            } else {
                foreach ($gigi as $kode) {
                    $odontogramData["g$kode"] = $this->request->getPost($kode) ?: null;
                }

                $odontogramData['created_at'] = Time::now()->toDateTimeString();
                $this->odontogramModel->insert($odontogramData);
            }



            return redirect()->to(base_url('/rekam-medis'))->with('success', 'Rekam medis berhasil diperbarui dan status antrian diubah.');
        } else {
            return redirect()->to(base_url('/rekam-medis'))->with('error', 'Gagal memperbarui rekam medis.');
        }
    }



    public function simpan()
    {
        $pasienId = $this->request->getPost('pasien_id');
        $dokterId = session('id_dokter');
        $rekamId  = $this->request->getPost('rekam_id');
        $obat     = $this->request->getPost('obat_id');
        $jumlah   = $this->request->getPost('jumlah_obat');
        $dosis    = $this->request->getPost('dosis');
        $aturan   = $this->request->getPost('aturan_pakai');
        $unit     = $this->request->getPost('unit');
        $keterangan = $this->request->getPost('keterangan');

        $pasien = $this->pasienModel->find($pasienId);
        $namaPasien = $pasien ? $pasien['nama_lengkap'] : 'Pasien Tidak Dikenal';

        $tanggalPeriksa = $this->rekamMedisModel->find($rekamId)['tanggal_periksa'];


        for ($i = 0; $i < count($obat); $i++) {
            $this->resepModel->insert([
                'rm_id'          => $rekamId,
                'pasien_id'      => $pasienId,
                'dokter_id'      => $dokterId,
                'obat_id'        => $obat[$i],
                'jumlah_obat'    => $jumlah[$i],
                'dosis'          => $dosis[$i],
                'unit'           => $unit[$i],
                'keterangan'     => $keterangan[$i],
                'aturan_pakai'   => $aturan[$i],
                'tanggal_resep'  => $tanggalPeriksa,
                // 'status_resep'   => 'sudah_diberikan',
            ]);
        }


        return redirect()->to(base_url('/rekam-medis'))
            ->with('success', 'Resep untuk ' . $namaPasien . ' berhasil disimpan.');
    }


    public function hapusResep($id)
    {
        $resep = $this->resepModel->find($id);
        if (!$resep) {
            return redirect()->to(base_url('/rekam-medis'))->with('error', 'Resep tidak ditemukan.');
        }

        $pasien = $this->pasienModel->find($resep['pasien_id']);
        $namaPasien = $pasien ? $pasien['nama_lengkap'] : 'Pasien Tidak Dikenal';

        $this->resepModel->delete($id);

        return redirect()->to(base_url('/rekam-medis'))
            ->with('success', 'Resep untuk ' . $namaPasien . ' berhasil dihapus.');
    }
}
