<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        return view('user/home');
    }

    // public function user()
    // {
    //     return view('auth/index');
    // }
}
