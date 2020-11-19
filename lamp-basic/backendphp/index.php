<?php
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Credentials: true");
  header("Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT");
  header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
  header("Content-type: application/json; charset=utf-8");
  header("Content-type: text/plain; charset=utf-8");

  define('__ROOT__', dirname(dirname(__FILE__)));

  require_once(__ROOT__."/html/UsuarioController.php");

  (new UsuarioController())->request();
