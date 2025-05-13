<?php

namespace App\Models;

use CodeIgniter\Model;

class ObatModel extends Model
{
    protected $table = 'obat';
    protected $primaryKey = 'id_obat';
    protected $useAutoIncrement  = true;
    protected $allowedFields = [
        'nama_obat',
        'kode_obat',
        'harga',
        'stok',
        'satuan',
    ];

    public function getObat($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }

        return $this->find($id);
    }
}
