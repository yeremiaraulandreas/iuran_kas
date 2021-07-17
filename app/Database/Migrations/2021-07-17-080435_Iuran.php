<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Iuran extends Migration
{
	public function up()
	{
		//
		 $this->forge->addField([
            'id'          => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'warga_id'    => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'null' => true],
            'tanggal'     => ['type' => 'DATE'],
            'bulan'       => ['type' => 'INT', 'constraint' => 2],
            'tahun'		  => ['type' => 'YEAR'],
			'jumlah'      => ['type' => 'DECIMAL'],
            'created_at'  => ['type' => 'datetime', 'null' => true],
            'updated_at'  => ['type' => 'datetime', 'null' => true],
            'deleted_at'  => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('warga_id');
        $this->forge->addForeignKey('warga_id', 'warga', 'id_warga', false, 'CASCADE');
        $this->forge->createTable('iuran', false, ['ENGINE' => 'InnoDB']);
	}

	public function down()
	{
		//
		$this->forge->dropTable('iuran');
	}
}
