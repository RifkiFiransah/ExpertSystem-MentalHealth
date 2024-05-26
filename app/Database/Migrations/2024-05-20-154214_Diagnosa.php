<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Diagnosa extends Migration
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
            'id_user' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'id_penyakit' => [
                'unsigned'       => true,
                'type'           => 'INT',
                'constraint'     => 5,
                'null'           => true,
            ],
            'persentase' => [
                'type'           => 'VARCHAR',
                'constraint'     => 50,
                'null'           => true,
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
        $this->forge->addForeignKey('id_user', 'tbl_user', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_penyakit', 'tbl_penyakit', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tbl_diagnosa');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_diagnosa');
    }
}
