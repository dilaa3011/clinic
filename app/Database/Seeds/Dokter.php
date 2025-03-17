<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Dokter extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id'    => 101,
                'nama'      => 'Dr. Sonya Mayasari',
                'spesialis' => 'Gigi',
            ],
        ];

        // Insert data ke tabel tb_dokter
        $this->db->table('tb_dokter')->insertBatch($data);
    }
}
