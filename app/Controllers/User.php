<?php

namespace App\Controllers;

use App\Models\Pengaduan;
use App\Models\bukti;
use CodeIgniter\Database\Query;

class User extends BaseController
{
    protected $db, $builder;
    public function __construct()
    {

        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->pengaduan = new pengaduan();
        $this->bukti = new bukti();
        $this->validation = \Config\Services::validation();
    }
    public function index()
    {
        $userlogin = user()->username;

        $builder = $this->db->table('users');
        $builder->select('username,email,created_at');
        $builder->where('username', $userlogin);
        $query = $builder->get();

        $data = [
            'user' => $query->getRow(),
            'title' => 'Home'
        ];
        // dd($data['user']);
        return view('user/profile', $data);
    }

    public function tentang()
    {
        $userlogin = user()->username;

        $builder = $this->db->table('users');
        $builder->select('username,email,created_at');
        $builder->where('username', $userlogin);
        $query = $builder->get();

        $data = [
            'user' => $query->getRow(),
            'title' => 'Home'
        ];
        return view('user/profile', $data);
    }
    public function pengguna()
    {
        return view('user/pengguna');
    }
    public function pengaduan()
    {

        // $builder    = $this->db->table('pengaduan');
        // $builder->orderBy('id', 'ASC');
        // $query      = $builder->get()->getResult();
        // $data['pengaduan'] = $query;
        $this->builder = $this->db->table('pengaduan');
        $this->builder->select('*');
        $this->builder->where('id_user', user()->id);
        $this->query = $this->builder->get();
        $data['pengaduan'] = $this->query->getResultArray();
        // dd(  $data['pengaduan']);
        $data['title'] = 'Pengaduan';
        return view('user/pengaduan/index', $data);
    }

    public function tambah()
    {
        $data = [
            'validation' => $this->validation,
            'title'=>'Tambah Pengaduan'
        ];

        return view('user/pengaduan/tambah_pengaduan', $data);
    }
    public function simpanPengaduan()
    {
        $rules = [
            'judul_pengaduan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Perihal pengaduan wajib diisi.'
                ]
            ],
            'isi_pengaduan' => [
                'rules' => 'required|min_length[30]',
                'errors' => [
                    'required' => 'Isi pengaduan wajib diisi.',
                    'min_length' => 'Minimal 30 karakter.'
                ]
            ],
            'images' => [
                'rules' => 'uploaded[images.0]|max_size[images,1024]|is_image[images]|mime_in[images,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Satu file wajib ada.',
                    'max_size' => 'Anda mengupload file yang melebihi ukuran maksimal.',
                    'is_image' => 'Anda mengupload file yang bukan gambar.',
                    'mime_in' => 'Anda mengupload file yang bukan gambar.'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            $validation = \Config\Services::validation();
            return redirect()->to('/user/tambah')->withInput('validation', $validation);
        }

        $images = $this->request->getFileMultiple('images');
        $jumlahFile = count($images);
        if ($jumlahFile > 3) { // jika jumlah file melebihi aturan (3)
            session()->setFlashdata('err-files', '<span class="text-danger">Jumlah file yang anda upload melebihi aturan.</span>');
            return redirect()->to('/user/tambah');
        }

        if ($this->request->getPost('nama_pengadu') == 'anonym') {
            $nama_pengadu = $this->request->getPost('nama_pengadu');
        } else {
            $nama_pengadu = $this->request->getPost('pengadu');
        }
        $date = date("Y/m/d h:i:s");
        $dataPengaduan = [
            'id_user' => user()->id,
            'perihal' => $this->request->getPost('judul_pengaduan'),
            'detail' => $this->request->getPost('isi_pengaduan'),
            'nama_pengadu' => $nama_pengadu,
            'tanggal_pengaduan' => $date,
            'status' => 'belum diproses',

        ];
        $this->pengaduan->save($dataPengaduan);

        foreach ($images as $i => $img) {
            if ($img->isValid() && !$img->hasMoved()) {
                $files[$i] ='bukti'.$i.'-'. user()->id.'.'.$img->guessExtension();
            }
        }
        $pengaduan_id = $this->pengaduan->insertID(); // last insert id
        $img_dua = (array_key_exists(1, $files) ? $files[1] : 'null');
        $img_tiga = (array_key_exists(2, $files) ? $files[2] : 'null');

        $this->bukti->save([
            'pengaduan_id' => $pengaduan_id,
            'img_satu' => $files[0],
            'img_dua' => $img_dua,
            'img_tiga' => $img_tiga,
        ]);

