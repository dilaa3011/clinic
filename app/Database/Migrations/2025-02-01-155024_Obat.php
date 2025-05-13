<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Obat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_obat'    => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'kode_obat'  => [
                'type' => 'VARCHAR', 
                'constraint' => 10
            ],
            'nama_obat'  => [
                'type' => 'VARCHAR', 
                'constraint' => 100
            ],
            'satuan'     => [
                'type' => 'VARCHAR', 
                'constraint' => 20
            ],
            'stok'       => [
                'type' => 'INT', 
                'default' => 0
            ],
            'harga'      => [
                'type' => 'decimal',
                'constraint' => '10,2'
            ],
        ]);
        $this->forge->addPrimaryKey('id_obat');
        $this->forge->createTable('obat');
    }

    public function down()
    {
        $this->forge->dropTable('obat');
    }
}
