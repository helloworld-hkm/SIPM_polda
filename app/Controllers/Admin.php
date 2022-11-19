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

    public function detail()
    {
        $data = [
            //         'user' => $this->user,
            'title' => 'POLDA JATENG - Detail Pengaduan',
            //         'data' => $this->pengaduan->find($id),
            //         'bukti' => $this->bukti->getBukti($id),

        ];


        // if (empty($data['data'])) {
        //     throw new \CodeIgniter\Exceptions\PageNotFoundException('Pengaduan tidak ditemukan.');
        // }

        return view('admin/pengaduan/detail_pengaduan', $data);
    }

    public function pengaduan_diproses()
    {
        $data = [
            // 'user' => $this->user,
            'title' => 'Daftar Pengaduan - Sedang Diproses'
        ];

        return view('admin/pengaduan/diproses', $data);
    }
    public function pengaduan_masuk()
    {
        $data = [
            // 'user' => $this->user,
            'title' => 'Daftar Pengaduan - Sedang masuk'
        ];

        return view('admin/pengaduan/masuk', $data);
    }
    public function pengaduan_selesai()
    {
        $data = [
            // 'user' => $this->user,
            'title' => 'Daftar Pengaduan - Sedang selesai'
        ];

        return view('admin/pengaduan/diselesaikan', $data);
    }
}
