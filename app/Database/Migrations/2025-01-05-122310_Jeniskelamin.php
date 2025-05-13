<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Jeniskelamin extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jenis_kelamin'  => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nama_jenis_kelamin'=> [
                'type' => 'VARCHAR', 
                'constraint' => 255
            ],
        ]);
        $this->forge->addPrimaryKey('id_jenis_kelamin');
        $this->forge->createTable('jenis_kelamin');
    }

    public function down()
    {
        $this->forge->dropTable('jenis_kelamin');
    }
}
