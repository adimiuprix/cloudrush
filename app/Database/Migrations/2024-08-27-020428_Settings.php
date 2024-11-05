<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Settings extends Migration
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
            'site_name' => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,
                'null'              => false
            ],
            'keywords' => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,
                'null'              => false
            ],
            'description' => [
                'type'              => 'TEXT',
                'null'              => false
            ],
            'start_from' => [
                'type'              => 'DATE',
                'null'              => false
            ],
            'curr_name'     => [
                'type'              => 'VARCHAR',
                'constraint'        => 50,
                'null'              => false
            ],
            'curr_code'     => [
                'type'              => 'VARCHAR',
                'constraint'        => 50,
                'null'              => false
            ],
            'deposit_method' => [
                'type'              => 'ENUM',
                'constraint'        => ['manual', 'ccpayments', 'faucetpay'],
                'default'           => 'manual',
            ],
            'withdraw_method' => [
                'type'              => 'ENUM',
                'constraint'        => ['manual', 'ccpayments', 'faucetpay'],
                'default'           => 'manual',
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('settings');
        $init_data = [
            [
                'site_name'             => 'Ferontron',
                'keywords'              => 'mining trx, mining, app, web mining, crypto earning',
                'description'           => 'Crypto mining that can give you earning',
                'start_from'            => date('Y-m-d H:i:s'),
                'curr_name'             => 'Troncoin',
                'curr_code'             => 'TRX',
                'deposit_method'        => 'manual',
                'withdraw_method'       => 'manual',
            ],
        ];
        $this->db->table('settings')->insertBatch($init_data);
    }

    public function down()
    {
        $this->forge->dropTable('settings');
    }
}
