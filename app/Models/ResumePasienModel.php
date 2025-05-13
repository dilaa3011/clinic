<?php

namespace App\Models;

use CodeIgniter\Model;

class ResumePasienModel extends Model
{
    protected $table            = 'resumePasien';
    protected $primaryKey       = 'id_resume';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'nomer_rm',
        'pasien_id',
        'rm_id',
        'dokter_id',        
        'nama_lengkap',
        'tanggal_lahir',
        'tanggal_masuk',
        'tanggal_keluar',
        'nama_dpjp',
        'anamnesa',
        'diagnosa',
        'terapi',
        'anjuran',        
    ];
}
