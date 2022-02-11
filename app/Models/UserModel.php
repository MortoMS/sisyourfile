<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
   protected $table         = 'user';
   protected $primaryKey    = 'id';
   protected $allowedFields = [
      'name', 
      'email',
      'password',
      'forgot_password'
   ];

   protected $useTimestamps = true;
   protected $createdField  = 'created_at';
   protected $updatedField  = 'updated_at';

   /**
    * Valida o email e a senha do usuário
    *
    * @param string $email Email referente ao usuario
    * @param string $password Senha referente ao email do usuário
    *
    * @return false|UserModel
    */
   public function validationLoginUser($email, $password)
   {
      $user = $this->where([
         "email" => $email
      ])->first();

      if ($user and password_verify($password, $user['password']))
      {
         return $user;  
      }

      return false;
   }
}
