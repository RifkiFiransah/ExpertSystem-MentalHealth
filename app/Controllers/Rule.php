<?php

namespace App\Controllers;

use App\Models\RuleModel;
use App\Models\PenyakitModel;
use App\Models\GejalaModel;

class Rule extends BaseController
{
  protected $rules;
  protected $penyakit;
  protected $gejala;
  protected $db;
  public function __construct()
  {
    $this->rules = new RuleModel();
    $this->penyakit = new PenyakitModel();
    $this->gejala = new GejalaModel();
    $this->db = db_connect();
  }

  public function index()
  {
    $columns = $this->db->query('SHOW COLUMNS FROM tbl_rule')->getResultArray();
    unset($columns[0]);
    unset($columns[1]);
    unset($columns[2]);

    $kode_rules = $this->rules->orderBy('id', 'asc')->findAll();
    $rules = [];
    foreach ($kode_rules as $rule) {
      array_push($rules, $rule);
    }

    $data = [
      'title' => "Data Rule",
      'columns' => array_values($columns),
      'rules' => $rules,
      'gejalas' => $this->gejala->orderBy('kode_gejala', 'asc')->findAll(),
      'path' => $this->request->getPath()
    ];

    return view('rule/index', $data);
  }

  public function store()
  {
    $columns = $this->db->query('SHOW COLUMNS FROM tbl_rule')->getResultArray();
    unset($columns[0]);
    unset($columns[1]);
    unset($columns[2]);
    // dd(count($columns));
    $field = [];
    $j = 1;
    for ($i = 3; $i <= count($columns) + 2; $i++) {
      if ($j < 10) {
        $field[$columns[$i]['Field']] = $this->request->getVar("G00$j");
      } else {
        $field[$columns[$i]['Field']] = $this->request->getVar("G0$j");
      }
      $j++;
    }
    $this->rules->insert($field);

    session()->setFlashdata('message', 'Data aturan berhasil disimpan');
    return redirect()->to('/Rule');
  }

  public function update()
  {
    $kode_gejala = $this->request->getVar('kode_gejala');
    $jml_penyakit = $this->request->getVar('jml_penyakit');
    for ($i = 1; $i <= $jml_penyakit; $i++) {
      // $this->rules->set($kode_gejala, $this->request->getVar("$i"))->where('id', $i)->update();
      $this->db->query("UPDATE tbl_rule SET $kode_gejala=" . $this->request->getVar("$i") . " WHERE id = $i");
      // $this->rules->update($i, ["$kode_gejala" => $this->request->getVar("$i")]);
    }
    session()->setFlashdata('message', "Gejala dan Rule berhasil ditambahkan");
    return redirect()->to('/Gejala');
  }
}
