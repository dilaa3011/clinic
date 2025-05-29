<?php

namespace App\Models;

use CodeIgniter\Model;

class OdontogramModel extends Model
{
    protected $table            = 'odontogram';
    protected $primaryKey       = 'id_odontogram';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
    'pasien_id', 'rm_id',
    'g11', 'g12', 'g13', 'g14', 'g15', 'g16', 'g17', 'g18',
    'g21', 'g22', 'g23', 'g24', 'g25', 'g26', 'g27', 'g28',
    'g31', 'g32', 'g33', 'g34', 'g35', 'g36', 'g37', 'g38',
    'g41', 'g42', 'g43', 'g44', 'g45', 'g46', 'g47', 'g48'
];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';


    public function getWithPasienAndRM($id = null)
    {
        $builder = $this->select('odontogram.*, pasien.nama as nama_pasien, rekam_medis.tanggal_periksa')
            ->join('pasien', 'pasien.id_pasien = odontogram.pasien_id')
            ->join('rekam_medis', 'rekam_medis.id_rm = odontogram.rm_id');

        return $id ? $builder->where('id_odontogram', $id)->first()
            : $builder->findAll();
    }
}
