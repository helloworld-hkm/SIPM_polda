<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        return view('user/profile');
    }

    public function tentang()
    {
        return view('user/profile');
    }
    public function pengguna()
    {
        return view('user/pengguna');
    }
    public function pengaduan()
    {
        return view('user/pengaduan/index');
    }

    public function tambah()
    {

        return view('user/pengaduan/tambah_pengaduan');
    }

    public function detail()
    {

        return view('user/pengaduan/detail');
    }
    public function ubah()
    {

        return view('user/pengaduan/ubah_pengaduan');
    }
}
