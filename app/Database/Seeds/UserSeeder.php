<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'nama_lengkap' => 'Rifki Firansah',
            'username' => 'rifkifiransah',
            'user_email' => 'rifki@gmail.com',
            'password' => password_hash('rifki123', PASSWORD_DEFAULT),
            'no_telp' => '08123123',
            'alamat' => 'Kabupaten Kuningan',
            'created_at' => Time::now(),
            'updated_at' => Time::now(),
        ];
        $this->db->table('tbl_user')->insert($data);
        $this->call('PenyakitSeeder');
        $this->call('GejalaSeeder');
        $this->call('RuleSeeder');
        $this->call('AdminSeeder');
    }
}
