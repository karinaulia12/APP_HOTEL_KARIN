<?php

namespace AuHotelia\Database\Migrations;

use CodeIgniter\Database\Migration;

class Petugas extends Migration
{
    private $table = 'petugas';
    public function up()
    {
        $this->forge->addField([
            'id_petugas' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_petugas' => [
                'type' => 'varchar',
                'constraint' => 200
            ],
            'username' => [
                'type' => 'varchar',
                'constraint' => 200
            ],
            'password' => [
                'type' => 'varchar',
                'constraint' => 200
            ],
            'no_hp' => [
                'type' => 'char',
                'constraint' => 15
            ],
            'alamat' => [
                'type' => 'TEXT',
            ],
            'level' => [
                'type' => 'ENUM',
                'constraint' => ['resepsionis', 'admin']
            ],
        ]);

        $this->forge->addPrimaryKey('id_petugas');
        $this->forge->createTable($this->table);
    }

    public function down()
    {
        $this->forge->dropTable($this->table);
    }
}
