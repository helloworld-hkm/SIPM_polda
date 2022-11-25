<?php

namespace App\Controllers;

use App\Models\Pengaduan;
use App\Models\bukti;
use App\Models\user;

class Admin extends BaseController
{
    protected $db, $builder;
    public function __construct()
    {

        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->pengaduan = new pengaduan();
        $this->bukti = new bukti();
        $this->user = new user();
        $this->validation = \Config\Services::validation();
    }
    public function index()
    {
        // $userlogin = user()->username;
        // $builder = $this->db->table('user');
        // $builder->select('username,email,created_at');
        // $this->builder->where('username', $userlogin);
        // $query = $this->builder->get();

        $data = [
            // 'user'=> $query->getResult(),
            'title' => 'POLDA JATENG - Home'
        ];

        return view('admin/home', $data);
    }
    public function tentang()
    {
        $userlogin = user()->username;
        $builder = $this->db->table('user');
        $builder->select('username,email,user,created_at');
        $this->builder->where('username', $userlogin);
        $query = $this->builder->get();
        $data = [
            'user' => $query->getRow(),
            'title' => 'Profile'
        ];
        return view('admin/profile', $data);
    }

    public function pengguna()
    {
        $this->builder = $this->db->table('users');
        $this->builder->select('*');
        $this->query = $this->builder->get();
        $data = [
            'pengguna' => $this->query->getResultArray(),
            'title' => 'Pengguna'
        ];

        return view('admin/kelola/index', $data);
    }
    public function pengaduan()
    {
        $this->builder = $this->db->table('pengaduan');
        $this->builder->select('*');
        $this->query = $this->builder->get();
        $data['pengaduan'] = $this->query->getResultArray();
        // dd(  $data['pengaduan']);
        $data['title'] = 'Pengaduan';
        return view('admin/pengaduan/index', $data);
    }

    public function detail($id)
    {
        $data=$this->db->table('pengaduan');
        $data->select('*');
        $data->where('id',$id);
        $query=$data->get()->getRow();
        
        $bukti=$this->db->table('tbl_bukti');
        $bukti->select('*');
        $bukti->where('pengaduan_id',$id);
        $query1=$bukti->get()->getRowArray();
   
        $data = [
            'bukti'=> $query1,
            'detail'=>$query,
            'title' => 'POLDA JATENG - Detail Pengaduan',
            'validation' => $this->validation,
        ];
        return view('admin/pengaduan/detail_pengaduan', $data);
    }

    public function pengaduan_diproses()
    {
        $this->builder = $this->db->table('pengaduan');
        $this->builder->select('*');
        $this->builder->where('status', 'diproses');
        $this->query = $this->builder->get();
        $data = [
            'pengaduan' => $this->query->getResultArray(),
            'title' => 'Daftar Pengaduan - Sedang DiProses'
        ];

        return view('admin/pengaduan/diproses', $data);
    }
    public function pengaduan_masuk()
    {
        $this->builder = $this->db->table('pengaduan');
        $this->builder->select('*');
        $this->builder->where('status', 'belum diproses');
        $this->query = $this->builder->get();
        $data = [
            'pengaduan' => $this->query->getResultArray(),
            'title' => 'Daftar Pengaduan - Masuk'
        ];

        return view('admin/pengaduan/masuk', $data);
    }
    public function pengaduan_selesai()
    {
        $this->builder = $this->db->table('pengaduan');
        $this->builder->select('*');
        $this->builder->where('status', 'selesai');
        $this->query = $this->builder->get();
        $data = [
            'pengaduan' => $this->query->getResultArray(),
            'title' => 'Daftar Pengaduan - Selesai'
        ];


        return view('admin/pengaduan/diselesaikan', $data);
    }
    public function prosesPengaduan($id)
    {
        $date = 
        $this->pengaduan->update($id,[
            'tanggal_diproses' => date("Y-m-d h:i:s"),
            // 'status' => 'diproses',

        ]);
        session()->setFlashdata('msg', 'Status Pengaduan berhasil Diubah');
        return redirect()->to('admin/pengaduan/detail/$id');
    }
}
