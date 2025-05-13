<?php

namespace App\Models;

use CodeIgniter\Model;

class TindakanModel extends Model
{
    protected $table = 'tindakan';
    protected $primaryKey = 'id_tindakan';
    protected $usePrimaryKey = true;
    protected $allowedFields = [
        'nama_tindakan',
        'kode_tindakan',
        'harga',
    ];

    public function getTindakan($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }

        return $this->find($id);
    }
}
