<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        return view('admin/home');
    }
    public function tentang()
    {
        return view('admin/profile');
    }
    public function pengguna()
    {
        return view('admin/pengguna');
    }
    public function pengaduan()
    {
        return view('admin/pengaduan');
    }
    // public function user()
    // {
    //     return view('auth/index');
    // }
}
