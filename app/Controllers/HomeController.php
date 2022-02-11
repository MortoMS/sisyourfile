<?php

namespace App\Controllers;

use App\Libraries\AuthUser;
use App\Controllers\BaseController;

class HomeController extends BaseController
{
    function __construct()
    {
        $this->authUser = new AuthUser; 
    }

    /**
     * @Router('/')
     */
    public function index()
    {
        return view('build/viewVue');
    }
}
