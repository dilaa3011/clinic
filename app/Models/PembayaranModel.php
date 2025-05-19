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

    public function getCaraPembayaranEnum()
    {
        // Query untuk mengambil enum values dari kolom cara_pembayaran
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $column = 'cara_pembayaran';

        // Menjalankan query SHOW COLUMNS untuk mendapatkan data enum
        $query = $db->query("SHOW COLUMNS FROM {$this->table} LIKE '{$column}'");
        $result = $query->getRow();

        // Menarik nilai enum dari `Type` dan menghapus bagian 'enum(' dan ')'
        preg_match('/^enum\((.*)\)$/', $result->Type, $matches);
        $enumValues = explode(',', $matches[1]);

        // Menghilangkan tanda petik
        $enumValues = array_map(function($value) {
            return trim($value, "'");
        }, $enumValues);

        return $enumValues;
    }
}
