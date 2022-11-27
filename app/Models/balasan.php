<?php

namespace App\Models;

use CodeIgniter\Model;

class balasan extends Model
{
    protected $table = 'balasan';
    // protected $useTimestamps = true;
    protected $primarykey = 'id';
    protected $allowedFields = ['id', 'id_pengaduan', 'kategori', 'balasan'];

    public function getBalasan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
