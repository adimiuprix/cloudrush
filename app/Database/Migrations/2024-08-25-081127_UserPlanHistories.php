<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserPlanHistories extends Migration
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
                'null'  => true
            ],
            'plan_id' => [
                'type'       => 'INT',
                'null' => true,
            ],
            'status' => [
                'type'       => 'ENUM("active", "inactive")',
                'default'        => 'inactive',
            ],
            'last_sum' => [
                'type'       => 'BIGINT',
                'null'  => true
            ],
            'hash_tx' => [
                'type'       => 'VARCHAR',
                'constraint'     => 255,
                'null'  => true
            ],
            'expire_date' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('user_plan_histories');
    }

    public function down()
    {
        $this->forge->dropTable('user_plan_histories');
    }
}
