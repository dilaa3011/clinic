<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ResumePasien extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_resume' => [
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
            'rm_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true
            ],
            'dokter_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true
            ],
            'nomer_rm' => [
                'type'       => 'VARCHAR',
                'constraint' => 6
            ],
            'nama_lengkap' => [
                'type'       => 'VARCHAR',
                'constraint' => 30
            ],
            'tanggal_lahir' => [
                'type' => 'DATE',
                'null' => true
            ],
            'tanggal_masuk' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'tanggal_keluar' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'nama_dpjp' => [
                'type'       => 'VARCHAR',
                'constraint' => 20
            ],
            'anamnesa' => [
                'type'       => 'VARCHAR',
                'constraint' => 30
            ],
            'diagnosa' => [
                'type'       => 'VARCHAR',
                'constraint' => 30
            ],
            'terapi' => [
                'type'       => 'VARCHAR',
                'constraint' => 30
            ],
            'anjuran' => [
                'type'       => 'VARCHAR',
                'constraint' => 30
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],

        ]);

        $this->forge->addPrimaryKey('id_resume');
        $this->forge->addForeignKey('pasien_id', 'pasien', 'id_pasien', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('rm_id', 'rekam_medis', 'id_rm', 'CASCADE', 'CASCADE');        
        $this->forge->addForeignKey('dokter_id', 'dokter', 'id_dokter', 'CASCADE', 'CASCADE');
        $this->forge->createTable('resumePasien');
    }

    public function down()
    {
        $this->forge->dropTable('resumePasien');
    }
}
