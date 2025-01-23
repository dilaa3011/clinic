<?php

namespace App\Models;

use CodeIgniter\Model;

class PasienModel extends Model
{
    protected $table = 'pasien';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nik',
        'nama',
        'alamat',
        'telepon',
        'pekerjaan',
        'tanggal_lahir',
        'jenis_kelamin'
    ];

    public function getPasien($id = null)
    {
        if ($id === null) {
            return $this->select('pasien.*, rekam_medis.keluhan, rekam_medis.diagnosa')
                ->join('rekam_medis', 'pasien.id = rekam_medis.pasien_id', 'left')
                ->findAll();
        }

        return $this->find($id);
    }

    public function getPasienByNik($nik)
    {
        return $this->where('nik', $nik)->first();
    }
}
