<?php

namespace App\Models;

use CodeIgniter\Model;

class PenyakitModel extends Model
{
  protected $table      = 'tbl_penyakit';
  protected $primaryKey = 'id';
  protected $useSoftDeletes = false;
  protected $allowedFields = ['nama_penyakit', 'informasi', 'solusi', 'created_at', 'updated_at'];
  protected $useTimestamps = true;
}
