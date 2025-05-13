<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tindakan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_tindakan'  => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'kode_tindakan' => [
                'type' => 'VARCHAR',
                'constraint' => 10
            ],
            'nama_tindakan' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'harga'        => [
                'type' => 'decimal',
                'constraint' => '10,2'
            ],
        ]);
        $this->forge->addPrimaryKey('id_tindakan');
        $this->forge->createTable('tindakan');
    }

    public function down()
    {
        $this->forge->dropTable('tindakan');
    }
}
