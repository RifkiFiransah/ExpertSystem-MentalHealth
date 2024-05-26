<?php

namespace App\Controllers;

use App\Models\PenyakitModel;
use App\Models\GejalaModel;
use App\Models\DiagnosaModel;
use App\Models\UsersModel;
use Config\Services;

class Home extends BaseController
{
    protected $penyakits;
    protected $diagnosis;
    protected $gejalas;
    protected $users;
    protected $validation;

    public function __construct()
    {
        $this->penyakits = new PenyakitModel();
        $this->gejalas = new GejalaModel();
        $this->diagnosis = new DiagnosaModel();
        $this->users = new UsersModel();
        $this->validation = Services::validation();
    }
    public function index(): string
    {
        return view('beranda', [
            'title' => 'Halaman Beranda',
            'path' => $this->request->getPath(),
        ]);
    }
    public function profile()
    {
        $users = $this->users->where('username', session()->get('username'))->first();
        return view('profile', [
            'title' => 'Halaman Profile',
            'path' => $this->request->getPath(),
            'user' => $users,
            'validation' => $this->validation
        ]);
    }
    public function updateProfile()
    {
        $password = '';
        // dd($this->request->getVar('id'));
        if ($this->request->getVar('password') == null) {
            $password = $this->request->getVar('old_password');
        } else {
            $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        }
        $this->users->save([
            'id' => $this->request->getVar('id'),
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'user_email' => $this->request->getVar('user_email'),
            'password' => $password,
            'no_telp' => $this->request->getVar('no_telp'),
            'alamat' => $this->request->getVar('alamat'),
        ]);
        session()->setFlashdata('message', 'Data berhasil diubah');
        return redirect()->to("/info-profile");
    }
    public function penyakit(): string
    {
        return view('penyakit', [
            'title' => 'Halaman Data Penyakit',
            'path' => $this->request->getPath(),
            'penyakits' => $this->penyakits->orderBy('nama_penyakit')->findAll()
        ]);
    }
    public function diagnosa(): string
    {
        return view('diagnosa', [
            'title' => 'Halaman Diagnosa',
            'path' => $this->request->getPath(),
            'gejalas' => $this->gejalas->findAll()
        ]);
    }
    public function errorPage()
    {
        return view('errors/html/error_404', [
            'title' => 'Halaman Error',
            'path' => $this->request->getPath(),
            'message' => 'Gejala yang dipilih tidak sesuai, silahkan ulangi pilih gejala dengan benar'
        ]);
    }
    public function riwayatDiagnosa()
    {
        $diagnosis = $this->diagnosis->select("*")->join("tbl_user", "tbl_user.id = tbl_diagnosa.id_user", "inner")->join("tbl_penyakit", "tbl_penyakit.id = tbl_diagnosa.id_penyakit", "inner")->findAll();
        $data = [
            'title' => 'Data Hasil Diagnosa',
            'diagnosis' => $diagnosis,
            'path' => $this->request->getPath(),
        ];

        return view('riwayat', $data);
    }
    public function dashboard(): string
    {
        // echo view('layouts/header');
        // echo view('layouts/sidebar');
        // echo view('layouts/main');
        // echo view('layouts/footer');
        $penyakits = $this->penyakits->findAll();
        $users = $this->users->findAll();
        $diagnosis = $this->diagnosis->findAll();
        $gejalas = $this->gejalas->findAll();

        return view('dashboard', [
            'title' => 'Halaman Dashboard',
            'path' => $this->request->getPath(),
            'penyakits' => $penyakits,
            'users' => $users,
            'diagnosis' => $diagnosis,
            'gejalas' => $gejalas,
        ]);
    }
}
