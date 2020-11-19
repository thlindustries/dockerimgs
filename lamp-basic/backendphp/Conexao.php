<?php

class Conexao {
    private const HOST = 'lamp-basic_mysql-server_1';
    private const PORT = '3306';
    private const DATABASE = 'kabum';
    private const USER = 'root';
    private const PASSWORD = 'admin123';

    private static $instance;

    /**
     * Instance to DAO
     */
    public static function getInstance($sql, $noPrepare = false)
    {
      if ($noPrepare == true){
        return self::shakeInstance();
      }
      else{
        return self::shakeInstance()->prepare($sql);
      }
    }

    /**
     * No instance? Take one...
     */
    private static function shakeInstance() : PDO
    {
      $dsn = 'mysql:host='.self::HOST.';dbname='.self::DATABASE;

      if (!isset(self::$instance)) {
        self::$instance = new PDO($dsn,self::USER,self::PASSWORD);
      }
      return self::$instance;
    }
}
