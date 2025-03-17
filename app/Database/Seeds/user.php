<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class User extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'manager',
                'nama' => 'Manager',
                'password' => password_hash('manager', PASSWORD_DEFAULT),
                'role' => '0',
            ],
            [
                'username' => 'admin',
                'nama' => 'Admin',
                'password' => password_hash('admin', PASSWORD_DEFAULT),
                'role' => '1',
            ],
            [
                'username' => 'dokter',
                'nama' => 'Dokter',
                'password' => password_hash('dokter', PASSWORD_DEFAULT),
                'role' => '2',
            ],
        ];
        $this->db->table('user')->insertBatch($data);
    }
}
