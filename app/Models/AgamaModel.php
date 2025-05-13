<?php

namespace App\Models;

use CodeIgniter\Model;

class AgamaModel extends Model
{
    protected $table            = 'agama';
    protected $primaryKey       = 'id_agama';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [        
        'nama_agama'
    ];

}
