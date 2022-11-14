<?php

namespace App\Controllers;
use App\Models\Pengaduan;
class User extends BaseController
{ 
    protected $db,$builder;
    public function __construct(){

        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->pengaduan=new pengaduan();
       
    }
    public function index()
    {
        $userlogin=user()->username;
      
        $builder = $this->db->table('users');
        $builder->select('username,email,created_at');
       $builder->where('username',$userlogin);
        $query = $builder->get();
       
        $data=[
            'user'=> $query->getRow(),
            'title'=>'Home'
        ];
        // dd($data['user']);
        return view('user/profile',$data);
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
    public function simpanPengaduan()
    {
        if ($this->request->getPost('nama_pengadu')=='anonym') {
           $nama_pengadu=$this->request->getPost('nama_pengadu');
        }else{
            $nama_pengadu=$this->request->getPost('pengadu');
        }
    $date=date("Y/m/d h:i:s");
        $dataPengaduan = [
            'perihal'=>$this->request->getPost('judul_pengaduan'),
            'detail'=>$this->request->getPost('isi_pengaduan'),
            'nama_pengadu'=>$nama_pengadu,
            'tanggal_pengaduan'=>$date,
            'status' =>'belum diproses',
            'bukti'=> 'dummy.jpg'
        ];
        $this->pengaduan->save($dataPengaduan);
        return redirect()->to('user/pengaduan/tambah_pengaduan');
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
