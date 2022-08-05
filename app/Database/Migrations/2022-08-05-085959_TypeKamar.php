<?php

namespace AuHotelia\Database\Migrations;

use CodeIgniter\Database\Migration;

class TypeKamar extends Migration
{
    private $table = 'type_kamar';
    public function up()
    {
        $field = [
            'id_type_kamar' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
                'unsigned' => true,
            ],
            'type_kamar' => [
                'type' => 'varchar',
                'constraint' => 200,
            ],
            'harga' => [
                'type' => 'BIGINT',
            ],
            'foto' => [
                'type' => 'varchar',
                'constraint' => 250,
            ],
        ];

        $this->forge->addField($field)
            ->addPrimaryKey('id_type_kamar')
            ->createTable($this->table);
    }

    public function down()
    {
        $this->forge->dropTable($this->table);
    }
}
