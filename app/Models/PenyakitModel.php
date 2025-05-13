<?php

namespace App\Models;

use CodeIgniter\Model;

class PenyakitModel extends Model
{
    protected $table = 'penyakit';
    protected $primaryKey = 'id_penyakit';  
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'nama_penyakit',
        'kode_penyakit',
    ];

    public function getPenyakit($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }

        return $this->find($id);
    }
}
