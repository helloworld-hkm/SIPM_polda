<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table = 'users';
    // protected $useTimestamps = true;
    protected $primarykey = 'id';
    protected $allowedFields = ['username', 'email', 'foto', 'password_hash'];

    public function getUsers($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
