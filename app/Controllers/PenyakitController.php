<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenyakitModel;

class PenyakitController extends BaseController
{
    protected $penyakitModel;
    public function __construct()
    {
        $this->penyakitModel = new PenyakitModel();
    }
    public function index()
    {
        $data = [
            'tittle' => 'Data Penyakit',
            'penyakit' => $this->penyakitModel->findAll(),
        ];
        return view('data-master/penyakit', $data);
    }
    public function delete($id)
    {
        $penyakit = $this->penyakitModel->find($id);

        if (!$penyakit) {
            return redirect()->to(base_url('/master-penyakit'))->with('error', 'Penyakit tidak ditemukan');
        }

        $nama = $penyakit['nama_penyakit'];

        if ($this->penyakitModel->delete($id)) {
            return redirect()->to(base_url('/master-penyakit'))->with('success', 'Data Penyakit ' . $nama . ' berhasil dihapus');
        } else {
            return redirect()->to(base_url('/master-penyakit'))->with('error', 'Gagal menghapus data Penyakit');
        }
    }

    public function addPenyakit()
    {

        $data = [
            'nama_penyakit' => ucwords(strtolower($this->request->getPost('nama'))),
            'kode_penyakit' => $this->request->getPost('kode_penyakit'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];

        if ($this->penyakitModel->insert($data)) {
            return redirect()->to(base_url('/master-penyakit'))->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Gagal menambahkan data');
        }
    }

    public function update()
    {
        $id = $this->request->getPost('id_penyakit');
        $penyakitLama = $this->penyakitModel->find($id);

        if (!$penyakitLama) {
            return redirect()->to(base_url('/master-penyakit'))
                ->with('error', 'Penyakit ' .$penyakitLama. ' tidak ditemukan');
        }

        // Ambil input
        $inputNama = ucwords(strtolower(trim($this->request->getPost('nama'))));
        $inputKode = $this->request->getPost('kode_penyakit');
        $inputKeterangan = $this->request->getPost('keterangan');

        // Siapkan array untuk perubahan
        $data = [];

        if ($inputNama && $inputNama !== $penyakitLama['nama_penyakit']) {
            $data['nama_penyakit'] = $inputNama;
        }

        if ($inputKode && $inputKode !== $penyakitLama['kode_penyakit']) {
            $data['kode_penyakit'] = $inputKode;
        }
        if ($inputKeterangan && $inputKeterangan !== $penyakitLama['keterangan']) {
            $data['keterangan'] = $inputKeterangan;
        }

        $notif = $inputNama ?: $penyakitLama['nama_penyakit'] ;
        if (!empty($data)) {
            $this->penyakitModel->update($id, $data);
            return redirect()->to(base_url('/master-penyakit'))->with('success', 'Data Penyakit ' . $notif. ' berhasil diperbarui');
        } else {
            return redirect()->to(base_url('/master-penyakit'))->with('info', 'Tidak ada perubahan data');
        }
    }
}
