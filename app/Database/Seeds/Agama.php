<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Agama extends Seeder
{
    public function run()
    {     
        $data = [
            ['nama_agama' => 'Islam'],
            ['nama_agama' => 'Kristen'],
            ['nama_agama' => 'Katolik'],
            ['nama_agama' => 'Hindu'],
            ['nama_agama' => 'Buddha'],
            ['nama_agama' => 'Konghucu'],
            ['nama_agama' => 'Lainnya'],
        ];

        $this->db->table('agama')->insertBatch($data);
    }
    
}
