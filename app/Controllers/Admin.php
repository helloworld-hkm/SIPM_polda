<?php

namespace App\Controllers;

use App\Models\Pengaduan;
use App\Models\bukti;
use App\Models\user;
use App\Models\balasan;
use App\Models\profil;
use Myth\Auth\Entities\passwd;
use Myth\Auth\Models\UserModel;


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
        $this->balasan = new balasan();
        $this->profil = new profil;
        $this->validation = \Config\Services::validation();
    }
    public function index()
    {
        // $userlogin = user()->username;
        // $builder = $this->db->table('user');
        // $builder->select('username,email,created_at');
        // $this->builder->where('username', $userlogin);
        // $query = $this->builder->get();

        $userlogin = user()->id;
        $data = $this->db->table('pengaduan');
        $query1 = $data->get()->getResult();
        $query2 = $data->where('status', 'diproses')->get()->getResult();
        $query3 = $data->where('status', 'selesai')->get()->getResult();
        $semua = count($query1);

        $data = [
            // 'user'=> $query->getResult(),
            'title' => 'POLDA JATENG - Home',
            'semua' => $semua,
            'proses' => count($query2),
            'selesai' => count($query3),
        ];

        return view('admin/home', $data);
    }
    public function tentang()
    {
        $userlogin = user()->username;
        $userid = user()->id;
        $role = $this->db->table('auth_groups_users')->where('user_id', $userid)->get()->getRow();
        // dd($role);
        $role->group_id == '1' ? $role_echo = 'Admin' : $role_echo = 'User';


        $builder = $this->db->table('user');
        $builder->select('username,email,user,created_at');
        $this->builder->where('username', $userlogin);
        $query = $this->builder->get();
        $data = [
            'user' => $query->getRow(),
            'title' => 'Profile',
            'validation' => $this->validation,
            'role' => $role_echo
        ];
        return view('admin/profile', $data);
    }

    public function simpanProfile($id)
    {
        $userlogin = user()->username;
        $builder = $this->db->table('users');
        $builder->select('*');
        $query = $builder->where('username', $userlogin)->get()->getRowArray();



        $foto = $this->request->getFile('foto');
        if ($foto->getError() == 4) {
            $this->profil->update($id, [
                'email' => $this->request->getPost('email'),
                'username' => $this->request->getPost('username'),
            ]);
        } else {


            $nama_foto = 'AdminFOTO' . $this->request->getPost('username') . '.' . $foto->guessExtension();
            if (!(empty($query['foto']))) {
                unlink('uploads/profile/' . $query['foto']);
            }
            $foto->move('uploads/profile', $nama_foto);

            $this->profil->update($id, [
                'email' => $this->request->getPost('email'),
                'username' => $this->request->getPost('username'),
                'foto' => $nama_foto
            ]);
        }
        session()->setFlashdata('msg', 'Profil Pengaduan  berhasil Diubah');
        return redirect()->to('/admin/tentang/' . $id);
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
        $data = $this->db->table('pengaduan');
        $data->select('*');
        $data->where('id', $id);
        $query = $data->get()->getRow();

        $d = $this->db->table('balasan');
        $d->select('*');
        $d->where('id_pengaduan', $id);
        $balasan = $d->get()->getRow();

        $bukti = $this->db->table('tbl_bukti');
        $bukti->select('*');
        $bukti->where('pengaduan_id', $id);
        $query1 = $bukti->get()->getRowArray();

        $data = [
            'bukti' => $query1,
            'detail' => $query,
            'balasan' => $balasan,
            'title' => 'POLDA JATENG - Detail Pengaduan',
            'validation' => $this->validation,
        ];

        return view('admin/pengaduan/detail_pengaduan', $data);
    }

    public function updatePassword($id)
    {



        $passwordLama = $this->request->getPost('passwordLama');
        $passwordbaru = $this->request->getPost('passwordBaru');
        $konfirm = $this->request->getPost('konfirm');

        if ($passwordbaru != $konfirm) {
            session()->setFlashdata('error-msg', 'Password Baru tidak sesuai');
            return redirect()->to(base_url('admin/tentang/' . $id));
        }
        $builder = $this->db->table('users');
        $this->builder->where('id', user()->id);
        $query = $this->builder->get()->getRow();
        $verify_pass = password_verify(base64_encode(hash('sha384', $passwordLama, true)), $query->password_hash);

        // dd($query);
        if ($verify_pass) {
            $users = model(UserModel::class);
            $entity = new passwd();
            $entity->setPassword($passwordbaru);
            $hash  = $entity->password_hash;
            $users->update($id, ['password_hash' => $hash]);
            session()->setFlashdata('msg', 'Password berhasil Diubah');
            return redirect()->to('/admin/tentang/' . $id);
        } else {
            session()->setFlashdata('error-msg', 'Password Lama tidak sesuai');
            return redirect()->to(base_url('admin/tentang/' . $id));
        }
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
            $this->pengaduan->update($id, [
                'tanggal_diproses' => date("Y-m-d h:i:s"),
                'status' => 'diproses',

            ]);
        session()->setFlashdata('msg', 'Status Pengaduan berhasil Diubah');
        return redirect()->to('admin/detail/' . $id);
    }
    public function terimaPengaduan($id)
    {

        $this->pengaduan->update($id, [
            'tanggal_selesai' => date("Y-m-d h:i:s"),
            'status' => 'selesai',
            'status_akhir' => 'diterima'

        ]);
        session()->setFlashdata('msg', 'Status Pengaduan berhasil Diubah');
        return redirect()->to('admin/detail/' . $id);
    }

    public function simpanBalasan($id)
    {
        $rules = [
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori  wajib diisi.'
                ]
            ],
            'balasan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi Balasan wajib diisi.',

                ]
            ],

        ];

        if (!$this->validate($rules)) {
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/detail/' . $id)->withInput('validation', $validation);
        }
        $this->pengaduan->update($id, [
            'tanggal_selesai' => date("Y-m-d h:i:s"),
            'status' => 'selesai',
            'status_akhir' => 'ditolak'

        ]);
        $data = [
            'id_pengaduan' => $id,
            'kategori' => $this->request->getPost('kategori'),
            'balasan' => $this->request->getPost('balasan')

        ];
        $this->balasan->save($data);
        session()->setFlashdata('msg', 'Status Pengaduan berhasil Diubah');
        return redirect()->to('admin/detail/' . $id);
    }
}
