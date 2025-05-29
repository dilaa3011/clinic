<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = [
        'nama',
        'username',
        'password',
        'role',
        'email',
        'no_hp',        
        'foto',
        'jenis_kelamin_id',
        'created_at',
        'updated_at',        
    ];

    public function getUser($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }

        return $this->find($id);
    }

    public function getUserByUsername($username)
    {
        return $this->where('username', $username)->first();
    }
}
