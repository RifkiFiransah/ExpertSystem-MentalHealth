<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
  protected $table      = 'tbl_user';
  protected $primaryKey = 'id';
  protected $useSoftDeletes = false;
  protected $allowedFields = ['nama_lengkap', 'username', 'user_email', 'password', 'alamat', 'no_telp', 'created_at', 'updated_at'];
  protected $useTimestamps = true;
}
