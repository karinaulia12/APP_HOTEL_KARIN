<?php

namespace AuHotelia\Database\Migrations;

use CodeIgniter\Database\Migration;

class Reservasi extends Migration
{
    public function up()
    {
        $field = [
            'id_reservasi' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_type_kamar' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'nik' => [
                'type' => 'VARCHAR',
                'constraint' => 30
            ],
            'nama_pemesan' => [
                'type' => 'VARCHAR',
                'constraint' => 200
            ],
            'no_telp' => [
                'type' => 'CHAR',
                'constraint' => 15
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 200
            ],
            'nama_tamu' => [
                'type' => 'VARCHAR',
                'constraint' => 200
            ],
            'checkin' => [
                'type' => 'DATE',
            ],
            'checkout' => [
                'type' => 'VARCHAR',
            ],
            'jml_kamar' => [
                'type' => 'INT',
                'constraint' => 5
            ],
            'harga' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'total' => [
                'type' => 'BIGINT',
                'constraint' => 20
            ],
            'nama_pemesan' => [
                'type' => 'TINYINT',
                'constraint' => 4
            ],
        ];

        $this->forge->addField($field)
            ->addPrimaryKey('id_reservasi')
            ->addForeignKey('id_type_kamar', 'type_kamar', 'id_type_kamar')
            ->createTable($this->table);
    }

    public function down()
    {
        $this->forge->dropTable($this->table);
    }
}