        foreach ($images as $i => $img) {
            if ($img->isValid() && !$img->hasMoved()) {
                $img->move('uploads', $files[$i]);
            }
        }
        session()->setFlashdata('msg', 'Pengaduan berhasil ditambah, silahkan menunggu untuk proses approval.');
        return redirect()->to('user/pengaduan/tambah_pengaduan');
    }

   

    public function detail($id)
    {
        $data=$this->db->table('pengaduan');
        $data->select('*');
        $data->where('id',$id);
        $query=$data->get();
        
        $bukti=$this->db->table('tbl_bukti');
        $bukti->select('*');
        $bukti->where('pengaduan_id',$id);
        $query1=$bukti->get()->getRowArray();
        // dd($query1);
        $ex=[
            'bukti'=> $query1,
            'detail'=>$hasil=$query->getRow(),
            'title'=>'Detail Pengaduan'

        ];
        

        return view('user/pengaduan/detail',$ex);
    }
    public function ubah($id)
    {
        
        $data=$this->db->table('pengaduan');
        $data->select('*');
        $data->where('id',$id);
        $query=$data->get();

        $bukti=$this->db->table('tbl_bukti');
        $bukti->select('*');
        $bukti->where('pengaduan_id',$id);
        $query1=$bukti->get()->getRowArray();
        $data=[
            'bukti'=> $query1,
            'data'=>$hasil=$query->getRowArray(),
            'validation' => $this->validation,
            'title'=>'Ubah Pengaduan'

        ];
       

      

        return view('user/pengaduan/ubah_pengaduan',$data);
    }

    public function ubahPengaduan($id){
        $data['validation'] = \Config\Services::connect();
        $rules = [
            'judul_pengaduan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Perihal pengaduan wajib diisi.'
                ]
            ],
            'isi_pengaduan' => [
                'rules' => 'required|min_length[30]',
                'errors' => [
                    'required' => 'Isi pengaduan wajib diisi.',
                    'min_length' => 'Minimal 30 karakter.'
                ]
            ],
            'images' => [
                'rules' => 'max_size[images,1024]|is_image[images]|mime_in[images,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    // 'uploaded' => 'Satu file wajib ada.',
                    'max_size' => 'Anda mengupload file yang melebihi ukuran maksimal.',
                    'is_image' => 'Anda mengupload file yang bukan gambar.',
                    'mime_in' => 'Anda mengupload file yang bukan gambar.'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            $validation = \Config\Services::validation();
            return redirect()->to('/user/ubah/'.$id)->withInput('validation', $validation);
        }

        $images = $this->request->getFileMultiple('images');
        $jumlahFile = count($images);
        if ($jumlahFile > 3) { // jika jumlah file melebihi aturan (3)
            session()->setFlashdata('err-files', '<span class="text-danger">Jumlah file yang anda upload melebihi aturan.</span>');
            return redirect()->to('/user/ubah'.$id);
        }

        if ($this->request->getPost('nama_pengadu') == 'anonym') {
            $nama_pengadu = $this->request->getPost('nama_pengadu');
        } else {
            $nama_pengadu = $this->request->getPost('pengadu');
        }
        $date = date("Y/m/d h:i:s");
        // $dataPengaduan = [
        //     'id_user' => user()->id,
        //     'perihal' => $this->request->getPost(' '),
        //     'detail' => $this->request->getPost('isi_pengaduan'),
        //     'nama_pengadu' => $nama_pengadu,
        //     'tanggal_pengaduan' => $date,
        //     'status' => 'belum diproses',

        // ];
        $this->pengaduan->update($id,[
            'id_user' => user()->id,
            'perihal' => $this->request->getPost('judul_pengaduan'),
            'detail' => $this->request->getPost('isi_pengaduan'),
            'nama_pengadu' => $nama_pengadu,
            'tanggal_pengaduan' => $date,
            'status' => 'belum diproses',

        ]);
        if ($images[0]->getError() !== 4) {
            foreach ($images as $i => $img) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $files[$i] = 'bukti'.$i.'-'. user()->id.'.'.$img->guessExtension();
                }
            }

            // get data bukti
            $bukti = $this->bukti->getBukti($id);

            // hapus file lama
            unlink('uploads/' . $bukti['img_satu']);
            if ($bukti['img_dua'] != null) {
                unlink('uploads/' . $bukti['img_dua']);
            }
            if ($bukti['img_tiga'] != null) {
                unlink('uploads/' . $bukti['img_tiga']);
            }

            // update tbl_bukti
            $img_dua = (array_key_exists(1, $files) ? $files[1] : 'null');
            $img_tiga = (array_key_exists(2, $files) ? $files[2] : 'null');

            $this->bukti->save([
                'id' => $this->request->getPost('bukti_id'),
                'img_satu' => $files[0],
                'img_dua' => $img_dua,
                'img_tiga' => $img_tiga,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            // move file baru
            foreach ($images as $i => $img) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $img->move('uploads', $files[$i]);
                }
            }
        }

        session()->setFlashdata('msg', 'Pengaduan berhasil diubah.');
        return redirect()->to('user/pengaduan');
    }
}
