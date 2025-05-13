<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Tindakan extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_tindakan' => 'Tambal Gigi',
                'kode_tindakan' => 'TDK001',
                'harga'         => 150000,                
            ],
            [
                'nama_tindakan' => 'Cabut Gigi',
                'kode_tindakan' => 'TDK002',
                'harga'         => 200000,                
            ],
            [
                'nama_tindakan' => 'Pembersihan Karang Gigi',
                'kode_tindakan' => 'TDK003',
                'harga'         => 100000,                
            ]
        ];

        $this->db->table('tindakan')->insertBatch($data);
    }
}
