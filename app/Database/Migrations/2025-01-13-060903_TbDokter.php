<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbDokter extends Migration
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
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'spesialis' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
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

        $this->forge->addPrimaryKey('id'); // Primary key
        $this->forge->createTable('tb_dokter'); // Buat tabel
    }

    public function down()
    {
        $this->forge->dropTable('tb_dokter'); // Hapus tabel jika rollback
    }
}
