<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Contacts extends Migration
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
            'sosmed' => [
                'type'       => 'VARCHAR',
                'constraint'     => 255,
                'null'  => true
            ],
            'link' => [
                'type'       => 'VARCHAR',
                'constraint'     => 255,
                'null'  => true
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('contacts');
        $init_data = [
            [
                'sosmed'      => 'email',
                'link'      => 'admin@cloudrush.com',
            ],
            [
                'sosmed'      => 'telegram',
                'link'      => '@cloudrush_official',
            ],
        ];
        $this->db->table('contacts')->insertBatch($init_data);

    }

    public function down()
    {
        $this->forge->dropTable('contacts');
    }
}
