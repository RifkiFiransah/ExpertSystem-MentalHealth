<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penyakit extends Migration
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
            'nama_penyakit' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'informasi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'solusi' => [
                'type' => 'TEXT',
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
        $this->forge->createTable('tbl_penyakit');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_penyakit');
    }
}
