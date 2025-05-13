<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SedeerAll extends Seeder
{
    public function run()
    {
        $this->call('Obat');
        $this->call('Dokter');
        $this->call('Tindakan');
        $this->call('agama');       
        $this->call('jenisKelamin');
        $this->call('pendidikan');        
        // $this->call('User');
    }
}
