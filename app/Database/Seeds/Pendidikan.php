<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Pendidikan extends Seeder
{
    public function run()
    {
        $data = [
            ['nama_pendidikan' => 'Tidak Sekolah'],
            ['nama_pendidikan' => 'SD'],
            ['nama_pendidikan' => 'SMP'],
            ['nama_pendidikan' => 'SMA/SMK'],
            ['nama_pendidikan' => 'Diploma'],
            ['nama_pendidikan' => 'Sarjana'],
            ['nama_pendidikan' => 'Magister'],
            ['nama_pendidikan' => 'Doktor'],
        ];

        $this->db->table('pendidikan')->insertBatch($data);
    }
}
