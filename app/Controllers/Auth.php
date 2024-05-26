<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\AdminsModel;

class Auth extends BaseController
{
  protected $user;
  protected $admin;
  public function __construct()
  {
    $this->user = new UsersModel();
    $this->admin = new AdminsModel();
  }
  public function index(): string
  {
    $data = [
      'title' => 'Halaman Login',
      'validation' => \Config\Services::validation()
    ];
    return view('login', $data);
  }
  public function login()
  {
    $email = $this->request->getVar('user_email');
    $password = $this->request->getVar('password');
    $user = $this->user->where('user_email', $email)->first();
    $admin = $this->admin->where('email', $email)->first();
    // dd($user);
    if (isset($user['user_email'])) {
      $verify = password_verify($password, $user['password']);
      if ($verify) {
        $ses_data = [
          'id'       => $user['id'],
          'nama'     => $user['nama_lengkap'],
          'username'     => $user['username'],
          'email'    => $user['user_email'],
          'logged_in'     => TRUE
        ];
        session()->set($ses_data);
        return redirect()->to('/');
      } else {
        session()->setFlashdata('message', 'Email atau password salah');
        return redirect()->to('/Login');
      }
    } else if (isset($admin['email'])) {
      $verify = password_verify($password, $admin['password']);
      if ($verify) {
        $ses_data = [
          'id'       => $admin['id'],
          'username'     => $admin['username'],
          'email'    => $admin['email'],
          'logged_in'     => TRUE
        ];
        session()->set($ses_data);
        return redirect()->to('/Dashboard');
      } else {
        session()->setFlashdata('message', 'Email atau password salah');
        return redirect()->to('/Login');
      }
    } else {
      session()->setFlashdata('message', 'Email atau password salah');
      return redirect()->to('/Login');
    }
  }
  public function registrasi(): string
  {
    $data = [
      'title' => 'Halaman Registrasi',
      'validation' => \Config\Services::validation()
    ];
    return view('registrasi', $data);
  }
  public function register()
  {
    $rules = [
      'nama_lengkap' => 'required|is_unique[tbl_user.nama_lengkap]|min_length[3]',
      'user_email' => 'required|min_length[6]|valid_email|is_unique[users.user_email]',
      'password' => 'required|min_length[5]',
      'no_telp' => 'required',
      'alamat' => 'required|min_length[5]'
    ];
    if (!$this->validate($rules)) {
      return redirect()->to('/Registrasi')->withInput();
    }
    $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
    $this->user->save([
      'nama_lengkap' => $this->request->getVar('nama_lengkap'),
      'user_email' => $this->request->getVar('user_email'),
      'password' => $password,
      'no_telp' => $this->request->getVar('no_telp'),
      'alamat' => $this->request->getVar('alamat'),
    ]);
    session()->setFlashdata('message', 'Registrasi akun berhasil');
    return redirect()->to('/Login');
  }
  public function logout()
  {
    $session = session();
    $session->destroy();
    return redirect()->to('/Login');
  }
}
