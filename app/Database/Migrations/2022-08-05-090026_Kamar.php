<?php

namespace AuHotelia\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kamar extends Migration
{
    public function up()
    {
        $field = [
            'id_kamar' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_type_kamar' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'no_kamar' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'status_kmr' => [
                'type' => 'ENUM',
                'constraint' => ['tersedia', 'dipesan', 'ditempati']
            ]
        ];

        $this->forge->addField($field)
            ->addPrimaryKey('id_kamar')
            ->addForeignKey('id_type_kamar', 'type_kamar', 'id_type_kamar')
            ->createTable($this->table);
    }

    public function down()
    {
        $this->forge->dropTable($this->table);
    }
}
