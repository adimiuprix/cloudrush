<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admins extends Migration
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
                'null'  => false
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint'     => 255,
                'null'  => false
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('admins');
        $init_data = [
            [
                'username'      => 'admin',
                'password'      => password_hash('admin', PASSWORD_BCRYPT),
            ],
        ];
        $this->db->table('admins')->insertBatch($init_data);
    }

    public function down()
    {
        $this->forge->dropTable('admins');
    }
}
