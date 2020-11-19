<?php

  define('__ROOT__', dirname(dirname(__FILE__)));
  require_once(__ROOT__."/html/Conexao.php");
  require_once(__ROOT__."/html/Sql.php");
  require_once(__ROOT__."/html/UsuarioClass.php");

class UsuarioDAO {
  private $sql;

  public function __construct()
  {
    $this->sql = new Sql();
  }
  
  public function createDAO($newUser) {
    try {
      $query = "INSERT INTO `users` (`name`,`email`,`password`) VALUES (?,?,?)";
      $params = array(
        $newUser['name'],
        $newUser['email'],
        $newUser['password'],
      );
      return $this->sql->insert($query,$params);
    } catch (Exception $e) {
      echo $e;
    }
  }

  public function readDAO($id) {
    try{
      $query = "SELECT * FROM users WHERE id='$id'";

      return $this->sql->select($query);

    } catch (Exception $e) {
      echo $e;
    }
  }

  public function getUserDAO($userData) {
    $email = $userData['email'];
    try{
      $query = "SELECT * FROM users WHERE email='$email'";

      return $this->sql->select($query);

    } catch (Exception $e) {
      echo $e;
    }
  }

  /** Retornar a lista de usuarios inteira */
  public function indexDAO() {
    try{
      $query = "SELECT * FROM users";
      return $this->sql->select($query);
    } catch (Exception $e) {
      echo json_encode($e);
    }
  }

  public function updateDAO($usuario) {
    $name = $usuario["name"];
    $email = $usuario["email"];
    $password = $usuario["password"];
    try {
      $sql = "UPDATE `users` SET `name` = '$name', `password` = '$password' WHERE `email` = '$email'";
      $this->sql->query($sql,$params);
      return "done";
    } catch (Exception $e) {
      echo $e;
    }
  }

  public function deleteDAO($id) {
    try{
      $query = "DELETE FROM `users` WHERE `id` = '$id'";
      $this->sql->query($query,$params);
      return "done";
    } catch (Exception $e) {
      echo $e;
    }
  }


  public function validarAcessoDAO($email) {
    try {
      $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
      // while ($v_ret = $p_sql->fetchObject()) {
        //   $usuario = new UsuarioClass((array) $v_ret);
        // }
        //UsuarioController::debugMe($usuario);
      return $this->sql->select($sql);
      // return $usuario ?? null;
    } catch (Exception $e) {
      echo $e;
    }
  }
}
