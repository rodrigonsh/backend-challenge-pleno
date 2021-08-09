<?php

namespace App\Models;

use CodeIgniter\Model;

class Client extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'clients';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['title', 'image', 'link'];

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
	protected $beforeInsert         = ['setOwner'];
	protected $afterInsert          = [];
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
			'title' => 
			[
				'type' => 'text',
				'label' => 'Título'
			],
			'image' => 
			[
				'type' => 'text',
				'label' => 'Ícone'
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


}
