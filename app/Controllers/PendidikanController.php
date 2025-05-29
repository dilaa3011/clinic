<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PendidikanModel;

class PendidikanController extends BaseController
{
    protected $pendidikanModel;
    public function __construct(){
        $this->pendidikanModel = new PendidikanModel();
    }

    public function index()
    {         
        $data = [
            'tittle' => 'Data Pendidikan',
            'pendidikan' => $this->pendidikanModel->findAll(),
        ];

        return view('data-master/pendidikan', $data);
    }

    public function delete($id)
    {        
        $pendidikan = $this->pendidikanModel->find($id);

        if (!$pendidikan) {
            return redirect()->to(base_url('/master-pendidikan'))->with('error', 'Pendidikan tidak ditemukan');
        }

        $nama = $pendidikan['nama_pendidikan'];
        
        if ($this->pendidikanModel->delete($id)) {
            return redirect()->to(base_url('/master-pendidikan'))->with('success', 'Data pendidikan ' . $nama . ' berhasil dihapus');
        } else {
            return redirect()->to(base_url('/master-pendidikan'))->with('error', 'Gagal menghapus data pendidikan');
        }
    }

    public function addPendidikan()
    {
        $data = [            
            'nama_pendidikan' =>ucwords(strtolower($this->request->getPost('nama'))),
        ];

        if ($this->pendidikanModel->insert($data)) {
            return redirect()->to(base_url('/master-pendidikan'))->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Gagal menambahkan data');
        }
    }

    public function update()
    {
        $id = $this->request->getPost('id_pendidikan');
        $pendidikanLama = $this->pendidikanModel->find($id);
        $nama = $pendidikanLama['nama_pendidikan'];

        if (!$pendidikanLama) {
            return redirect()->to(base_url('/master-pendidikan'))->with('error', 'Pendidikan ' . $nama . ' tidak ditemukan');
        }

        // Ambil inputan
        $data = [];

        $inputNama =ucwords(strtolower($this->request->getPost('nama')));
        if (!empty($inputNama)) {
            $data['nama_pendidikan'] = $inputNama;
        }
        
        $notif = $inputNama ?: $pendidikanLama['nama_pendidikan'];
        if (!empty($data)) {
            $this->pendidikanModel->update($id, $data);
            return redirect()->to(base_url('/master-pendidikan'))->with('success', 'Data pendidikan ' . $notif . ' berhasil diperbarui');
        } else {
            return redirect()->to(base_url('/master-pendidikan'))->with('info', 'Tidak ada perubahan data');
        }
    }
}
