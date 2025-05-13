<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InformedConsent extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_consent' => [
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
            'pasien_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'tindakan_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'tanggal' => [
                'type' => 'DATE',
                'null' => true
            ],
            'jam' => [
                'type' => 'TIME',
                'null' => true
            ],
            'nama_lengkap' => [
                'type' => 'VARCHAR',
                'constraint' => 30
            ],
            'no_rm' => [
                'type' => 'VARCHAR',
                'constraint' => 6
            ],
            'tanggal_lahir' => [
                'type' => 'DATE',
                'null' => true
            ],
            'jenis_kelamin' => [
                'type' => 'ENUM',
                'constraint' => ['L', 'P'],
            ],
            'persetujuan_pasien' => [
                'type' => 'ENUM',
                'constraint' => ['ya', 'tidak'],
                'default' => 'ya',
            ],
            'ketentuan_pembayaran' => [
                'type' => 'ENUM',
                'constraint' => ['setuju', 'tidak_setuju'],
                'default' => 'setuju',
            ],
            'hak_kewajiban' => [
                'type' => 'ENUM',
                'constraint' => ['setuju', 'tidak_setuju'],
                'default' => 'setuju',
            ],
            'tata_tertib' => [
                'type' => 'ENUM',
                'constraint' => ['setuju', 'tidak_setuju'],
                'default' => 'setuju',
            ],
            'butuh_penterjemah' => [
                'type' => 'ENUM',
                'constraint' => ['ya', 'tidak'],
                'default' => 'tidak',
            ],
            'butuh_rohaniawan' => [
                'type' => 'ENUM',
                'constraint' => ['ya', 'tidak'],

            ],
            'info_kerahasiaan' => [
                'type' => 'ENUM',
                'constraint' => ['setuju', 'tidak_setuju'],
                'default' => 'setuju',
            ],
            'info_pihak_penjamin' => [
                'type' => 'ENUM',
                'constraint' => ['setuju', 'tidak_setuju'],
                'default' => 'setuju',
            ],
            'info_hasil_pemeriksaan' => [
                'type' => 'ENUM',
                'constraint' => ['setuju', 'tidak_setuju'],
                'default' => 'setuju',
            ],
            'info_rujukan_fasyankes' => [
                'type' => 'ENUM',
                'constraint' => ['setuju', 'tidak_setuju'],
            ],
            'penanggung_jawab' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'nama_petugas' => [
                'type' => 'VARCHAR',
                'constraint' => 100
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
        
        $this->forge->addPrimaryKey('id_consent');
        $this->forge->addForeignKey('pasien_id', 'pasien', 'id_pasien', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('tindakan_id', 'tindakan', 'id_tindakan', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('dokter_id', 'dokter', 'id_dokter', 'CASCADE', 'CASCADE');
        $this->forge->createTable('informed_consent');
        
    }

    public function down()
    {
        $this->forge->dropTable('informed_consent');        
    }
}
