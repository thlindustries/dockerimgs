<?php
  header('Access-Control-Allow-Origin: http://localhost:3000');

  require_once "UsuarioController.php";

  (new UsuarioController())->request();
