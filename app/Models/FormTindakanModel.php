<?php

namespace App\Models;

use CodeIgniter\Model;

class FormTindakanModel extends Model
{
    protected $table            = 'formulir_tindakan';
    protected $primaryKey       = 'id_formulir';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'pasien_id',
        'tindakan_id',
        'petugas_pelaksana',
        'tanggal_pelaksanaan',
        'waktu_mulai',
        'waktu_selesai',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
