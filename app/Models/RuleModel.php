<?php

namespace App\Models;

use CodeIgniter\Model;

class RuleModel extends Model
{
  protected $table      = 'tbl_rule';
  protected $primaryKey = 'id';
  protected $useSoftDeletes = false;
  protected $allowedFields = ['G001', 'G002', 'G003', 'G004', 'G005', 'G006', 'G007', 'G008', 'G009', 'G010', 'G011', 'G012', 'G013', 'G014', 'G015', 'G016', 'G017', 'G018', 'G019', 'G020', 'G021', 'G022', 'G023', 'G024'];
  protected $useTimestamps = true;
}
