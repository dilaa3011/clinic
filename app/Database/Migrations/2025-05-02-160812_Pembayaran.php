<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pembayaran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_bayar' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'pasien_id' => [
                'type'           => 'INT',
                'unsigned'       => true,
            ],
            'tindakan_id' => [
                'type'           => 'INT',
                'unsigned'       => true,
            ],
            'obat_id' => [
                'type'           => 'INT',
                'unsigned'       => true,
            ],
            'resep_id' => [
                'type'           => 'INT',
                'unsigned'       => true,
            ],
            'no_bayar' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'unique' => true,
            ],
            'nama_petugas' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'cara_pembayaran' => [
                'type' => 'ENUM',
                'constraint' => ["JKN", "Mandiri", "Asuransi Lainnya"],
            ],
            'total_bayar' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2'
            ],
            'tanggal_bayar' => [
                'type' => 'DATETIME',
            ],
        ]);
        $this->forge->addPrimaryKey('id_bayar');
        $this->forge->addForeignKey('pasien_id', 'pasien', 'id_pasien', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('tindakan_id', 'tindakan', 'id_tindakan', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('obat_id', 'obat', 'id_obat', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('resep_id', 'resep', 'id_resep', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pembayaran');
    }

    public function down()
    {
        $this->forge->dropTable('pembayaran');
    }
}
