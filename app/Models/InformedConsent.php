<?php

namespace App\Models;

use CodeIgniter\Model;

class InformedConsent extends Model
{
    protected $table            = 'informed_consent';
    protected $primaryKey       = 'id_consent';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields    = [
        'dokter_id',
        'pasien_id',
        'tindakan_id',
        'tanggal',
        'jam',
        'nama_lengkap',
        'no_rm',
        'tanggal_lahir',
        'jenis_kelamin',
        'persetujuan_pasien',
        'ketentuan_pembayaran',
        'hak_kewajiban',
        'tata_tertib',
        'butuh_penterjemah',
        'butuh_rohaniawan',
        'info_kerahasiaan',
        'info_pihak_penjamin',
        'info_hasil_pemeriksaan',
        'info_rujukan_fasyankes',
        'penanggung_jawab',
        'nama_petugas'
    ];

    public function getInformedConsent($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }

        return $this->find($id);
    }
}
