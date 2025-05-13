<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Dokter extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama'        => 'drg. Andi Saputra',
                'kode_dokter' => 'DKT001',
                'spesialis'   => 'Orthodonti',
                'nomor_hp'    => '081122334455',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'nama'        => 'Dr. Sonya Mayasari',
                'kode_dokter' => 'DKT002',
                'spesialis'   => 'Gigi Umum',
                'nomor_hp'    => '082233445566',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ]
        ];
        
        $this->db->table('dokter')->insertBatch($data);
    }
}
