<?php

namespace AuHotelia\Database\Migrations;

use CodeIgniter\Database\Migration;

class FKamar extends Migration
{
    private $table = 'fasilitas_kamar';
    public function up()
    {
        $field = [
            'id_fkamar' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_type_kamar' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'nama_fkamar' => [
                'type' => 'VARCHAR',
                'constraint' => 200
            ],
            'deskripsi' => [
                'type' => 'TEXT',
            ]
        ];

        $this->forge->addField($field)
            ->addPrimaryKey('id_fkamar')
            ->addForeignKey('id_type_kamar', 'type_kamar', 'id_type_kamar')
            ->createTable($this->table);
    }

    public function down()
    {
        $this->forge->dropTable($this->table);
    }
}
