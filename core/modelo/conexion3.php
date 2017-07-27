<?php
//clase de conexion
/**
 *  este archivo solo funciona para relaizar el modulo de cobro
 */

class Conexion3{
  
  public $serve;
  public $nameBD;
  public $user;
  public $pass;

    public function __construct($serve,$nameBD,$user,$pass){
      $conexion=mysql_connect($serve,$user,$pass);
      if (!$conexion) {
        die('error en la conexion' . mysql_error());
      }
      if(!mysql_select_db($nameBD)){
        die("error en la base de datos". mysql_error());
      }
    }

      //Funcion para ejecutar la consulta
    public function ejecutar($query){
      return mysql_query($query);
    }
}


 ?>
