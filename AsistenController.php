<?php

namespace App\Controllers;

use \App\Models\AsistenModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class AsistenController extends BaseController
{
    public function index()
    {
        $model = model(AsistenModel::class);
        $data = [
            'list' => $model->getAsisten(),
            'title' => 'Daftar Asisten'
        ];

        $session = session();

        // Mengecek apakah sesi pengguna ada
        if (!$session->has('pengguna')) {
            return view('asisten/loginform');
        }
        return view('asisten/AsistenView', $data);
    }

    public function simpan()
    {

        $session = session();

        // Mengecek apakah sesi pengguna ada
        if (!$session->has('pengguna')) {
            // Menyimpan URL saat ini dalam sesi untuk diarahkan setelah login
            $session->set('url', 'asisten/simpan'); //menyimpna asisten/asisten ke variabel url
            return view('asisten/loginform');
        }

        helper('form');

        if (!$this->request->is('post')) {
            return view('/asisten/simpan');
        }

        $post = $this->request->getPost(['nim', 'nama', 'praktikum', 'ipk']);
        $model = model(AsistenModel::class);
        $model->simpan($post);
        return view('/asisten/success');
    }

    public function update()
    {
        $session = session();

        // Mengecek apakah sesi pengguna ada
        if (!$session->has('pengguna')) {
            // Menyimpan URL saat ini dalam sesi untuk diarahkan setelah login
            $session->set('url', 'asisten/update');
            return view('asisten/loginform');
        }

        $db = \config\Database::connect();
        $Builder = $db->table('asisten');

        helper('form');
        if (!$this->request->is('post')) {
            return view('/asisten/update');
        }
        $data = [
            'nama' => [$this->request->getPost('nama')],
            'praktikum' => [$this->request->getPost('praktikum')],
            'ipk' => [$this->request->getPost('ipk')]
        ];
        $Builder->where('nim', $this->request->getPost('nim'));
        $Builder->update($data);
        return view('/asisten/success');
    }

    public function delete()
    {
        $session = session();

        // Mengecek apakah sesi pengguna ada
        if (!$session->has('pengguna')) {
            // Menyimpan URL saat ini dalam sesi untuk diarahkan setelah login
            $session->set('url', 'asisten/delete');
            return view('asisten/loginform');
        }

        $db = \config\Database::connect();
        $Builder = $db->table('asisten');

        helper('form');
        if (!$this->request->is('post')) {
            return view('/asisten/delete');
        }

        $nim = $this->request->getPost('nim');

        // Memeriksa apakah nim tersedia dalam database
        $result = $Builder->getWhere(['nim' => $nim])->getResult();
        if (count($result) == 0) {
            return "NIM tidak ditemukan.";
        }

        $Builder->where('nim', $nim);
        $Builder->delete();
        return view('/asisten/hapus');
    }

    public function search()
    {
        if (!$this->request->is('post')) {
            return view('/asisten/search');
        }

        $nim = $this->request->getPost(['key']); //mengambil attribut yang diambil dari form

        $model = model(AsistenModel::class);
        $asisten = $model->ambil($nim['key']);

        $data = ['hasil' => $asisten];
        return view('asisten/search', $data);
    }

    public function check()
    {
        $model1 = model(AsistenModel::class);
        $data = [
            'list' => $model1->getAsisten(),
            'title' => 'Daftar Asisten'
        ];
        $model = model(LoginModel::class);
        $post = $this->request->getPost(['usr', 'pwd']);
        $user = $model->where('username', $post['usr'])->first();
        $pass = $model->where('password', $post['pwd'])->first();
        if ($user && $pass) {
            $session = session();
            $session->set('pengguna', $post['usr']);
            $redirectURL = $session->get('url');
            if ($redirectURL) {
                $session->remove('url'); // Menghapus URL redirect setelah digunakan
                return redirect()->to($redirectURL);
            } else {
                return view('asisten/AsistenView', $data);
            }
        } else {
            echo '<h1 style="text-align:center; color:red";>';
            echo "! USERNAME atau PASSWORD ANDA SALAH !";
            echo '</h1>';
            echo '<h3 style="text-align:center;">';
            echo "Silahkan Masukan Kembali !";
            echo '</h3>';
            return view('asisten/loginform');
        }
    }

    public function logout() //remove attribut session pengguna
    {
        $session = session();
        // $session->destroy(); //destroy akan menghancurakn semua session
        $session->remove('pengguna'); //bisa menggunakan destroy. 
        return view('asisten/loginform');
    }
}
