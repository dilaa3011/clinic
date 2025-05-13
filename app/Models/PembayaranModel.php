<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id_bayar';
    protected $allowedFields = [
        'pasien_id',
        'tindakan_id',
        'obat_id',
        'resep_id',
        'no_bayar',
        'cara_pembayaran',
        'nama_petugas',
        'total_bayar',
        'tanggal_bayar',
    ];

    public function getPembayaran($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }

        return $this->find($id);
    }
}
