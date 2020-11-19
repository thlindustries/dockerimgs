<?php
class Sql extends PDO {
  private $conn; // Protegendo a variavel que vai instaciar minha conexao

  // Esse método construtor faz com que eu sempre me conecte ao banco automaticamente.
  public function __construct(){
    $this->conn = new PDO("mysql:dbname=kabum; host=lamp-basic_mysql-server_1", "root","admin123");
  }

  // Esse Função chama uma função singular onde esse função vai fazer o bind de cada declaração ligando Valores com Suas Variaveis, a necessidade de se colocar isso dentro de uma função é que essa parte do codigo pode ser usada em varios casos, e pode haver caso de um unico parametro ou de varios.
  private function setParams($statment, $params = array() )
  { 
    foreach ($params as $key => $value)
    {
      $this->setParam($statment, $key, $value);
    }
  }

  // Função para fazer um bind de cada vez
  private function setParam($statment, $key, $value) 
  {
    $statment->bindParam($key, $value);  //Liga o Array de Variaveis com seus determinados Valores
  }

  //função para receber as queries da meu controller
  public function query($rawQuery, $params = array() )
  {				
    $stmt = $this->conn->prepare($rawQuery); // Colocando a query dentro de uma função e deixando automatica
    $stmt->execute();

    return $stmt;
  }

  //Essa função utiliza todo o processo que já fizemos até agora para fazer um select no banco de dados os :array no fim da função sifginifica que o tipo de retorno dessa função é um array
  public function select($rawQuery, $params = array()):array{
    $stmt = $this->conn->prepare($rawQuery);
    try{
      if(!$stmt->execute()){
        echo '<pre> erro: ';
        print_r($stmt->errorInfo());
        exit;
      }
      $dados = $stmt->fetchALL();
      return $dados;
    }catch (Exception $e) {
      echo $e;
    }
  }	

  public function finalizar(){
    $this->conn = null;
  }

  public function insert ($rawQuery,$params){
    $stmt = $this->conn->prepare($rawQuery);
    try{
      $stmt->execute($params);
      echo json_encode($this->select("SELECT * FROM users WHERE email = '$params[1]'"));      
    }catch (Exception $e) {
      echo $e;
    }
  }

}