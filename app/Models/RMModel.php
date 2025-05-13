<?php

namespace App\Models;

use CodeIgniter\Model;

class RMModel extends Model
{
    protected $table = 'rekam_medis';
    protected $primaryKey = 'id_rm';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'pasien_id',
        'dokter_id',
        'penyakit_id',
        'resep_id',
        'tindakan_id',
        'no_rm',
        'riwayat_penyakit',
        'riwayat_alergi',
        'riwayat_pengobatan',
        'keluhan',
        'periksa_bibir_masuk_mulut',
        'periksa_gigi_geligi',
        'periksa_lidah',
        'periksa_langit_langit',
        'diagnosa',        
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
