<?php namespace App\Controllers;

use App\Models\ModelEstrutura;

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
		echo view('estrutura/criar', $data);
		echo view('templates/footer', $data);
    }

    public function listar()
    {
		$estrutura = new ModelEstrutura();
		$result = $estrutura->info_estrutura(session()->get('id_user'));
		$link_checkout = $result[0];
		$link_estrutura = $result[1];

        $data = [
			"title" => "Estrutura Própria - Criar estrutura",
			"name" => session()->get('name'),
			'link_checkout' => $link_checkout,
			'link_estrutura' => $link_estrutura			
		];

		echo view('templates/header', $data);
		echo view('estrutura/listar', $data);
		echo view('templates/footer', $data);
	}
	
	public function gerarEstrutura()
	{
		$estrutura = new ModelEstrutura();

		$link_checkout = $this->request->getPost('checkout');
		echo $estrutura->cadastrarEstrutura($link_checkout);
	}

	public function ver($id_estrutura)
	{
		$estrutura = new ModelEstrutura();

		$link_checkout = $estrutura->info_estrutura($id_estrutura)[0];

		$data = [
			'checkout_link' => $link_checkout
		];

		echo view('/estrutura/base', $data);
	}
	//--------------------------------------------------------------------

}
