<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DiagnosaModel;
use App\Models\RuleModel;
use App\Models\PenyakitModel;
use Config\Services;

use CodeIgniter\HTTP\ResponseInterface;

class Diagnosa extends BaseController
{
    protected $validation;
    protected $diagnosis;
    protected $rules;
    protected $penyakits;
    protected $db;

    public function __construct()
    {
        $this->validation = Services::validation();
        $this->rules = new RuleModel();
        $this->diagnosis = new DiagnosaModel();
        $this->penyakits = new PenyakitModel();
        $this->db = db_connect();
    }

    public function index()
    {
        $diagnosis = $this->diagnosis->select("*")->join("tbl_user", "tbl_user.id = tbl_diagnosa.id_user", "inner")->join("tbl_penyakit", "tbl_penyakit.id = tbl_diagnosa.id_penyakit", "inner")->findAll();
        $data = [
            'title' => 'Data Hasil Diagnosa',
            'diagnosis' => $diagnosis,
            'path' => $this->request->getPath(),
            'validation' => $this->validation
        ];

        return view('diagnosa/index', $data);
    }
    public function store()
    {
        $this->diagnosis->save([
            'id_user' => $this->request->getVar('id_user'),
            'id_penyakit' => $this->request->getVar('id_penyakit'),
            'persentase' => $this->request->getVar('persentase'),
        ]);
        session()->setFlashdata('message', 'Data diagnosa berhasil disimpan');
        return redirect()->to('riwayat-diagnosa');
    }
    public function hasilDiagnosa()
    {
        $data = [
            'title' => 'Halaman Hasil Diagnosa',
            // 'ranking' => $ranking,
            // 'penyakit' => $data_penyakit,
            'path' => $this->request->getPath(),
        ];
        return view('hasil_diagnosa', $data);
    }
    public function checkDiagnosa()
    {
        $columns = $this->db->query('SHOW COLUMNS FROM tbl_rule')->getResultArray();
        // dd($columns);
        // Menghapus field id, created_at, updated_at
        unset($columns[0]);
        unset($columns[1]);
        unset($columns[2]);

        $rules = [];
        // Mengambil semua kode gejala pada field table rule
        foreach ($columns as $column) {
            array_push($rules, $column["Field"]);
        }
        // Mengambil semua data pada table rule
        $data_rules = $this->rules->findAll();
        // dd($rules, $data_rules);
        $gejala_rules = [];
        $i = 0;
        foreach ($data_rules as $dr) {
            unset($dr['id']);
            unset($dr['created_at']);
            unset($dr['updated_at']);
            $j = 0;
            for ($k = 0; $k < sizeof($rules); $k++) {
                if ($dr[$rules[$k]] == 1) {
                    $gejala_rules['penyakit_' . $i][$j] = $rules[$k];
                    $j++;
                }
            }
            $i++;
        }
        $rule_1 = [];
        $rule_2 = [];
        $rule_3 = [];
        $rule_4 = [];
        $rule_5 = [];
        foreach ($_POST as $gejala) {
            if (array_search($gejala, $gejala_rules["penyakit_0"]) > -1) {
                array_push($rule_1, $gejala);
            }
            if (array_search($gejala, $gejala_rules["penyakit_1"]) > -1) {
                array_push($rule_2, $gejala);
            }
            if (array_search($gejala, $gejala_rules["penyakit_2"]) > -1) {
                array_push($rule_3, $gejala);
            }
            if (array_search($gejala, $gejala_rules["penyakit_3"]) > -1) {
                array_push($rule_4, $gejala);
            }
            if (array_search($gejala, $gejala_rules["penyakit_4"]) > -1) {
                array_push($rule_5, $gejala);
            }
            $i++;
        }
        $persen = [
            "penyakit_0" => round((sizeof($rule_1) / sizeof($gejala_rules["penyakit_0"])) * 100),
            "penyakit_1" => round((sizeof($rule_2) / sizeof($gejala_rules["penyakit_1"])) * 100),
            "penyakit_2" => round((sizeof($rule_3) / sizeof($gejala_rules["penyakit_2"])) * 100),
            "penyakit_3" => round((sizeof($rule_4) / sizeof($gejala_rules["penyakit_3"])) * 100),
            "penyakit_4" => round((sizeof($rule_5) / sizeof($gejala_rules["penyakit_4"])) * 100),
        ];
        $rule = [];
        $sql_penyakit = "SELECT * FROM tbl_penyakit WHERE ";
        for ($j = 0; $j < sizeof($persen); $j++) {
            if ($persen["penyakit_" . $j] != 0 && $persen["penyakit_" . $j] >= 45) {
                $rule[$j] = $persen["penyakit_" . $j];
                $sql_penyakit .= " id = " . $j + 1 . " OR";
            }
        }
        if (preg_match("/OR/", $sql_penyakit)) {
            $sql_penyakit .= "DER BY id";
        } else {
            $sql_penyakit .= "0";
        }
        $penyakit = $this->db->query($sql_penyakit)->getResultArray();
        if (count($penyakit) > 0) {
            $ranking = [];
            $a = 0;
            foreach ($penyakit as $sakit) {
                $ranking[$a]['id'] = $sakit['id'];
                $ranking[$a]['nama_penyakit'] = $sakit['nama_penyakit'];
                $ranking[$a]['persen'] = $rule[$sakit['id'] - 1];
                $a++;
            }
            usort($ranking, array($this, 'compare'));

            // $no = 1;
            // foreach ($ranking as $hasil) {
            //   $id = $hasil['id'];
            //   $nama_penyakit = $hasil['nama_penyakit'];
            //   $persen = $hasil['persen'];
            //   $no_rank = $no;

            $id = $ranking[0]['id'];
            $data_penyakit = $this->penyakits->where('id', $id)->first();
            $sess_data = [
                'ranking' => $ranking,
                'penyakit' => $data_penyakit,
            ];
            session()->set($sess_data);
            $data = [
                'title' => 'Halaman Hasil Diagnosa',
                // 'ranking' => $ranking,
                // 'penyakit' => $data_penyakit,
                'path' => $this->request->getPath(),
            ];
            return view('hasil_diagnosa', $data);
        } else {
            return redirect()->to('error-page');
            // echo "Terdapat kesalahan ketika memilih gejala";
        }
    }

    public function compare($a, $b)
    {
        return $b['persen'] - $a['persen'];
    }
}
