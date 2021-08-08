<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDepoimentosTable extends Migration
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

			'service_id' => 
			[
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
			],

			'username' =>
			[
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],

			'depoimento' =>
			[
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			
			'link' =>
			[
				'type'       => 'VARCHAR',
				'constraint' => '100',
			]


		]);

		$this->forge->addKey('id', true);

		$this->forge->addForeignKey('user_id','users','id');
		$this->forge->addForeignKey('service_id','services','id');

		$this->forge->createTable('depoimentos');
	}

	public function down()
	{
		$this->forge->dropTable('depoimentos');
	}
}
