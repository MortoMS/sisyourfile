<?php
namespace App\Controllers;

use App\Libraries\Util;
use CodeIgniter\Config\Services;

class Login extends \App\Controllers\BaseController
{
    private $session;

    function __construct()
    {
        $this->session = Services::session();
    }

    function index()
    {
        return Util::renderView("home", "Home Page");
    }

    function logout()
    {
        $this->session->destroy();
        
        return redirect()->to('/UserLogin');
    }
}

