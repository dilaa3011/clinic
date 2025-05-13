<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Antrian extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_antrian' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'rm_id' => [
                'type'           => 'INT',                
                'unsigned'       => true,
            ],
            "pasien_id" => [
                'type'           => 'INT',
                'unsigned'       => true,
            ],
            'nomor_antrian' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],            
            'nik' => [
                'type'       => 'VARCHAR',
                'constraint' => '16',
            ],
            'tarif' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'status_pemeriksaan' => [
                'type'       => 'ENUM',
                'constraint' => ['menunggu', 'diperiksa', 'selesai'],
                'default'    => 'menunggu',
            ],
            'status_bayar' => [
                'type'       => 'ENUM',
                'constraint' => ['belum lunas', 'lunas'],
                'default'    => 'belum lunas',
            ],
            'tanggal_periksa' => [
                'type' => 'DATETIME',
                'null' => true,
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
        $this->forge->addPrimaryKey('id_antrian');        
        // $this->forge->addForeignKey('nik', 'pasien', 'nik', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('pasien_id', 'pasien', 'id_pasien', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('rm_id', 'rekam_medis', 'id_rm', 'CASCADE', 'CASCADE');
        $this->forge->createTable('antrian');
    }


    public function down()
    {
        $this->forge->dropTable('antrian');
    }
}
