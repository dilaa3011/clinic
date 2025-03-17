<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Pasien extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nik' => '352546756455',
                'nama' => 'Tiger Nixon',
                'alamat' => 'Edinburgh',
                'telepon' => '894759230983',
                'pekerjaan' => 'Developer',
                'tanggal_lahir' => '1990-05-20',
                'jenis_kelamin' => 'laki-laki',
            ],
            [
                'nik' => '352546756456',
                'nama' => 'Jane Doe',
                'alamat' => 'London',
                'telepon' => '894759230984',
                'pekerjaan' => 'Designer',
                'tanggal_lahir' => '1992-08-15',
                'jenis_kelamin' => 'perempuan',
            ],
        ];

        $this->db->table('pasien')->insertBatch($data);
    }
}
