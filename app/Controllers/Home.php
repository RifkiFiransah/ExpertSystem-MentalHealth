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
        $penyakits = [];
        $penyakitError = false;

        try {
            $penyakits = $this->penyakits->orderBy('nama_penyakit')->findAll();
        } catch (\Throwable $exception) {
            $penyakitError = true;
            log_message('error', 'Gagal memuat daftar kondisi untuk beranda: ' . $exception->getMessage());
        }

        $names = [];
        $ringkasan = [];

        foreach ($penyakits as $penyakit) {
            $nama = trim((string) $penyakit['nama_penyakit']);

            if (mb_strlen($nama) < 3 || isset($names[$nama])) {
                continue;
            }

            $names[$nama] = true;
            $ringkasan[] = ['nama_penyakit' => $nama];
        }

        return view('beranda', [
            'title' => 'Beranda | MentalCare',
            'pageHeading' => 'Skrining kemungkinan gangguan kesehatan mental',
            'path' => $this->request->getPath(),
            'penyakitError' => $penyakitError,
            'penyakits' => $ringkasan,
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
        $penyakits = [];
        $penyakitError = false;

        try {
            $penyakits = $this->penyakits->orderBy('nama_penyakit')->findAll();
        } catch (\Throwable $exception) {
            $penyakitError = true;
            log_message('error', 'Gagal memuat daftar kondisi: ' . $exception->getMessage());
        }

        $names = [];
        $ringkasan = [];

        foreach ($penyakits as $penyakit) {
            $nama = trim((string) $penyakit['nama_penyakit']);

            if (mb_strlen($nama) < 3 || isset($names[$nama])) {
                continue;
            }

            $names[$nama] = true;
            $ringkasan[] = $penyakit;
        }

        return view('penyakit', [
            'title' => 'Data kondisi | MentalCare',
            'pageHeading' => 'Daftar kondisi kesehatan mental',
            'path' => $this->request->getPath(),
            'penyakitError' => $penyakitError,
            'penyakits' => $ringkasan
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
        $penyakits = $this->penyakits->findAll();
        $users = $this->users->findAll();
        $diagnosis = $this->diagnosis->findAll();
        $gejalas = $this->gejalas->findAll();

        $chartError = false;
        $diagnosaPenyakit = [];
        $cakupanGejala = ['dipakai' => 0, 'total' => 0, 'jumlah_aturan' => 0, 'teratas' => []];

        try {
            $db = db_connect();
            $diagnosaPenyakit = $db->query(
                'SELECT COALESCE(p.nama_penyakit, ?) AS nama, COUNT(*) AS jumlah
                 FROM tbl_diagnosa d
                 LEFT JOIN tbl_penyakit p ON p.id = d.id_penyakit
                 GROUP BY d.id_penyakit, p.nama_penyakit
                 ORDER BY jumlah DESC',
                ['Penyakit tidak diketahui']
            )->getResultArray();

            $namaGejala = [];
            foreach ($gejalas as $gejala) {
                $namaGejala[$gejala['kode_gejala']] = $gejala['nama_gejala'];
            }

            $kolom = $db->query('SHOW COLUMNS FROM tbl_rule')->getResultArray();
            $fieldGejala = [];
            foreach ($kolom as $kolomRule) {
                if (preg_match('/^G\d{3}$/', $kolomRule['Field'])) {
                    $fieldGejala[] = $kolomRule['Field'];
                }
            }

            $aturan = $db->table('tbl_rule')->get()->getResultArray();
            $teratas = [];
            $dipakai = 0;
            foreach ($fieldGejala as $field) {
                $hitung = 0;
                foreach ($aturan as $baris) {
                    if ((int) ($baris[$field] ?? 0) === 1) {
                        $hitung++;
                    }
                }
                if ($hitung > 0) {
                    $dipakai++;
                }
                $teratas[] = [
                    'kode' => $field,
                    'nama' => $namaGejala[$field] ?? $field,
                    'jumlah' => $hitung,
                ];
            }
            usort($teratas, static fn ($a, $b) => ($b['jumlah'] <=> $a['jumlah']) ?: strcmp($a['kode'], $b['kode']));

            $cakupanGejala = [
                'dipakai' => $dipakai,
                'total' => count($fieldGejala),
                'jumlah_aturan' => count($aturan),
                'teratas' => array_slice($teratas, 0, 5),
            ];
        } catch (\Throwable $exception) {
            $chartError = true;
            log_message('error', 'Gagal memuat ringkasan grafik dashboard: ' . $exception->getMessage());
        }

        return view('dashboard', [
            'title' => 'Halaman Dashboard',
            'path' => $this->request->getPath(),
            'penyakits' => $penyakits,
            'users' => $users,
            'diagnosis' => $diagnosis,
            'gejalas' => $gejalas,
            'chartError' => $chartError,
            'diagnosaPenyakit' => $diagnosaPenyakit,
            'cakupanGejala' => $cakupanGejala,
        ]);
    }
}
