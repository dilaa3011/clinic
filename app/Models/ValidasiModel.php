<?php

namespace App\Models;

use CodeIgniter\Model;

class ValidasiModel extends Model
{
    protected $table      = 'validasi_tindakan';
    protected $primaryKey = 'id_validasi';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['tindakan_id', 'validasi', 'created_at', 'updated_at', 'rm_id'];

    protected $useTimestamps = true;
}
