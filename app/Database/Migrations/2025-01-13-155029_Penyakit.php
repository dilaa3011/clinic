<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penyakit extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_penyakit'  => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'kode_penyakit'=> [
                'type' => 'VARCHAR', 
                'constraint' => 10
            ],
            'nama_penyakit'=> [
                'type' => 'VARCHAR', 
                'constraint' => 255
            ],
        ]);
        $this->forge->addPrimaryKey('id_penyakit');
        $this->forge->createTable('penyakit');
    }

    public function down()
    {
        $this->forge->dropTable('penyakit');
    }
}
