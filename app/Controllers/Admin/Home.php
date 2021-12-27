<?php namespace App\Controllers\Admin;

use App\Libraries\Util;

class Home extends \App\Controllers\BaseController
{
    public function index()
	{
		return Util::renderView(
			"user-dashboard/home", 
			"Dashboard do Usuário"
		);
	}
}
