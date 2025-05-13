<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // Cek apakah pengguna sudah login
        if (!session()->get('logged_in') || !in_array(session()->get('role'), [1, 2, 3])) {
            return redirect()->to('/')->with('error', 'Anda tidak memiliki akses.');
        }

        $userLevel = (string)$session->get('role');
        // Cek level akses jika ada argumen level
        if (!empty($arguments)) {
            $allowedRoles = array_map('strval', $arguments);
            if (!in_array($userLevel, $allowedRoles)) {
                return redirect()->to(base_url('/'))->with('error', 'Anda tidak memiliki akses ke halaman ini.');
            }
        }

        // Jika semua aman, lanjutkan request
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Kosong, karena tidak digunakan
    }
}
