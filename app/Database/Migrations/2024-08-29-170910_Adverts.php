<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Adverts extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 100,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'constraint' => 100,
            ],
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'  => false
            ],
            'link' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'  => false
            ],

            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('adverts');
    }

    public function down()
    {
        $this->forge->dropTable('adverts');
    }
}
