<?php

namespace App\Models;

use CodeIgniter\Model;

class ResumePasienModel extends Model
{
    protected $table            = 'resumepasien';
    protected $primaryKey       = 'id_resume';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'nomer_rm',
        'pasien_id',
        'rm_id',
        'dokter_id',        
        'nama_lengkap',
        'tanggal_lahir',
        'tanggal_periksa',        
        'nama_dpjp', //nama dokter
        'anamnesa', //keluhan
        'diagnosa',        
        'catatan', 
        'created_at',
        'updated_at',
    ];
}
