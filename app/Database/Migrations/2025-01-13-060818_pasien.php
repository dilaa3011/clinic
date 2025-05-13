<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pasien extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pasien' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'jenis_kelamin_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'agama_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'pendidikan_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'nama_lengkap' => [
                'type' => 'VARCHAR',
                'constraint' => 45,
            ],
            'nomor_rekam_medis' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'unique' => true,
            ],
            'nik' => [
                'type' => 'VARCHAR',
                'constraint' => 16,
                'null' => true,
            ],
            'identitas_lain' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
            ],
            'nama_ibu_kandung' => [
                'type' => 'VARCHAR',
                'constraint' => 45,
            ],
            'tempat_lahir' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
            ],
            'tanggal_lahir' => [
                'type' => 'DATE',
            ],
            'suku' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'bahasa' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'alamat_lengkap' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'alamat_domisili' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'rt' => [
                'type' => 'INT',
                'constraint' => 10,
            ],
            'rw' => [
                'type' => 'INT',
                'constraint' => 10,
            ],
            'kelurahan' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'kecamatan' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'kota' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'kode_pos' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'provinsi' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'negara' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'telepon_rumah' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
            ],
            'telepon_selular' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],            
            'pekerjaan' => [
                'type' => 'VARCHAR',
                'constraint' =>225,
            ],
            'status_pernikahan' => [
                'type' => 'ENUM',
                'constraint' => ['belum menikah', 'menikah', 'cerai hidup', 'cerai mati'],
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

        $this->forge->addKey('id_pasien', true);
        $this->forge->addForeignKey('jenis_kelamin_id', 'jenis_kelamin', 'id_jenis_kelamin', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('agama_id', 'agama', 'id_agama', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('pendidikan_id', 'pendidikan', 'id_pendidikan', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pasien');
    }

    public function down()
    {
        $this->forge->dropTable('pasien');
    }
}
