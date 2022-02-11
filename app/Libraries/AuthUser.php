<?php

namespace App\Libraries;

use Exception;
use CodeIgniter\Config\Services;
use App\Models\UserModel;

class AuthUser
{
    private static $instance;
    private static $indexSession = "user";

    private $userAuth;
    private $userModel;
    private $userStatus;

    function __construct()
    {
        $this->session   = Services::session();
        $this->userModel = new UserModel; 
        $this->validateUserSession();
    }

    /**
     * Retorna a instancia do AuthUser
     * 
     * @return AuthUser
     */
    public static function getInstance(): AuthUser
    {
        if (!self::$instance)
        {
            self::$instance = new static;
        }

        return self::$instance;
    }

    /**
     * Verifica os dados de login do usuário e registrar uma session para o mesmo
     * 
     * @param string $email E-mail refereten ao usuário$indexSession
     * @param string $password Senha referente ao email do usuário
     * 
     * @throws Exception Falha na tentativa de criar a session
     * 
     * @return bool
     */
    public function loginUser($email, $password): bool
    {
        $user = $this->userModel->validationLoginUser($email, $password);
        
        if ($user)
        {
            $this->createSession($user);

            return true;
        }

        return false;
    }

    /**
     * Remove a session do usuário
     * 
     * @return void
     */
    public function logoutUser()
    {
        if ($this->session->has(self::$indexSession))
        {
            $this->session->remove(self::$indexSession);
        }
    }

    /**
     * Cria uma session para o usuário 
     * 
     * @param Array $user Dados do usuário
     * 
     * @throws Exception Falha na tentativa de criar a session
     * 
     * @return void
     */
    private function createSession(Array $user)
    {
        if (
            $user and
            !empty($user['id']) and
            !empty($user['email']) 
        )
        {
            if (!$this->session->has(self::$indexSession))
            {
                $this->session->set(self::$indexSession, [
                    "id"    => $user['id'],
                    "email" => $user['email']
                ]);
            }
            
            return;
        }

        throw new Exception('Não foi possivel registrar uma session para esse usuário');
    }

    public function checkUser(): bool
    {
        if (is_null($this->userStatus) or !is_bool($this->userStatus))
        {
            $this->validateUserSession();
        }

        return $this->userStatus;
    }

    /**
     * Valida a session do usuário e recupera os dados do mesmo
     * 
     * @return bool
     */
    private function validateUserSession(): bool
    {
        if ($this->session->has(self::$indexSession) and empty($this->userAuth))
        {   
            $user = $this->session->get(self::$indexSession);

            if (
                is_array($user) and
                !empty($user['email']) and
                !empty($user['id']) and
                is_numeric($user['id']) and
                filter_var($user['email'], FILTER_VALIDATE_EMAIL)
            )
            {
                $this->userAuth = $this->userModel->where([
                    'id' => $user['id'],
                    'email' => $user['email']
                ]);

                if (!empty($this->userAuth))
                {
                    $this->userStatus = true;
                    return true;
                }

                $this->logoutUser();
            }
        }

        $this->userStatus = false;
        return false;
    }
}
