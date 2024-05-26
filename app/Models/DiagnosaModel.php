<?php

namespace App\Models;

use CodeIgniter\Model;

class DiagnosaModel extends Model
{
  protected $table      = 'tbl_diagnosa';
  protected $primaryKey = 'id';
  protected $useSoftDeletes = false;
  protected $allowedFields = ['id_user', 'id_penyakit', 'persentase', 'created_at', 'updated_at'];
  protected $useTimestamps = true;
}
