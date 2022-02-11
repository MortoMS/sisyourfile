<?php
namespace App\Controllers;

use Exception;
use App\Libraries\AuthUser;

class LoginControlller extends BaseController
{
    private $authUser;

    function __construct()
    {
        $this->authUser = AuthUser::getInstance();
    }

    public function csrf()
    {
        return $this->response->setJSON([
            'status' => 'Success',
            'data'   => [
                'name'  => csrf_token(),
                'value' => csrf_hash()
            ]
        ]);
    }

    /**
     * @Router('/login')
     */
    public function login()
    {
        try 
        {
            $email    = $this->request->getVar('email');
            $password = $this->request->getVar('password');
          
            if ($this->authUser->loginUser($email, $password))
            {
                return $this->response->setJSON([
                    'status'  => 'Success',
                    'message' => 'Login..'
                ]);
            }

            throw new Exception(lang('Login.messageUserNotFound'), 401);
        }
        catch (Exception $e)
        {
            $statusCode = 500;

            if ($e->getCode() !== 0 and $e->getCode() < 599 and $e->getCode() > 0)
            {
                $statusCode = $e->getCode();
            }

            return $this->response->setJSON([
                'status'  => 'Error',
                'message' => $e->getMessage()
            ])->setStatusCode($statusCode);
        }
    }

    /**
     * @Router('/logout')
     */
    public function logout()
    {
        $this->authUser->logoutUser();
        
        return $this->response->setJSON([
            'status'   => 'Success',
            'messsage' => 'Logout...'
        ]);       
    }
}

