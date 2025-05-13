<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    protected $session;
    public function __construct()
    {
        $this->session = session();
    }
    public function index()
    {
        $data = [
            'tittle' => 'Login'
        ];
        return view('auth/login', $data);
    }

    public function login()
    {
        if (!$this->validate([
            'username' => 'required',
            'password' => 'required'
        ])) {
            return redirect()->to(base_url('/'))->with('error', 'Username dan Password wajib diisi');
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->getUserByUsername($username);
        // dd($user);

        if ($user && password_verify($password, $user['password'])) {

            $foto = ($user['role'] == '1') ? 'clinic/assets/dentist.png' : 'clinic/assets/admin.png';
            if (!in_array($user['role'], ['1', '2', '3'])) {
                return redirect()->to(base_url('/'))->with('error', 'Level akun tidak diizinkan!');
            }
           
            // Cek jika role adalah dokter, cari dokter yang cocok
            $dokterData = null;
            if ($user['role'] == '1') {
                $dokterModel = new \App\Models\DokterModel();
                $dokterData = $dokterModel->findByNameLike($user['nama']);

                // Kalau data dokter tidak ditemukan
                if (!$dokterData) {
                    return redirect()->to(base_url('/'))->with('error', 'Akun dokter tidak ditemukan di data dokter!');
                }
            }

             // Set session
            $this->session->set([
                'id_user'       => $user['id_user'],
                'username'      => $user['username'],
                'nama'          => $user['nama'],
                'role'          => $user['role'],
                'no_hp'         => $user['no_hp'],
                'email'         => $user['email'],
                'jenis_kelamin' => $user['jenis_kelamin_id'],
                'foto'          => $foto,
                'logged_in'     => true,
                'id_dokter'     => $dokterData['id_dokter'] ?? null, // hanya jika dokter
            ]);

            switch ($user['role']) {
                case 1: // Manager
                    return redirect()->to(base_url('/dashboard'));
                case 2: // Admin
                    return redirect()->to(base_url('/dashboard'));
                case 3: // Kasir
                    return redirect()->to(base_url('/dashboard'));
                default:
                    return redirect()->to(base_url('/dashboard'));
            }

            return redirect()->to(base_url('/dashboard'))->with('success', 'Selamat datang ' . $user['nama'] . '!');
        }else {
            return redirect()->back()->with('error', 'Username atau Password salah!');
        }

        return redirect()->to(base_url('/'))->with('error', 'Username atau Password salah!');
    }



    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/'));
    }
}
