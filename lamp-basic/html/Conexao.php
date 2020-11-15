<?php

class Conexao {

    private const HOST = 'localhost';
    private const DATABASE = 'teste';
    private const USER = 'root';
    private const PASSWORD = '';

    private static $instance;


    /**
     * Instance to DAO
     */
    public static function getInstance($sql, $noPrepare = false)
    {
        if ($noPrepare == true)
            return self::shakeInstance();
        else
            return self::shakeInstance()->prepare($sql);
    }


    /**
     * No instance? Take one...
     */
    private static function shakeInstance() : PDO
    {
        if (!isset(self::$instance)) {
            self::$instance = new PDO(
                'mysql:host='.self::HOST.';dbname='.
                self::DATABASE,
                self::USER,
                self::PASSWORD,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
            );
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        }
        return self::$instance;
    }
}
