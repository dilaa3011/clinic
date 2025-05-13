<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Agama extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_agama'  => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'kode_agama'=> [
                'type' => 'VARCHAR', 
                'constraint' => 10
            ],
        ]);
        $this->forge->addPrimaryKey('id_agama');
        $this->forge->createTable('agama');
    }

    public function down()
    {
        $this->forge->dropTable('agama');
    }
}
