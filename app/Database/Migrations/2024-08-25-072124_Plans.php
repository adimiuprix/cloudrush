<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Plans extends Migration
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
            'plan_name' => [
                'type'       => 'VARCHAR',
                'constraint'     => 255,
                'null'  => false
            ],
            'is_free' => [
                'type'       => 'BOOLEAN',
                'default'   => false,
                'null' => false,
            ],
            'earning_per_day' => [
                'type'       => 'DECIMAL',
                'constraint'     => '20,8',
                'default' => '0.00000000',
            ],
            'earning_rate' => [
                'type'       => 'DECIMAL',
                'constraint'     => '20,8',
                'default' => '0.00000000',
            ],
            'price' => [
                'type'       => 'DECIMAL',
                'constraint'     => '20,8',
                'default' => '0.00000000',
            ],
            'profit' => [
                'type'       => 'INT',
                'constraint'     => '50',
                'default' => '0',
            ],
            'create_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('plans');
        $init_data = [
            [
                'plan_name'     => 'FREE',
                'is_free'      => '1',
                'earning_per_day'     => '0.00000000',
                'earning_rate'     => '0.00000000',
                'price'     => '0.00000000',
                'profit'     => '100',
            ],
        ];
        $this->db->table('plans')->insertBatch($init_data);
    }

    public function down()
    {
        $this->forge->dropTable('plans');
    }
}
