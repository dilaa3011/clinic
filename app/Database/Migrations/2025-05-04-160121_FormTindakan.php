<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FormTindakan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_formulir' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'pasien_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true
            ],
            'tindakan_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true
            ],
            'petugas_pelaksana' => [
                'type'       => 'VARCHAR',
                'constraint' => 20
            ],
            'tanggal_pelaksanaan' => [
                'type' => 'DATE',
                'null' => true
            ],
            'waktu_mulai' => [
                'type' => 'TIME',
                'null' => true
            ],
            'waktu_selesai' => [
                'type' => 'TIME',
                'null' => true
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
        ]);

        $this->forge->addPrimaryKey('id_formulir');
        $this->forge->addForeignKey('pasien_id', 'pasien', 'id_pasien', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('tindakan_id', 'tindakan', 'id_tindakan', 'CASCADE', 'CASCADE');
        $this->forge->createTable('formulir_tindakan');
    }

    public function down()
    {
        $this->forge->dropTable('formulir_tindakan');
    }
}
