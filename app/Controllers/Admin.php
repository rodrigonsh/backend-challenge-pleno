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
		$data['crudAction'] = "/admin/$source/new";
		$data['fields'] = $data['model']->fields();

		return view("form", $data);
	}

	public function saveNew( $source )
	{
		$data = $this->getModel($source);
		$fields = $data['model']->fields();
		
		$request = service('request');
		
		$new = [];
		foreach( $fields as $k=>$f )
		{
			$new[$k] = $request->getPost($k);
		}

		
		$data['model']->insert($new);

		return redirect()->to("/admin/$source");
	}

	public function edit( $source, $id )
	{
		$data = $this->getModel($source);
		$data['action'] = "Update";
		$data['crudAction'] = "/admin/$source/$id";
		$data['fields'] = $data['model']->fields();
		$data['item'] = $data['model']->find($id);

		return view("form", $data);
	}

	public function save( $source, $id )
	{
		$data = $this->getModel($source);
		$fields = $data['model']->fields();
		
		$request = service('request');
		
		$edit = [];
		foreach( $fields as $k=>$f )
		{
			$edit[$k] = $request->getPost($k);
		}

		
		$data['model']->update($id, $edit);

		return redirect()->to("/admin/$source");
	}


}
