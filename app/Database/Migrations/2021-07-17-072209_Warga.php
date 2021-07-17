<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Warga extends Migration
{
	public function up()
	{
		// create table warga
		  $this->forge->addField([
            'id_warga'    => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'nik'         => ['type' => 'VARCHAR', 'UNIQUE' => true, 'constraint' => '50'],
            'nama'        => ['type' => 'VARCHAR', 'constraint' => '50'],
            'kelamin' 	  => ['type' => 'enum', 'constraint'  => ['L','P']],
			'alamat'	  => ['type' => 'TEXT', 'null' => true],
			'no_rumah' 	  => ['type' => 'VARCHAR','constraint' => '10'],
			'status' 	  => ['type' => 'TINYINT','constraint' => '1'],
            'created_at'  => ['type' => 'datetime', 'null' => true],
            'updated_at'  => ['type' => 'datetime', 'null' => true],
            'deleted_at'  => ['type' => 'datetime', 'null' => true]
		  ]);

        $this->forge->addPrimaryKey('id_warga');
        $this->forge->createTable('warga', TRUE, ['ENGINE' => 'InnoDB']);
	}

	public function down()
	{
		//
		$this->forge->dropTable('warga');
	}
}
