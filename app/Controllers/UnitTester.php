<?php namespace App\Controllers;

use App\Models\ModelEstrutura;

class UnitTester extends BaseController
{
	public function index()
	{
        $userModel = new ModelEstrutura();
        $userModel->cadastrarEstrutura("123");
	}

	//--------------------------------------------------------------------

}
