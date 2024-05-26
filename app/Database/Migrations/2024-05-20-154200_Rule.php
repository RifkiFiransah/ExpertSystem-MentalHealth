<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Rule extends Migration
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
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'G001' => [
                'type'       => 'int',
                'constraint' => '2',
                'null' => true,
            ],
            'G002' => [
                'type'       => 'int',
                'constraint' => '2',
                'null' => true,
            ],
            'G003' => [
                'type'       => 'int',
                'constraint' => '2',
                'null' => true,
            ],
            'G004' => [
                'type'       => 'int',
                'constraint' => '2',
                'null' => true,
            ],
            'G005' => [
                'type'       => 'int',
                'constraint' => '2',
                'null' => true,
            ],
            'G006' => [
                'type'       => 'int',
                'constraint' => '2',
                'null' => true,
            ],
            'G007' => [
                'type'       => 'int',
                'constraint' => '2',
                'null' => true,
            ],
            'G008' => [
                'type'       => 'int',
                'constraint' => '2',
                'null' => true,
            ],
            'G009' => [
                'type'       => 'int',
                'constraint' => '2',
                'null' => true,
            ],
            'G010' => [
                'type'       => 'int',
                'constraint' => '2',
                'null' => true,
            ],
            'G011' => [
                'type'       => 'int',
                'constraint' => '2',
                'null' => true,
            ],
            'G012' => [
                'type'       => 'int',
                'constraint' => '2',
                'null' => true,
            ],
            'G013' => [
                'type'       => 'int',
                'constraint' => '2',
                'null' => true,
            ],
            'G014' => [
                'type'       => 'int',
                'constraint' => '2',
                'null' => true,
            ],
            'G015' => [
                'type'       => 'int',
                'constraint' => '2',
                'null' => true,
            ],
            'G016' => [
                'type'       => 'int',
                'constraint' => '2',
                'null' => true,
            ],
            'G017' => [
                'type'       => 'int',
                'constraint' => '2',
                'null' => true,
            ],
            'G018' => [
                'type'       => 'int',
                'constraint' => '2',
                'null' => true,
            ],
            'G019' => [
                'type'       => 'int',
                'constraint' => '2',
                'null' => true,
            ],
            'G020' => [
                'type'       => 'int',
                'constraint' => '2',
                'null' => true,
            ],
            'G021' => [
                'type'       => 'int',
                'constraint' => '2',
                'null' => true,
            ],
            'G022' => [
                'type'       => 'int',
                'constraint' => '2',
                'null' => true,
            ],
            'G023' => [
                'type'       => 'int',
                'constraint' => '2',
                'null' => true,
            ],
            'G024' => [
                'type'       => 'int',
                'constraint' => '2',
                'null' => true,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tbl_rule');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_rule');
    }
}
