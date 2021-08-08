<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'users';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['email', 'senha'];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = ['hashPassword'];
	protected $afterInsert          = [];
	protected $beforeUpdate         = ['hashPassword'];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];

	public function fields()
	{
		return
		[
			'email' => 
			[
				'type' => 'email',
				'label' => 'eMail'
			],
			'senha' => 
			[
				'type' => 'password',
				'label' => 'Senha'
			]
		];
	}

	// https://www.codeigniter.com/user_guide/models/model.html#defining-callbacks
	protected function hashPassword(array $data)
	{
		if (! isset($data['data']['senha'])) return $data;

		$data['data']['senha'] = password_hash($data['data']['senha'], PASSWORD_DEFAULT);

		return $data;
	}

}