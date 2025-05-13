<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Obat extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_obat' => 'Paracetamol',
                'kode_obat' => 'OBT001',
                'harga'     => 5000,
                'stok'      => 100,
                'satuan'    => 'tablet',                
            ],
            [
                'nama_obat' => 'Amoxicillin',
                'kode_obat' => 'OBT002',
                'harga'     => 10000,
                'stok'      => 50,
                'satuan'    => 'kapsul',                
            ],
            [
                'nama_obat' => 'Ibuprofen',
                'kode_obat' => 'OBT003',
                'harga'     => 7500,
                'stok'      => 75,
                'satuan'    => 'tablet',                
            ],
        ];

        $this->db->table('obat')->insertBatch($data);
    }
}
