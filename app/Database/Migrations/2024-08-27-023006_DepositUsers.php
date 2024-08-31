<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DepositUsers extends Migration
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
                'constraint'     => 100,
                'null'  => false
            ],
            'plan_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'constraint'     => 100,
                'null'  => false
            ],
            'sum_deposit' => [
                'type'       => 'INT',
                'default' => '0',
                'null'  => false
            ],
            'hash_tx' => [
                'type'       => 'VARCHAR',
                'constraint'     => 255,
                'null'  => true
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint'     => ['fail', 'pending', 'paid'],
                'default' => 'pending',
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('deposit_histories');
    }

    public function down()
    {
        $this->forge->dropTable('deposit_histories');
    }
}
