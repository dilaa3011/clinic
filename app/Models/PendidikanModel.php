<?php

namespace App\Models;

use CodeIgniter\Model;

class PendidikanModel extends Model
{
    protected $table            = 'pendidikan';
    protected $primaryKey       = 'id_pendidikan';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'nama_pendidikan'
    ];

}
