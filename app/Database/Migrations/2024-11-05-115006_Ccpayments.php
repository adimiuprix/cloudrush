<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ccpayments extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'              => 'INT',
                'constraint'        => 100,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'coin_id' => [
                'type'              => 'INT',
                'null'              => true
            ],
            'chain' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
                'null'              => true,
            ],
            'app_id' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
                'null'              => true
            ],
            'app_secret' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
                'null'              => true
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('ccpayments');
        $init_data = [
            [
                'coin_id'       => '1482',
                'chain'         => 'TRX',
                'app_id'        => 'OjuEsrv33924OwLH',
                'app_secret'    => '9e1e0fa9388253bd77f23a86c472645d',
            ],
        ];
        $this->db->table('ccpayments')->insertBatch($init_data);
    }

    public function down()
    {
        $this->forge->dropTable('ccpayments');
    }
}
