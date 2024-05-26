<?php

namespace App\Controllers;

use App\Models\PenyakitModel;
use App\Models\UsersModel;

class User extends BaseController
{
  protected $penyakits;
  protected $users;
  protected $db;
  public function __construct()
  {
    $this->penyakits = new PenyakitModel();
    $this->users = new UsersModel();
    $this->db = db_connect();
  }
  public function index(): string
  {
    $data = [
      'title' => 'Data User',
      'users' => $this->users->findAll(),
      'path' => $this->request->getPath(),
      'validation' => \Config\Services::validation()
    ];

    return view('user/index', $data);
  }
  public function store()
  {
    if (!$this->validate([
      'nama_penyakit' => [
        'rules' => 'required|is_unique[tbl_penyakit.nama_penyakit]',
        'errors' => [
          'required' => '{field} tidak boleh kosong harus diisi'
        ]
      ],
      'informasi' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} tidak boleh kosong harus diisi'
        ]
      ],
      'solusi' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} tidak boleh kosong harus diisi'
        ]
      ],
    ])) {
      return redirect()->to('/User')->withInput();
    }
    $this->penyakits->save([
      'nama_penyakit' => $this->request->getVar('nama_penyakit'),
      'informasi' => $this->request->getVar('informasi'),
      'solusi' => $this->request->getVar('solusi'),
    ]);
    session()->setFlashData('message', 'Data Berhasil ditambahkan');
    return redirect()->to('/User');
  }
  public function show($id)
  {
    $data = [
      'title' => 'Detail Penyakit',
      'penyakits' => $this->penyakits->where(['id' => $id]),
      'path' => $this->request->getPath(),
    ];
    return view('penyakit/show', $data);
  }
  public function edit($id)
  {
    $user = $this->users->where(['id' => $id])->first();
    $data = [
      'title' => 'Detail User',
      'user' => $user,
      'path' => $this->request->getPath(),
      'validation' => \Config\Services::validation()
    ];

    return view('User/edit', $data);
  }
  public function update($id)
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
    return redirect()->to('/User');
  }
  public function delete($id)
  {
    if (!$id) {
      return redirect()->to('/User')->withInput();
    }
    $this->users->delete($id);
    session()->setFlashdata('message', 'Data berhasil dihapus');
    return redirect()->to('/User');
  }
}
