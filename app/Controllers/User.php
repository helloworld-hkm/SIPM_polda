<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        return view('user/home');
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
        return view('user/pengaduan');
    }
}
