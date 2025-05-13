<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JeniskelaminModel;

class GenderController extends BaseController
{
    protected $genderModel;
    public function __construct()
    {
        $this->genderModel = new JeniskelaminModel();
    }
    public function index()
    {
        $data = [
            'tittle' => 'Data Jenis Kelamin',
            'jenis_kelamin' => $this->genderModel->findAll(),
        ];
        return view('data-master/gender', $data);
    }

    public function delete($id)
    {
        $gender = $this->genderModel->find($id);

        if (!$gender) {
            return redirect()->to(base_url('/master-gender'))->with('error', 'Jenis Kelamin tidak ditemukan');
        }

        $nama = $gender['nama_jenis_kelamin'];

        if ($this->genderModel->delete($id)) {
            return redirect()->to(base_url('/master-gender'))->with('success', 'Data jenis kelamin ' . $nama . ' berhasil dihapus');
        } else {
            return redirect()->to(base_url('/master-gender'))->with('error', 'Gagal menghapus data jenis kelamin');
        }
    }

    public function addGender()
    {

        $data = [
            'nama_jenis_kelamin' => ucwords(strtolower($this->request->getPost('nama'))),
        ];

        if ($this->genderModel->insert($data)) {
            return redirect()->to(base_url('/master-gender'))->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Gagal menambahkan data');
        }
    }

    public function update()
    {
        $id = $this->request->getPost('id_jenis_kelamin');
        $genderLama = $this->genderModel->find($id);
        $nama = $genderLama['nama_jenis_kelamin'];

        if (!$genderLama) {
            return redirect()->to(base_url('/master-gender'))->with('error', 'Jenis Kelamin ' . $nama . ' tidak ditemukan');
        }

        // Ambil inputan
        $data = [];

        $inputNama = ucwords(strtolower($this->request->getPost('nama')));
        if (!empty($inputNama)) {
            $data['nama_jenis_kelamin'] = $inputNama;
        }

        $notif = $inputNama ?: $genderLama['nama_jenis_kelamin'] ;
        if (!empty($data)) {
            $this->genderModel->update($id, $data);
            return redirect()->to(base_url('/master-gender'))->with('success', 'Data jenis kelamin ' . $notif. ' berhasil diperbarui');
        } else {
            return redirect()->to(base_url('/master-gender'))->with('info', 'Tidak ada perubahan data');
        }
    }
}
