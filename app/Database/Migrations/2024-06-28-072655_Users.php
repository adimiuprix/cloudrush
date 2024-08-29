<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
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
            'username' => [
                'type'       => 'VARCHAR',
                'constraint'     => 255,
                'null'  => true
            ],
            'user_wallet' => [
                'type'       => 'VARCHAR',
                'constraint'     => 255,
            ],
            'balance' => [
                'type'       => 'DECIMAL',
                'constraint'     => '20,8',
                'default' => '0.00000000',
            ],
            'total_earn' => [
                'type'       => 'DECIMAL',
                'constraint'     => '20,8',
                'default' => '0.00000000',
            ],
            'reff_code' => [
                'type'       => 'VARCHAR',
                'constraint'     => 50,
                'null'  => true
            ],
            'upline_reward' => [
                'type'       => 'DECIMAL',
                'constraint'     => '20,8',
                'default' => '0.00000000',
                'null'  => true
            ],
            'reff_by' => [
                'type'       => 'INT',
                'constraint'     => 100,
                'null'  => true
            ],
            'last_claim' => [
                'type'       => 'BIGINT',
                'null'  => true,
                'default'    => null,
            ],
            'ip_address' => [
                'type'       => 'VARCHAR',
                'constraint'     => 100,
                'null'  => true
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
