<?php

namespace App\Controllers;

use App\Models\User;

class Admin extends BaseController
{
	public function index()
	{

		session_start();
		$id = $_SESSION['user_id'];

		return $id;

		return view('admin');
	}

	

}
