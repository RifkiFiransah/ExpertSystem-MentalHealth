<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Gejala extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode_gejala' => [
                'type'       => 'VARCHAR',
                'constraint' => '5',
            ],
            'nama_gejala' => [
                'type' => 'varchar',
                'constraint' => '100',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tbl_gejala');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_gejala');
    }
}
