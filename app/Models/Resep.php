<?php

namespace App\Models;

use CodeIgniter\Model;

class Resep extends Model
{
    protected $table = 'resep';
    protected $primaryKey = 'id_resep';
    protected $allowedFields = [    
        'pasien_id',
        'dokter_id',
        'rm_id',
        'obat_id',
        'jumlah_obat',
        'dosis',
        'unit',
        'aturan_pakai',
        'keterangan',
        'status_resep', //sudah diberikan, belum diberikan
        'tanggal_resep',
    ];

    public function getResep($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }

        return $this->find($id);
    }
}
