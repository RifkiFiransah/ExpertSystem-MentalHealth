<?php

namespace App\Controllers;

use App\Models\GejalaModel;
use Config\Services;
// use Config\Validation;

class Gejala extends BaseController
{
    protected $gejalas;
    protected $pager;
    protected $db;
    public function __construct()
    {
        $this->gejalas = new GejalaModel();
        $this->pager = Services::pager();
        $this->db = db_connect();
    }
    public function index(): string
    {
        $penyakit = $this->db->query('SELECT * FROM tbl_penyakit')->getResultObject();
        foreach ($penyakit as $p) {
            echo "<br>";
        }
        $data = [
            'title' => 'Data Gejala',
            'gejalas' => $this->gejalas->paginate(5, 'gejala'),
            'path' => $this->request->getPath(),
            'id' => $this->gejalas->findAll(),
            'validation' => \Config\Services::validation(),
            'pager' => $this->gejalas->pager
        ];

        return view('gejala/index', $data);
    }
    public function store()
    {
        if (!$this->validate([
            'kode_gejala' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{:field} data tidak boleh kosong harus diisi'
                ]
            ],
            'nama_gejala' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{:field} data tidak boleh kosong harus diisi'
                ]
            ],
        ])) {
            return redirect()->to('/Gejala')->withInput();
        }
        $this->gejalas->save([
            'kode_gejala' => $this->request->getVar('kode_gejala'),
            'nama_gejala' => $this->request->getVar('nama_gejala'),
        ]);
        // membuat field baru di table rule
        $this->db->query("ALTER TABLE tbl_rule ADD " . $this->request->getVar('kode_gejala') . " INT NULL");
        // session()->setFlashdata('message', 'Data Gejala berhasil di tambahkan');
        // return redirect()->to('/Gejala');
        $data = [
            'title' => 'Tambah Rule Penyakit',
            'kode_gejala' => $this->request->getVar('kode_gejala'),
            'penyakits' => $this->db->query('SELECT * FROM tbl_penyakit')->getResultObject(),
            'validation' => \Config\Services::validation(),
            'path' => $this->request->getPath(),
        ];
        return view('rule/create', $data);
    }
    public function edit($id): string
    {

        $data = [
            'title' => 'Edit Data Gejala',
            'gejala' => $this->gejalas->find($id),
            'path' => $this->request->getPath(),
            'validation' => \Config\Services::validation(),
            'pager' => $this->gejalas->pager
        ];

        return view('gejala/edit', $data);
    }
    public function update($id)
    {
        if (!$this->validate([
            'kode_gejala' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{:field} data tidak boleh kosong harus diisi'
                ]
            ],
            'nama_gejala' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{:field} data tidak boleh kosong harus diisi'
                ]
            ],
        ])) {
            return redirect()->to('/Gejala')->withInput();
        }
        $this->gejalas->save([
            'id' => $id,
            'kode_gejala' => $this->request->getVar('kode_gejala'),
            'nama_gejala' => $this->request->getVar('nama_gejala'),
        ]);
        session()->setFlashdata('message', 'Data Gejala berhasil di ubah');
        return redirect()->to('/Gejala');
    }
    public function delete($id)
    {
        if ($id) {
            $this->gejalas->delete($id);
            session()->setFlashdata('message', 'Data Gejala berhasil di hapus');
            return redirect()->to('/Gejala');
        } else {
            echo "<script>alert('Id tidak boleh kosong')</script>";
        }
    }
}
