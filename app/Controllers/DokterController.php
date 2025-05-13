<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AntrianModel;
use App\Models\RMModel;
use App\Models\PasienModel;
use App\Models\DokterModel;

class DokterController extends BaseController
{
    protected $antrianModel;
    protected $pasienModel;
    protected $rekamMedisModel;
    protected $dokterModel;

    public function __construct()
    {
        $this->rekamMedisModel = new RMModel();
        $this->antrianModel = new AntrianModel();
        $this->pasienModel = new PasienModel();
        $this->dokterModel = new DokterModel();
    }

    public function index()
    {
        $dokter = $this->dokterModel->findAll();

        $last = $this->dokterModel->like('kode_dokter', 'DKT', 'after')
            ->orderBy('id_dokter', 'DESC')
            ->first();

        if ($last && preg_match('/DKT(\d+)/', $last['kode_dokter'], $match)) {
            $nextNumber = (int)$match[1] + 1;
        } else {
            $nextNumber = 1;
        }

        $kode_dokter = 'DKT' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
        // dd($kode_dokter);
        $data = [
            'tittle' => 'Data Dokter',
            'dokter' => $dokter,
            'kode_dokter' => $kode_dokter,
        ];
        return view('data-master/dokter', $data);
    }

    public function addDokter()
    {
        $kode_dokter = $this->request->getPost('kode_dokter');

        $dokter = $this->dokterModel->where('kode_dokter', $kode_dokter)->first();
        if ($dokter) {
            return redirect()->back()->with('error', 'Kode dokter sudah ada!');
        }

        $data = [
            'kode_dokter' => $this->request->getPost('kode_dokter'),
            'nama' => ucwords(strtolower($this->request->getPost('nama'))),
            'spesialis' => $this->request->getPost('spesialis'),
            'alamat' => $this->request->getPost('alamat'),
            'nomor_hp' => $this->request->getPost('nomor_hp'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        if ($this->dokterModel->insert($data)) {
            return redirect()->to(base_url('/master-dokter'))->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Gagal menambahkan data');
        }
    }

    public function update()
    {
        $id = $this->request->getPost('id_dokter');
        $dokterLama = $this->dokterModel->find($id);
        $nama = $dokterLama['nama'];

        if (!$dokterLama) {
            return redirect()->to(base_url('/master-dokter'))->with('error', 'Dokter ' . $nama . ' tidak ditemukan');
        }

        // Ambil inputan
        $data = [];

        $inputKode = $this->request->getPost('kode_dokter');
        if (!empty($inputKode)) {
            $data['kode_dokter'] = $inputKode;
        }

        $inputNama = ucwords(strtolower($this->request->getPost('nama')));
        if (!empty($inputNama)) {
            $data['nama'] = $inputNama;
        }

        $inputSpesialis = $this->request->getPost('spesialis');
        if (!empty($inputSpesialis)) {
            $data['spesialis'] = $inputSpesialis;
        }

        $inputNomorHp = $this->request->getPost('nomor_hp');
        if (!empty($inputNomorHp)) {
            $data['nomor_hp'] = $inputNomorHp;
        }

        $notif  = $inputNama ?: $dokterLama['nama_dokter'] ;
        if (!empty($data)) {
            $this->dokterModel->update($id, $data);
            return redirect()->to(base_url('/master-dokter'))->with('success', 'Data dokter ' . $notif. ' berhasil diperbarui');
        } else {
            return redirect()->to(base_url('/master-dokter'))->with('info', 'Tidak ada perubahan data');
        }
    }

    public function delete($id) {
        // $id = $this->request->getPost('id_dokter');
        $dokter = $this->dokterModel->find($id);

        if (!$dokter) {
            return redirect()->to(base_url('/master-dokter'))->with('error', 'Dokter tidak ditemukan');
        }

        $nama = $dokter['nama'];

        // Hapus dokter
        if ($this->dokterModel->delete($id)) {
            return redirect()->to(base_url('/master-dokter'))->with('success', 'Data dokter '. $nama. ' berhasil dihapus');
        } else {
            return redirect()->to(base_url('/master-dokter'))->with('error', 'Gagal menghapus data dokter');
        }
    }


    // ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    // ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    public function index_old()
    {
        $tanggalHariIni = date('Y-m-d');

        $rekamMedis = $this->rekamMedisModel
            ->select('rekam_medis.*, 
                  pasien.nama AS nama_pasien, 
                  pasien.tanggal_lahir, 
                  tb_dokter.nama AS nama_dokter, 
                  antrian.id AS antrian_id, 
                  antrian.nomor_antrian')
            ->join('pasien', 'rekam_medis.pasien_id = pasien.id', 'left')
            ->join('tb_dokter', 'rekam_medis.dokter_id = tb_dokter.id', 'left')
            ->join('antrian', 'rekam_medis.id = antrian.rm_id', 'left')
            ->where('rekam_medis.tanggal_periksa', $tanggalHariIni)
            ->findAll();

        return view('dokter/data-rm', [
            'tittle' => 'Rekam Medis Hari Ini',
            'rekamMedis' => $rekamMedis,
        ]);
    }



    public function all()
    {

        $rekamMedis = $this->rekamMedisModel
            ->select('rekam_medis.*, 
              pasien.nama AS nama_pasien, 
              pasien.tanggal_lahir, 
              tb_dokter.nama AS nama_dokter, 
              antrian.id AS antrian_id, 
              antrian.nomor_antrian')
            ->join('pasien', 'rekam_medis.pasien_id = pasien.id', 'left')
            ->join('tb_dokter', 'rekam_medis.dokter_id = tb_dokter.id', 'left')
            ->join('antrian', 'rekam_medis.id = antrian.rm_id', 'left')
            ->findAll();


        // dd($rekamMedis);

        $antrian = $this->antrianModel
            ->select('antrian.*, rekam_medis.no_rm')
            ->join('rekam_medis', 'antrian.rm_id = rekam_medis.id', 'left')
            ->where('DATE(antrian.tanggal_periksa)', date('Y-m-d'))
            ->findAll();

        // dd($rekamMedis);

        return view('dokter/data-rm-all', [
            'tittle' => 'Rekam Medis',
            'rekamMedis' => $rekamMedis,
            'antrian' => $antrian,
        ]);
    }


    public function updateRekamMedis()
    {
        $validationRules = [
            'keluhan'  => 'required',
            'diagnosa' => 'required',
            'tindakan' => 'required',
            'resep'    => 'required',
            'catatan'  => 'required',
        ];
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $rekamId = $this->request->getPost('rekam_id');
        $data = $this->request->getPost(['keluhan', 'diagnosa', 'tindakan', 'resep', 'catatan']);

        if ($this->rekamMedisModel->update($rekamId, $data)) {
            return redirect()->to(base_url('/rm'))->with('success', 'Data berhasil diperbarui');
        }
        return redirect()->back()->with('error', 'Gagal memperbarui data');
    }
}
