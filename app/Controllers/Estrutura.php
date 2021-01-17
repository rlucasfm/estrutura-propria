<?php namespace App\Controllers;

class Estrutura extends BaseController
{
	public function index()
	{
        return redirect()->to('/');
    }
    
    public function criar()
    {
        $data = [
			"title" => "Estrutura Própria - Criar estrutura",
			"name" => session()->get('name')
		];

		echo view('templates/header', $data);
		echo('Criar estruturas');
		echo view('templates/footer', $data);
    }

    public function listar()
    {
        $data = [
			"title" => "Estrutura Própria - Criar estrutura",
			"name" => session()->get('name')
		];

		echo view('templates/header', $data);
		echo('Listar estruturas');
		echo view('templates/footer', $data);
    }
	//--------------------------------------------------------------------

}
