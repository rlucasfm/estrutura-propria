<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			"title" => "Estrutura Própria - Gerencia",
			"name" => session()->get('name')
		];

		echo view('templates/header', $data);
		echo view('dashboard', $data);
		echo view('templates/footer', $data);
	}

	//--------------------------------------------------------------------

}
