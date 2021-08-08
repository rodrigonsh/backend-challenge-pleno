<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Service;

class Admin extends BaseController
{
	public function index()
	{

		session_start();
		$id = $_SESSION['user_id'];

		$modelUser = new User();
		$usuario = $modelUser->find($id);	

		$data = 
		[
			'user'=>$usuario,
			'contentClass'=>'admin'
		];

		return view('admin', $data);
	}

	private function getModel($source)
	{
		switch($source)
		{
			case 'users':
				$model = new User();
				$itemName = "email";
				break;

			case 'clients':
				$model = new Client();
				$itemName = "title";
				break;

			case 'services':
				$model = new Service();
				$itemName = "title";
				break;

		}

		return
		[
			'contentClass' => 'crud',
			'source' => $source,
			'model' => $model,
			'itemName' => $itemName
		];

	}

	public function list($source)
	{
		
		$data = $this->getModel($source);

		$data['items'] = $data['model']->findAll();
		
		return view('list', $data);
	}


	public function new( $source )
	{
		$data = $this->getModel($source);
		$data['action'] = "Create";
		$data['fields'] = $data['model']->fields();

		return view("form", $data);
	}

}
