<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        //  $userlogin=user()->username;
        // $builder = $this->db->table('user');
        // $builder->select('username,email,created_at');
        // $this->builder->where('username',$userlogin);
        // $query = $this->builder->get();

        $data = [
            // 'user'=> $query->getResult(),
            'title' => 'POLDA JATENG - Home'
        ];

        return view('admin/home', $data);
    }
    public function tentang()
    {
        $data['title'] = 'POLDA JATENG - Profile';
        return view('admin/profile', $data);
    }
    public function pengguna()
    {
        $data = [
            // 'user'=> $query->getResult(),
            'title' => 'POLDA JATENG - Pengguna'
        ];
        return view('admin/kelola/index', $data);
    }
    public function pengaduan()
    {
        $data = [
            'title' => 'POLDA JATENG - Pengaduan'
        ];

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
