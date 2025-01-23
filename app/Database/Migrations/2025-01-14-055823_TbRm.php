<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbRm extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'pasien_id' => [
                'type'           => 'INT',
                'unsigned'       => true,
            ],
            'dokter_id' => [
                'type'           => 'INT',
                'unsigned'       => true,
            ],
            'nomor_antrian' => [
                'type'           => 'INT',
                'unsigned'       => true,
            ],
            'keluhan' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'diagnosa' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'tindakan' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'resep' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'catatan' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'tanggal_periksa' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        // Primary key
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('pasien_id', 'pasien', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('dokter_id', 'tb_dokter', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('rekam_medis');
    }

    public function down()
    {
        $this->forge->dropTable('rekam_medis');
    }
}
