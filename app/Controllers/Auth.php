<?php

namespace App\Controllers;

use App\Models\User;

class Auth extends BaseController
{
	public function login()
	{
		return view('login');
	}

	public function doLogin()
	{

		$request = service('request');

		$email = $request->getVar("email");
		$senha = $request->getVar('senha');

		$userModel = new User();
		$users = $userModel
			->where('email', $email)
			->findAll();


		if ( sizeof($users) ==0 )
		{
			return view('login', ['error'=>"Usuário não encontrado"]);
		}

		$res = password_verify($senha, $users[0]['senha']);

		if( $res )
		{
			session_start();
			$_SESSION['user_id'] = $users[0]['id'];
			return redirect()->to('/admin');
		}

		else
		{
			return view('login', ['error'=>"Usuário não encontrado"]);
		}


	}

}
