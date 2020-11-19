<?php

class Rotas 
{
  private $list;
  private $uri;

  public function __construct()
  {
    ( count( explode('?', $_SERVER['REQUEST_URI']) ) > 1 ) ? $this->uri = explode('?', $_SERVER['REQUEST_URI'])[0] : $this->uri = $_SERVER['REQUEST_URI'];
  }

  function listRoute($metodo, $uri, $function)
  {
    // echo "add Rotas";
    $this->list[] = array( 
      "method" => $metodo,
      "uri" => $uri,
      "function" => $function
    );
  }
  
  function findRoute()
  {
    foreach ($this->list as $route) {
      if( $this->uri == $route['uri'] &&  $_SERVER['REQUEST_METHOD'] == $route['method']){
        $route['function']() ;
      }
    }
  }
}

