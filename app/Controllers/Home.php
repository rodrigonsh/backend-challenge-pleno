<?php

namespace App\Controllers;

use App\Models\User;

class Home extends BaseController
{
	public function index()
	{

		$userModel = new User();
		$user = $userModel->find(2);

		return view('home',[ 'user'=>$user ]);
	}
}
