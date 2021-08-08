<?php

namespace App\Controllers;

use App\Models\User;

class Admin extends BaseController
{
	public function index()
	{

		session_start();
		$id = $_SESSION['user_id'];

		$modelUser = new User();
		$usuario = $modelUser->find($id);	

		return view('admin');
	}

	public function list($source)
	{
		echo $source;
	}

}
