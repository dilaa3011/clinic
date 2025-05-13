<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JenisKelamin extends Seeder
{
    public function run()
    {
        $data = [
            ['nama_jenis_kelamin' => 'Laki-laki'],
            ['nama_jenis_kelamin' => 'Perempuan'],
        ];

        $this->db->table('jenis_kelamin')->insertBatch($data);
    }
}
