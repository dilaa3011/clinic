<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Rm extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_rm' => [
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
            'penyakit_id' => [
                'type'           => 'INT',
                'unsigned'       => true,
            ],
            'tindakan_id' => [
                'type'           => 'INT',
                'unsigned'       => true,
            ],
            'no_rm' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'unique'     => true,
            ],
            'riwayat_penyakit' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'riwayat_alergi' => [
                'type' => 'ENUM',
                'constraint' => ['Obat', 'Makanan', 'Udara', 'Hewan'],
                'null' => false,
            ],
            'riwayat_pengobatan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'keluhan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'periksa_bibir_masuk_mulut' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'periksa_gigi_geligi' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'periksa_lidah' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'periksa_langit_langit' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'diagnosa' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            
            'catatan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
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

        $this->forge->addPrimaryKey('id_rm');
        $this->forge->addForeignKey('pasien_id', 'pasien', 'id_pasien', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('dokter_id', 'dokter', 'id_dokter', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('penyakit_id', 'penyakit', 'id_penyakit', 'CASCADE', 'CASCADE');        
        $this->forge->addForeignKey('tindakan_id', 'tindakan', 'id_tindakan', 'CASCADE', 'CASCADE');
        $this->forge->createTable('rekam_medis');
    }

    public function down()
    {
        $this->forge->dropTable('rekam_medis');
    }
}
