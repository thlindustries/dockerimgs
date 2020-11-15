<?php
    require_once "UsuarioClass.php";

class UsuarioController
{
    public function request(){
        $action = $_POST["action"] ?? null;
        switch ($action) {
            case 'create':
                $this->createController();
                break;
            case 'read':
                $this->readController();
                break;
            case 'update':
                $this->updateController();
                break;
            case 'delete':
                $this->deleteController();
                break;
            case 'delete':
                $this->sair();
                break;
            default:
                require_once "View.php";
        }
        require_once "View.php";
    }

    // test only
    public static function debugMe($variavel) {
        echo "<pre>";
        print_r($variavel);
        echo "</pre>";
        exit(1);
    }

    public function createController() {
        //$this->debugMe($_POST);
        $this->sessao((new UsuarioClass())->createClass($_POST));
    }

    public function readController() {
        $this->sessao((new UsuarioClass())->readClass($_POST));
    }

    public function updateController() {
        $this->sessao((new UsuarioClass())->updateClass($_POST));
    }

    public function deleteController() {
       (new UsuarioClass())->deleteClass($_POST);
       $this->sair();
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
