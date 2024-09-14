<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CollectHistory extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'constraint' => 100,
            ],
            'date_time'   => [
                'type'           => 'DATE',
                'null'           => true,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('collet_histories');
    }

    public function down()
    {
        $this->forge->dropTable('collet_histories');
    }
}
