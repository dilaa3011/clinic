<?php

namespace App\Models;

use CodeIgniter\Model;

class JeniskelaminModel extends Model
{
    protected $table            = 'jenis_kelamin';
    protected $primaryKey       = 'id_jenis_kelamin';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [        
        'nama_jenis_kelamin'        
    ];

}
