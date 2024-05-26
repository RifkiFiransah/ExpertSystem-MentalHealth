<?php

namespace App\Models;

use CodeIgniter\Model;

class GejalaModel extends Model
{
  protected $table      = 'tbl_gejala';
  protected $primaryKey = 'id';
  protected $useSoftDeletes = false;
  protected $allowedFields = ['kode_gejala', 'nama_gejala', 'created_at', 'updated_at'];
  protected $useTimestamps = true;
}
