<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminsModel extends Model
{
  protected $table      = 'tbl_admin';
  protected $primaryKey = 'id';
  protected $useSoftDeletes = false;
  protected $allowedFields = ['username', 'email', 'password', 'created_at', 'updated_at'];
  protected $useTimestamps = true;
}
