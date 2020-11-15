<?php
    require_once "UsuarioDAO.php";

class UsuarioClass
{
    private $email;
    private $senha;

    public function __construct($usuario = null)
    {
        $this->email = $usuario["email"] ?? null;
        $this->senha = $usuario["senha"] ?? null;
    }

    public function __set($atrib, $value)
    {
        $this->$atrib = $value;
    }

    public function __get($atrib)
    {
        return $this->$atrib;
    }


    public function createClass($post)
    {
        //UsuarioController::debugMe($post);
        return (new UsuarioDAO())->createDAO(new self($this->hashPassword($post)));
    }

    private function hashPassword($post){
        $post["senha"] = password_hash($post["senha"], PASSWORD_DEFAULT);
        return $post;
    }


    public function readClass($post)
    {
        if($this->validarAcessoClass($post)){
            return (new UsuarioDAO())->readDAO($post["email"]);
        } else {
            return "e-mail e/ou senha incorreto(s)";
        }
    }


    public function updateClass($post)
    {
        if($this->validarAcessoClass($post)){
            $post["senha"] = $post["senha-nova"];
            $post = $this->hashPassword($post);
            return (new UsuarioDAO())->updateDAO(new self($post));
        } else {
            return "e-mail e/ou senha incorreto(s)";
        }
    }


    public function deleteClass($post)
    {
        if($this->validarAcessoClass($post)){
            (new UsuarioDAO())->deleteDAO($post["email"]);
            return;
        } else {
            return "e-mail e/ou senha incorreto(s)";
        }
    }


    public function validarAcessoClass($post)
    {
        if ($this->checkCredenciais($post)) {
            return true;
        } else {
            return false;
        }
    }


    private function checkCredenciais($post)
    {
        if (array_key_exists("email", $post) and array_key_exists("senha", $post)) {
            $email = $post["email"];
            $senha = $post["senha"];
            if (!is_null($email) and !is_null($senha)) {
                if ($this->validaUsuarioSenha($email, $senha)) {
                    return true;
                }
            }
        }
        return false;
    }


    private function validaUsuarioSenha(&$email, &$senha)
    {
        $usuario = (new UsuarioDAO())->validarAcessoDAO($email); // SELECT banco
        if (password_verify($senha, $usuario->senha)) {
            return true;
        } else {
            return false;
        }
    }
}
