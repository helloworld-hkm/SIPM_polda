<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduan';
    // protected $useTimestamps = true;
    protected $primarykey = 'id';
    protected $allowedFields = ['id_user', 'id', 'nama_pengadu', 'perihal', 'detail', 'tanggal_pengaduan', 'tanggal_diproses', 'status', 'status_akhir', 'tanggal_selesai'];

    public function getPengaduan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    public function getAll()
    {
        $query = $this->table('pengaduan')->query('select * from pengaduan');
        return $query->getResult();
    }
}
