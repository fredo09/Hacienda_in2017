<?php
/**
 * Clase de conexion a la BD
 */
class Conexion extends mysqli{

  //Constructor de la clase
   public  function __construct() {
    parent::__construct(HOST,USER,PASS,BD); //Se envia a la clase que se esta heredendo
    $this->connect_errno ? die("Error- Datos Incorrectos"): null; //por si hay algun error
    $this->set_charset("utf8"); //tipo de caracteres
  }

  //retorna el numero de columnas
  public function columnas($queryRo){
    return mysqli_num_rows($queryRo);
  }

    public function liberar($query) {
      return mysqli_free_result($query);
    }
    public function recorrer($query) {
      return mysqli_fetch_array($query);
    }
}
?>
