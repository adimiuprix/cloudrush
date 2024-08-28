<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Bonuses extends Migration
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
            'amount_bonus' => [
                'type'       => 'DECIMAL',
                'constraint' => '20,2',
                'null'  => false
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint'     => ['credited', 'uncredited'],
                'default' => 'credited',
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('bonuses');
    }

    public function down()
    {
        $this->forge->dropTable('bonuses');
    }
}
