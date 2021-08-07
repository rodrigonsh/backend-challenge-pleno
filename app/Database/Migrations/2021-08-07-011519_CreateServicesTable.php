<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateServicesTable extends Migration
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
			
			'user_id' => 
			[
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
			],

			'title' =>
			[
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],

			'image' =>
			[
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			
			'description' =>
			[
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],

			'exibir' =>
			[
				'type'       => 'INT',
				'constraint' => '1',
			],


		]);

		$this->forge->addKey('id', true);

		$this->forge->addForeignKey('user_id','users','id');

		$this->forge->createTable('services');

	}

	public function down()
	{
		$this->forge->dropTable('services');
	}
}
