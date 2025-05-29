<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;
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
            return redirect()->to(base_url('/master-dokter'))->with('error', 'Kode dokter sudah ada!');
        }

        $foto = $this->request->getFile('ttd');
        $namaFoto = null;

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads/ttd', $namaFoto);
        } else {
            $namaFoto = null;
        };

        $data = [
            'kode_dokter' => $this->request->getPost('kode_dokter'),
            'nama' => ucwords(strtolower($this->request->getPost('nama'))),
            'spesialis' => $this->request->getPost('spesialis'),
            'alamat' => $this->request->getPost('alamat'),
            'nomor_hp' => $this->request->getPost('nomor_hp'),
            'ttd' => $namaFoto,
            'created_at' => Time::now()->toDateTimeString(),
            'updated_at' => Time::now()->toDateTimeString(),
        ];        

        if ($this->dokterModel->insert($data)) {
            return redirect()->to(base_url('/master-dokter'))->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->to(base_url('/master-dokter'))->with('error', 'Gagal menambahkan data');
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

        $existing = $this->dokterModel->find($id);

        $foto = $this->request->getFile('ttd');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {            
            if (!empty($existing['ttd']) && file_exists('uploads/ttd/' . $existing['ttd'])) {
                unlink('uploads/ttd/' . $existing['ttd']);
            }
            $newName = $foto->getRandomName();
            $foto->move('uploads/ttd', $newName);
            $data['ttd'] = $newName;
        } else {
            $data['ttd'] = $existing['ttd']; 
        }


        $notif  = $inputNama ?: $dokterLama['nama'] ;
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
}
