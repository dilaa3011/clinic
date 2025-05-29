<?php

namespace App\Models;

use CodeIgniter\Model;

class DokterModel extends Model
{
    protected $table = 'dokter';
    protected $primaryKey = 'id_dokter';
    protected $useTimestamps = true;
    protected $allowedFields = [        
        'nama',
        'kode_dokter',
        'spesialis',
        'nomor_hp',
        'ttd',
        'created_at',
        'updated_at',
    ];

    public function findByNameLike($name)
    {
        return $this->like('nama', $name)->first(); 
    }

    public function getDokter($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }

        return $this->find($id);
    }
}
