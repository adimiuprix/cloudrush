<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PtcAds extends Migration
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
            'timer' => [
                'type'       => 'INT',
                'null'  => false
            ],
            'is_vip' => [
                'type'       => 'ENUM',
                'constraint' => ['0', '1'],
                'default' => '0',
            ],
            'period' => [
                'type'       => 'ENUM',
                'constraint' => ['0', '1'],
                'default' => '0',
            ],
            'reward' => [
                'type'       => 'DECIMAL',
                'constraint' => '20,8',
                'null'  => false
            ],
            'total_view' => [
                'type'       => 'INT',
                'null'  => false
            ],
            'views' => [
                'type'       => 'INT',
                'null'  => false
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['active', 'inactive', 'completed'],
                'default' => 'active',
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('ptc_ads');
    }

    public function down()
    {
        $this->forge->dropTable('ptc_ads');
    }
}
