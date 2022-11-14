<?php

namespace App\Models;
use CodeIgniter\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduan';
    // protected $useTimestamps = true;
    protected $primarykey = 'id';
    protected $allowedFields = ['nama_pengadu', 'perihal', 'detail', 'tanggal_pengaduan', 'status', 'bukti'];

    public function getPengaduan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
?>