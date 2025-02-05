<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
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
            return redirect()->to('/login')->with('error', 'Username dan Password wajib diisi');
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->getUserByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'id_user'  => $user['id_user'],
                'username' => $user['username'],
                'nama'     => $user['nama'],
                'role'     => $user['role'],
                'logged_in' => true
            ]);
            return redirect()->to(base_url('/dashboard'));
        }

        session()->setFlashdata('error', 'Username atau Password salah');
        return redirect()->to(base_url('/'));
    }
}
