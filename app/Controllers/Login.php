<?php
namespace App\Controllers;

use App\Libraries\Util;

class Login extends \App\Controllers\BaseController
{
    function index()
    {
        return Util::renderView("home", "Home Page");
    }
}

