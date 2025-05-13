<?php

namespace App\Models;

use CodeIgniter\Model;

class PasienModel extends Model
{
    protected $table = 'pasien';
    protected $primaryKey = 'id_pasien';
    protected $useTimestamps = true;

    protected $allowedFields = [
        'jenis_kelamin_id',
        'agama_id',
        'pendidikan_id',
        'nama_lengkap',
        'nomor_rekam_medis',
        'nik',
        'identitas_lain',
        'nama_ibu_kandung',
        'tempat_lahir',
        'tanggal_lahir',
        'suku',
        'bahasa',
        'alamat_lengkap',
        'alamat_domisili',
        'rt',
        'rw',
        'kelurahan',
        'kecamatan',
        'kota',
        'kode_pos',
        'provinsi',
        'negara',
        'telepon_rumah',
        'telepon_selular',
        'pekerjaan',
        'status_pernikahan',
        'created_at',
        'updated_at'
    ];

    public function getPasien($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }

        return $this->find($id);
    }

    public function getPasienByNik($nik)
    {
        return $this->where('nik', $nik)->first();
    }
}
