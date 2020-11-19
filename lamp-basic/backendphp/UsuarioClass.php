<?php
  define('__ROOT__', dirname(dirname(__FILE__)));
  require_once(__ROOT__."/html/UsuarioDAO.php");

class UsuarioClass
{
  private $name;
  private $email;
  private $senha;

  public function __construct($usuario = null)
  {
    $this->email = $usuario["name"] ?? null;
    $this->email = $usuario["email"] ?? null;
    $this->senha = $usuario["password"] ?? null;
  }

  public function __set($atrib, $value)
  {
    $this->$atrib = $value;
  }

  public function __get($atrib)
  {
    return $this->$atrib;
  }

  public function signInClass($userData)
  {
    $forWhat = 'signin';

    if($this->validarAcessoClass($userData,$forWhat)){
      return (new UsuarioDAO())->getUserDAO($userData);
    } else {
      return array("erro"=>"email ou senha incorretos");
    }
  }

  public function createClass($newUser)
  {
    return (new UsuarioDAO())->createDAO($this->hashPassword($newUser));
  }

  private function hashPassword($newUser){
    $newUser["password"] = password_hash($newUser["password"], PASSWORD_DEFAULT);
    return $newUser;
  }

  public function readClass($id)
  {
    return (new UsuarioDAO())->readDAO($id);
  }

  public function indexClass($post)
  {
    return (new UsuarioDAO())->indexDAO($post["email"]);
  }

  public function updateClass($userInfo)
  {
    $forWhat = 'update';

    if($this->validarAcessoClass($userInfo, $forWhat)){
      $userInfo = $this->hashPassword($userInfo);
      return (new UsuarioDAO())->updateDAO($userInfo);
    } else {
      return array("erro"=>"email ou senha incorretos");
    }
  }

  public function deleteClass($id)
  {
    return (new UsuarioDAO())->deleteDAO($id);
  }

  public function validarAcessoClass($userInfo,$forWhat)
  {
    if ($this->checkCredenciais($userInfo, $forWhat)) {
      return true;
    } else {
      return false;
    }
  }

  private function checkCredenciais($userInfo, $forWhat)
  {
    if($forWhat == 'update'){
      if (json_encode(!is_null($userInfo['email'])) and json_encode(!is_null($userInfo['oldPassword']))) {
        $email = $userInfo["email"];
        $oldPassword = $userInfo["oldPassword"];
  
        if (!is_null($email) and !is_null($oldPassword)) {
          if ($this->validaUsuarioSenha($email, $oldPassword)) {
            return true;
          }
        }
      }
      return false;
    }else if($forWhat == 'signin'){
      if (json_encode(!is_null($userInfo['email'])) and json_encode(!is_null($userInfo['password']))) {
        $email = $userInfo["email"];
        $password = $userInfo["password"];
  
        if (!is_null($email) and !is_null($password)) {
          if ($this->validaUsuarioSenha($email, $password)) {
            return true;
          }
        }
      }
      return false;
    }
  }

  private function validaUsuarioSenha(&$email, &$password)
  {
    $user = (new UsuarioDAO())->validarAcessoDAO($email); // SELECT banco
    if (password_verify($password, $user[0]['password'])) {
      return true;
    } else {
      return false;
    }
  }
}
