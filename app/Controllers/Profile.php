<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use App\Models\AdminsModel;
use CodeIgniter\HTTP\ResponseInterface;

class Profile extends BaseController
{
    protected $admins;
    protected $users;
    protected $db;
    public function __construct()
    {
        $this->admins = new AdminsModel();
        $this->users = new UsersModel();
        $this->db = db_connect();
    }
    public function index($username)
    {
        $admins = $this->admins->where('username', $username)->first();
        $users = $this->users->where('username', $username)->first();
        if ($admins) {
            $data = [
                'title' => 'Profile Admin',
                'admin' => $admins,
                'path' => $this->request->getPath(),
                'validation' => \Config\Services::validation()
            ];

            return view('profile/admin', $data);
        } else {
            $data = [
                'title' => 'Profile User',
                'user' => $users,
                'path' => $this->request->getPath(),
                'validation' => \Config\Services::validation()
            ];

            return view('profile/user', $data);
        }
    }

    public function update_admin($id)
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{:field} tidak boleh kosong harus diisi'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{:field} tidak boleh kosong harus diisi'
                ]
            ],
        ])) {
            return redirect()->to('/User')->withInput();
        }
        $this->admins->save([
            'id' => $id,
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
        ]);
        session()->setFlashdata('message', 'Data berhasil diubah');
        return redirect()->to("/Profile/$id");
    }
    public function update_user($id)
    {
        if (!$this->validate([
            'nama_lengkap' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{:field} tidak boleh kosong harus diisi'
                ]
            ],
            'user_email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{:field} tidak boleh kosong harus diisi'
                ]
            ],
            'no_telp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{:field} tidak boleh kosong harus diisi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{:field} tidak boleh kosong harus diisi'
                ]
            ],
        ])) {
            return redirect()->to('/User')->withInput();
        }
        $this->users->save([
            'id' => $id,
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'user_email' => $this->request->getVar('user_email'),
            'password' => $this->request->getVar('password'),
            'no_telp' => $this->request->getVar('no_telp'),
            'alamat' => $this->request->getVar('alamat'),
        ]);
        session()->setFlashdata('message', 'Data berhasil diubah');
        return redirect()->to("/Profile/$id");
    }
}
