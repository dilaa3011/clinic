<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\JeniskelaminModel;

class UserController extends BaseController
{
    protected $userModel;
    protected $genderModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->genderModel = new JeniskelaminModel();
    }
    public function index()
    {
        $gender = $this->genderModel->findAll();
        $data = [
            'tittle' => 'Data User',
            'user' => $this->userModel
                ->select('user.*, jenis_kelamin.nama_jenis_kelamin')
                ->join('jenis_kelamin', 'jenis_kelamin.id_jenis_kelamin = user.jenis_kelamin_id')
                ->findAll(),
            'jenisKelamin' => $gender,

        ];
        return view('/data-master/user', $data);
    }

    public function update()
    {
        $userModel = new \App\Models\UserModel();

        $id = $this->request->getPost('id_user');
        $oldData = $userModel->find($id);

        if (!$oldData) {
            return redirect()->to(base_url('/master-user'))->with('error', 'Data user tidak ditemukan.');
        }

        // Ambil input dari form
        $input = [
            'nama'             => $this->request->getPost('nama'),
            'username'         => $this->request->getPost('username'),
            'email'            => $this->request->getPost('email'),
            'no_hp'            => $this->request->getPost('no_hp'),
            'role'             => $this->request->getPost('role'),
            'jenis_kelamin_id' => $this->request->getPost('jenis_kelamin_id'),
        ];

        // Tentukan foto berdasarkan role
        $fotoMap = [
            '1' => 'clinic/assets/dentist.png',
            '2' => 'clinic/assets/admin.png',
            '3' => 'clinic/assets/staff.png',
        ];

        // Tambahkan foto jika role berubah atau belum ada
        if ($input['role'] != $oldData['role'] || empty($oldData['foto'])) {
            $input['foto'] = $fotoMap[$input['role']] ?? $oldData['foto'];
        }

        // Bandingkan dan simpan hanya data yang berubah
        $updateData = [];
        foreach ($input as $key => $value) {
            if ($value != $oldData[$key]) {
                $updateData[$key] = $value;
            }
        }

        if (!empty($updateData)) {
            $updateData['updated_at'] = date('Y-m-d H:i:s');
            $userModel->update($id, $updateData);
            return redirect()->to(base_url('/master-user'))->with('success', 'Data user berhasil diperbarui.');
        } else {
            return redirect()->to(base_url('/master-user'))->with('info', 'Tidak ada perubahan data.');
        }
    }

    public function addUser()
    {
        $role = $this->request->getPost('role');

        // Tentukan foto berdasarkan role
        $foto = ($role == '1') ? 'clinic/assets/dentist.png' : 'clinic/assets/admin.png';

        $data = [
            'nama'              => ucwords(strtolower($this->request->getPost('nama'))),
            'email'             => $this->request->getPost('email'),
            'username'          => $this->request->getPost('username'),
            'password'          => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'no_hp'             => $this->request->getPost('no_hp'),
            'role'              => $role,
            'foto'              => $foto,
            'jenis_kelamin_id'  => $this->request->getPost('jenis_kelamin_id'),
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ];

        if ($this->userModel->insert($data)) {
            return redirect()->to(base_url('/master-user'))->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Gagal menambahkan data');
        }
    }


    public function delete($id)
    {
        $user = $this->userModel->find($id);

        if (!$user) {
            return redirect()->to(base_url('/master-user'))->with('error', 'User tidak ditemukan');
        }

        $nama = $user['nama'];

        if ($this->userModel->delete($id)) {
            return redirect()->to(base_url('/master-user'))->with('success', 'Data User ' . $nama . ' berhasil dihapus');
        } else {
            return redirect()->to(base_url('/master-user'))->with('error', 'Gagal menghapus data user');
        }
    }
}
