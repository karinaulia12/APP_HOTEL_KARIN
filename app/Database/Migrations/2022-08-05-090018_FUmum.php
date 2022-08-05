<?php

namespace AuHotelia\Database\Migrations;

use CodeIgniter\Database\Migration;

class FUmum extends Migration
{
    private $table = 'fasilitas_umum';
    public function up()
    {
        $field = [
            'id_fumum' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_fumum' => [
                'type' => 'VARCHAR',
                'constraint' => 200
            ],
            'foto' => [
                'type' => 'VARCHAR',
                'constraint' => 200
            ],
            'deskripsi' => [
                'type' => 'TEXT',
            ]
        ];

        $this->forge->addField($field)
            ->addPrimaryKey('id_fumum')
            ->createTable($this->table);
    }

    public function down()
    {
        $this->forge->dropTable($this->table);
    }
}
