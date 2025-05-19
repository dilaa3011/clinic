<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Resep extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_resep' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'dokter_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true, 
            ],
            'rm_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true, 
            ],
            'pasien_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true, 
            ],
            'obat_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true, 
            ],
            'jumlah_obat' => [
                'type' => 'INT'
            ],
            'dosis' => [
                'type' => 'VARCHAR', 
                'constraint' => 20
            ],
            'unit' => [
                'type' => 'VARCHAR', 
                'constraint' => 20
            ],
            'aturan_pakai' => [
                'type' => 'VARCHAR', 
                'constraint' => 100
            ],
            'keterangan' => [
                'type' => 'VARCHAR', 
                'constraint' => 255,
                'null' => true
            ],
            'status_resep' => [
                'type' => 'ENUM',
                'constraint' => ['belum_diberikan', 'sudah_diberikan'],
                'default' => 'belum_diberikan'
            ],
            'tanggal_resep' => [
                'type' => 'DATETIME',
            ],
        ]);
        $this->forge->addPrimaryKey('id_resep');
        $this->forge->addForeignKey('pasien_id', 'pasien', 'id_pasien', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('dokter_id', 'dokter', 'id_dokter', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('obat_id', 'obat', 'id_obat', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('rm_id', 'rekam_medis', 'id_rm', 'CASCADE', 'CASCADE');
        $this->forge->createTable('resep');
    }

    public function down()
    {
        $this->forge->dropTable('resep');
    }
}
