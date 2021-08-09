<?php

namespace App\Models;

use CodeIgniter\Model;

class Depoimento extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'depoimentos';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['username', 'depoimento', 'link', 'user_id', 'service_id'];

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
	protected $beforeInsert         = [];
	protected $afterInsert          = ['setOwner', 'setParent'];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];

	public function fields()
	{
		return
		[
			'username' => 
			[
				'type' => 'text',
				'label' => 'Nome/Username'
			],
			'depoimento' => 
			[
				'type' => 'text',
				'label' => 'Depoimento'
			],
			'link' => 
			[
				'type' => 'text',
				'label' => 'Link'
			],
		];
	}

	protected function setOwner(array $data)
	{

		$data['data']['user_id'] = $_SESSION['user_id'];

		return $data;
	}

	protected function setParent(array $data)
	{

		$data['data'][$_SESSION['fk_parent']] = $_SESSION['fk_parent_id'];

		return $data;
	}


}
