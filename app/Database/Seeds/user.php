<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class User extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama'          => 'Admin Utama',
                'username'      => 'admin',
                'password'      => password_hash('admin123', PASSWORD_DEFAULT),
                'role'          => '2',
                'foto'          => 'clinic/assets/admin.png',
                'email'         => 'admin@gmail.com',
                'no_hp'         => '081234567890',
                'jenis_kelamin' => 'L',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'nama'          => 'Dokter Klinik',
                'username'      => 'dokter',
                'password'      => password_hash('dokter123', PASSWORD_DEFAULT),
                'role'          => '1',
                'foto'          => 'clinic/assets/dentist.png',
                'email'         => 'dokter@gmail.com',
                'no_hp'         => '089876543210',
                'jenis_kelamin' => 'P',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ]
        ];
        $this->db->table('user')->insertBatch($data);
    }
}
