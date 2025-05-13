<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AgamaModel;


class AgamaController extends BaseController
{
    protected $agamaModel;
    public function __construct()
    {
        $this->agamaModel = new AgamaModel();
    }
    public function index()
    {
        $agama = $this->agamaModel->findAll();
        $data = [
            'tittle' => 'Data Agama',
            'agama' => $agama,
        ];

        return view('data-master/agama', $data);
    }

    public function delete($id)
    {        
        $agama = $this->agamaModel->find($id);

        if (!$agama) {
            return redirect()->to(base_url('/master-agama'))->with('error', 'Agama tidak ditemukan');
        }

        $nama = $agama['nama_agama'];
        
        if ($this->agamaModel->delete($id)) {
            return redirect()->to(base_url('/master-agama'))->with('success', 'Data agama ' . $nama . ' berhasil dihapus');
        } else {
            return redirect()->to(base_url('/master-agama'))->with('error', 'Gagal menghapus data agama');
        }
    }

    public function addAgama()
    {        

        $data = [            
            'nama_agama' => ucwords(strtolower($this->request->getPost('nama'))),
        ];

        if ($this->agamaModel->insert($data)) {
            return redirect()->to(base_url('/master-agama'))->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Gagal menambahkan data');
        }
    }

    public function update()
    {
        $id = ucwords(strtolower($this->request->getPost('id_agama')));
        $agamaLama = $this->agamaModel->find($id);
        $nama = $agamaLama['nama_agama'];

        if (!$agamaLama) {
            return redirect()->to(base_url('/master-agama'))->with('error', 'Agama ' . $nama . ' tidak ditemukan');
        }

        // Ambil inputan
        $data = [];

        $inputNama = ucwords(strtolower($this->request->getPost('nama')));
        if (!empty($inputNama)) {
            $data['nama_agama'] = $inputNama;
        }
        
        $notif = $inputNama ?: $agamaLama['nama_agama'];
        if (!empty($data)) {
            $this->agamaModel->update($id, $data);
            return redirect()->to(base_url('/master-agama'))->with('success', 'Data agama ' . $notif . ' berhasil diperbarui');
        } else {
            return redirect()->to(base_url('/master-agama'))->with('info', 'Tidak ada perubahan data');
        }
    }
}
