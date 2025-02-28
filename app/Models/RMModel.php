<?php

namespace App\Models;

use CodeIgniter\Model;

class RMModel extends Model
{
    protected $table = 'rekam_medis';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'pasien_id',
        'dokter_id',
        'no_rm',
        'nomor_antrian',
        'keluhan',
        'diagnosa',
        'tindakan',
        'resep',
        'catatan',
        'tanggal_periksa',
        'created_at',
        'updated_at'
    ];

    public function getRekamMedis()
    {
        return $this->findAll();
    }

    public function getRekamMedisByPasienId($pasienId)
    {
        return $this->where('pasien_id', $pasienId)->findAll();
    }


    public function addRekamMedis($data)
    {
        return $this->insert($data);
    }
}
