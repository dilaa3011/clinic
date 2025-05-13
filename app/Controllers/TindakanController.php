<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TindakanModel;

class TindakanController extends BaseController
{
    protected $tindakanModel;
    public function __construct()
    {
        $this->tindakanModel = new TindakanModel();
    }
    public function index()
    {
        $data = [
            'tittle' => 'Data Tindakan',
            'tindakan' => $this->tindakanModel->findAll(),
        ];
        return view('data-master/tindakan', $data);
    }
    
    public function delete($id)
    {
        $tindakan = $this->tindakanModel->find($id);

        if (!$tindakan) {
            return redirect()->to(base_url('/master-tindakan'))->with('error', 'Tindakan tidak ditemukan');
        }

        $nama = $tindakan['nama_tindakan'];

        if ($this->tindakanModel->delete($id)) {
            return redirect()->to(base_url('/master-tindakan'))->with('success', 'Data Tindakan ' . $nama . ' berhasil dihapus');
        } else {
            return redirect()->to(base_url('/master-tindakan'))->with('error', 'Gagal menghapus data Tindakan');
        }
    }

    public function addTindakan()
    {

        $data = [
            'nama_tindakan' => ucwords(strtolower($this->request->getPost('nama'))),
            'kode_tindakan' => $this->request->getPost('kode_tindakan'),
            'harga' => $this->request->getPost('harga'),
        ];

        if ($this->tindakanModel->insert($data)) {
            return redirect()->to(base_url('/master-tindakan'))->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Gagal menambahkan data');
        }
    }

    public function update()
    {
        $id = $this->request->getPost('id_tindakan');
        $tindakanLama = $this->tindakanModel->find($id);

        if (!$tindakanLama) {
            return redirect()->to(base_url('/master-tindakan'))
                ->with('error', 'Tindakan ' .$tindakanLama. ' tidak ditemukan');
        }

        // Ambil input
        $inputNama = ucwords(strtolower(trim($this->request->getPost('nama'))));
        $inputKode = $this->request->getPost('kode_tindakan');
        $inputHarga = $this->request->getPost('harga');

        // Siapkan array untuk perubahan
        $data = [];

        if ($inputNama && $inputNama !== $tindakanLama['nama_tindakan']) {
            $data['nama_tindakan'] = $inputNama;
        }

        if ($inputKode && $inputKode !== $tindakanLama['kode_tindakan']) {
            $data['kode_tindakan'] = $inputKode;
        }

        if ($inputHarga && $inputHarga !== $tindakanLama['harga']) {
            $data['harga'] = $inputHarga;
        }

        $notif = $inputNama ?: $tindakanLama['nama_tindakan'];
        if (!empty($data)) {
            $this->tindakanModel->update($id, $data);
            return redirect()->to(base_url('/master-tindakan'))->with('success', 'Data Tindakan ' . $notif . ' berhasil diperbarui');
        } else {
            return redirect()->to(base_url('/master-tindakan'))->with('info', 'Tidak ada perubahan data');
        }
    }
}
