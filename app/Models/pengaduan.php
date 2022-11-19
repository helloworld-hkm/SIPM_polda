<?php

namespace App\Models;
use CodeIgniter\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduan';
    // protected $useTimestamps = true;
    protected $primarykey = 'id';
    protected $allowedFields = ['id_user','nama_pengadu', 'perihal', 'detail', 'tanggal_pengaduan', 'status'];

    public function getPengaduan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
