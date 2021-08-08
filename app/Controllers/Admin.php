<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Service;

class Admin extends BaseController
{

	public function __construct()
	{
		session_start();
	}

	public function index()
	{

		if ( !isset($_SESSION['user_id']) ) return redirect()->to('/auth/login');

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

		if ( !isset($_SESSION['user_id']) ) return redirect()->to('/auth/login');
		
		$data = $this->getModel($source);

		$data['items'] = $data['model']->findAll();
		
		return view('list', $data);
	}


	public function new( $source )
	{
		if ( !isset($_SESSION['user_id']) ) return redirect()->to('/auth/login');

		$data = $this->getModel($source);
		$data['action'] = "Create";
		$data['crudAction'] = "/admin/$source/new";
		$data['fields'] = $data['model']->fields();

		return view("form", $data);
	}

	public function saveNew( $source )
	{

		if ( !isset($_SESSION['user_id']) ) return redirect()->to('/auth/login');

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

		if ( !isset($_SESSION['user_id']) ) return redirect()->to('/auth/login');

		$data = $this->getModel($source);
		$data['action'] = "Update";
		$data['crudAction'] = "/admin/$source/$id";
		$data['fields'] = $data['model']->fields();
		$data['item'] = $data['model']->find($id);

		return view("form", $data);
	}

	public function save( $source, $id )
	{
		if ( !isset($_SESSION['user_id']) ) return redirect()->to('/auth/login');

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


	public function shouldDelete($source, $id)
	{
		if ( !isset($_SESSION['user_id']) ) return redirect()->to('/auth/login');

		$data = $this->getModel($source);
		$data['id'] = $id;
		$data['item'] = $data['model']->find($id);
		return view('delete', $data);
	}

	public function yesDelete($source, $id)
	{
		if ( !isset($_SESSION['user_id']) ) return redirect()->to('/auth/login');

		
		$data = $this->getModel($source);

		$request = service('request');
		
		$uid = $_SESSION['user_id'];
		$userModel = $this->getModel("users");
		$user = $userModel['model']->find($uid);

		$senha = $request->getPost('delete_confirmation');

		$res = password_verify($senha, $user['senha']);

		if ( $res )
		{
			$data['model']->delete($id);
			return redirect()->to("/admin/$source");
		}

		else
		{
			$data['id'] = $id;
			$data['item'] = $data['model']->find($id);
			$data['error'] = "Sua senha não confere";
			return view('delete', $data);
		}

	}

}
