<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'role' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => FALSE,
                'default' => 0
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 240,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 240
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 240,
                'unique'         => true,
            ],

            'status' => [
                'type' => 'ENUM',
                'constraint' => ['active', 'inactive'],
                'default' => 'active',
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],

        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('user');

    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
