<?php
    require_once "Conexao.php";
    require_once "UsuarioClass.php";

class UsuarioDAO {

    public function createDAO($usuario) {
        //UsuarioController::debugMe($usuario);
        try {
            $sql = "INSERT INTO `usuario` (`email`,`senha`) VALUES ('$usuario->email', '$usuario->senha')";
            $p_sql = Conexao::getInstance($sql);
            $p_sql->execute();
            return $this->readDAO($usuario->email);
        } catch (Exception $e) {

        }
    }

    public function readDAO($email) {
        try{
            $sql = "SELECT * FROM `usuario` WHERE `email` = '$email'";
            $p_sql = Conexao::getInstance($sql);
            $p_sql->execute();
            while($v_ret = $p_sql->fetchObject()) {
                $usuario = new UsuarioClass((array) $v_ret);
            }
            return $usuario ?? null;
        } catch (Exception $e) {

        }
    }

    public function updateDAO($usuario) {
        try {
            $sql = "UPDATE `usuario` SET `senha` = '$usuario->senha' WHERE `email` = '$usuario->email'";
            $p_sql = Conexao::getInstance($sql);
            $p_sql->execute();
            return $this->readDAO($usuario->email);

        } catch (Exception $e) {

        }
    }

    public function deleteDAO($email) {
        try{
            $sql = "DELETE FROM `usuario` WHERE `email` = '$email'";
            $p_sql = Conexao::getInstance($sql);
            $p_sql->execute();
            return "done";
        } catch (Exception $e) {

        }
    }


    public function validarAcessoDAO($email) {
        try {
            $sql = "SELECT * FROM `usuario` WHERE `email` = '$email'";
            $p_sql = Conexao::getInstance($sql);
            $p_sql->execute();
            while ($v_ret = $p_sql->fetchObject()) {
                $usuario = new UsuarioClass((array) $v_ret);
            }
            //UsuarioController::debugMe($usuario);
            return $usuario ?? null;
        } catch (Exception $e) {

        }

    }
}
