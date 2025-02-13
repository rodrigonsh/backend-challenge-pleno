<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
	public function up()
	{
		$this->forge->addField([

			'id' => 
			[
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			
			'email' => 
			[
				'type'       => 'VARCHAR',
				'constraint' => '100',
				'unique'	 => true,
 			],
			
			'senha' =>
			[
				'type'       => 'VARCHAR',
				'constraint' => '100',
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('users');
	}

	public function down()
	{
		$this->forge->dropTable('users');
	}
}
