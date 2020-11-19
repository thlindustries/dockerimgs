<?php
  define('__ROOT__', dirname(dirname(__FILE__)));
  require_once(__ROOT__."/html/UsuarioClass.php");
  require_once(__ROOT__."/html/Routes.php");

class UsuarioController
{
    private $list;
    private $uri;
    private $method;
    private $params;

    public function __construct()
    {
      if(count( explode('?', $_SERVER['REQUEST_URI']) ) > 1 ){
        $this->uri = explode('?', $_SERVER['REQUEST_URI'])[0];
        $this->params =  explode('?', $_SERVER['REQUEST_URI'])[1];
      }else{

        $this->uri = $_SERVER['REQUEST_URI'];
      }
      $this->method = $_SERVER['REQUEST_METHOD'];
    }

    public function request(){
      $json = array(
        "ué" => "nada..."
      );

      switch ($this->uri) {
        case '/index':
          $this->indexController();
          break;
        case '/signin':
          $this->signInController();
          break;
        case '/user':
          if($this->method == 'POST'){
            $this->createController();
          }else if($this->method == 'GET'){
            $this->readController();
          }else if($this->method == 'DELETE'){
            $this->deleteController();
          }else if($this->method == 'PUT'){
            $this->updateController();
          }
          break;
        default:
          echo $this->uri;
          // echo json_encode($this->method);
          break;
      }
    }

    public function signInController() {
      $entityBody = json_decode(file_get_contents('php://input'),true);
      echo json_encode((new UsuarioClass())->signInClass($entityBody));
    }

    public function createController() {
      $entityBody = json_decode(file_get_contents('php://input'),true);
      (new UsuarioClass())->createClass($entityBody);
    }

    public function readController() {
      $id = explode('=', $this->params);
      $id = $id[1];
      echo json_encode((new UsuarioClass())->readClass($id));
    }

    public function indexController() {
      echo json_encode((new UsuarioClass())->indexClass($_GET));
    }

    public function updateController() {
      $entityBody = json_decode(file_get_contents('php://input'),true);
      
      echo json_encode((new UsuarioClass())->updateClass($entityBody));
    }

    public function deleteController() {
      $id = explode('=', $this->params);
      $id = $id[1];

      echo json_encode((new UsuarioClass())->deleteClass($id));
      // $this->sair();
    }

    private function sessao($usuario)
    {
      if(session_status() == PHP_SESSION_NONE){
        session_start();
      }
      array_push($_SESSION, serialize($usuario));
    }

    private function sair()
    {
      if (session_status() == PHP_SESSION_ACTIVE) {
        session_unset();
        session_destroy();
      }
      $this->request();
    }
}
