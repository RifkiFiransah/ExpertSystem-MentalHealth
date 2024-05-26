<?php

namespace App\Controllers;

use App\Models\PenyakitModel;

class Penyakit extends BaseController
{
    protected $penyakits;
    protected $db;
    public function __construct()
    {
        $this->penyakits = new PenyakitModel();
        $this->db = db_connect();
    }
    public function index(): string
    {

        $data = [
            'title' => 'Data Penyakit',
            'penyakits' => $this->penyakits->findAll(),
            'path' => $this->request->getPath(),
            'validation' => \Config\Services::validation()
        ];

        return view('penyakit/index', $data);
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
            return redirect()->to('/Penyakit')->withInput();
        }
        $this->penyakits->save([
            'nama_penyakit' => $this->request->getVar('nama_penyakit'),
            'informasi' => $this->request->getVar('informasi'),
            'solusi' => $this->request->getVar('solusi'),
        ]);
        session()->setFlashData('message', 'Data Berhasil ditambahkan');
        return redirect()->to('/Penyakit');
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
        $penyakit = $this->penyakits->where(['id' => $id])->first();
        $data = [
            'title' => 'Detail Penyakit',
            'penyakit' => $penyakit,
            'path' => $this->request->getPath(),
            'validation' => \Config\Services::validation()
        ];

        return view('Penyakit/edit', $data);
    }
    public function update($id)
    {
        if (!$this->validate([
            'nama_penyakit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{:field} tidak boleh kosong harus diisi'
                ]
            ],
            'informasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{:field} tidak boleh kosong harus diisi'
                ]
            ],
            'solusi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{:field} tidak boleh kosong harus diisi'
                ]
            ],
        ])) {
            return redirect()->to('/Penyakit')->withInput();
        }
        $this->penyakits->save([
            'id' => $id,
            'nama_penyakit' => $this->request->getVar('nama_penyakit'),
            'informasi' => $this->request->getVar('informasi'),
            'solusi' => $this->request->getVar('solusi'),
        ]);
        session()->setFlashdata('message', 'Data berhasil diubah');
        return redirect()->to('/Penyakit');
    }
    public function delete($id)
    {
        if (!$id) {
            return redirect()->to('/Penyakit')->withInput();
        }
        $this->penyakits->delete($id);
        $this->db->query("DELETE FROM tb_rule WHERE id=$id");
        session()->setFlashdata('message', 'Data berhasil dihapus');
        return redirect()->to('/Penyakit');
    }
}
