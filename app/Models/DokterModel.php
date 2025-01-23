<?php

namespace App\Models;

use CodeIgniter\Model;

class DokterModel extends Model
{
    protected $table = 'tb_dokter';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'nama',
        'spesialis'
    ];

    public function getDokter($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }

        return $this->find($id);
    }
}
