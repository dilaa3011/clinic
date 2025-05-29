<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ObatModel;

class ObatController extends BaseController
{
    protected $obatModel;
    public function __construct()
    {
        $this->obatModel = new ObatModel();
    }
    public function index()
    {
        $data = [
            'tittle' => 'Data Obat',
            'obat' => $this->obatModel->findAll(),
        ];
        return view('data-master/obat', $data);
    }
    public function delete($id)
    {
        $obat = $this->obatModel->find($id);

        if (!$obat) {
            return redirect()->to(base_url('/master-obat'))->with('error', 'Obat tidak ditemukan');
        }

        $nama = $obat['nama_obat'];

        if ($this->obatModel->delete($id)) {
            return redirect()->to(base_url('/master-obat'))->with('success', 'Data Obat ' . $nama . ' berhasil dihapus');
        } else {
            return redirect()->to(base_url('/master-obat'))->with('error', 'Gagal menghapus data Obat');
        }
    }

    public function addObat()
    {
        $data = [
            'nama_obat' => ucwords(strtolower($this->request->getPost('nama'))),
            'kode_obat' => $this->request->getPost('kode_obat'),
            'satuan' => $this->request->getPost('satuan'),
            'stok' => $this->request->getPost('stok'),
            'harga' => $this->request->getPost('harga'),
        ];

        if ($this->obatModel->insert($data)) {
            return redirect()->to(base_url('/master-obat'))->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->to(base_url('/master-obat'))->with('error', 'Gagal menambahkan data');
        }
    }

    public function update()
    {
        $id = $this->request->getPost('id_obat');
        $obatLama = $this->obatModel->find($id);

        if (!$obatLama) {
            return redirect()->to(base_url('/master-obat'))
                ->with('error', 'Obat ' .$obatLama. ' tidak ditemukan');
        }

        // Ambil input
        $inputNama = ucwords(strtolower(trim($this->request->getPost('nama'))));
        $inputKode = $this->request->getPost('kode_obat');
        $inputHarga = $this->request->getPost('harga');
        $inputStok = $this->request->getPost('stok');
        $inputSatuan = $this->request->getPost('satuan');
        

        // dd($obatLama);        
        // Siapkan array untuk perubahan
        $data = [];

        if ($inputNama && $inputNama !== $obatLama['nama_obat']) {
            $data['nama_obat'] = $inputNama;
        }

        if ($inputKode && $inputKode !== $obatLama['kode_obat']) {
            $data['kode_obat'] = $inputKode;
        }

        if ($inputHarga && $inputHarga !== $obatLama['harga']) {
            $data['harga'] = $inputHarga;
        }

        if ($inputStok && $inputStok !== $obatLama['stok']) {
            $data['stok'] = $inputStok;
        }

        if ($inputSatuan && $inputSatuan !== $obatLama['satuan']) {
            $data['satuan'] = $inputSatuan;
        }

        $notif = $inputNama ?: $obatLama['nama_obat'];
        if (!empty($data)) {
            $this->obatModel->update($id, $data);
            return redirect()->to(base_url('/master-obat'))->with('success', 'Data Obat ' . $notif . ' berhasil diperbarui');
        } else {
            return redirect()->to(base_url('/master-obat'))->with('info', 'Tidak ada perubahan data');
        }
    }
}
