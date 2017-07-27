<?php
/**
 * Estructura para traer la data
 */
 
 //requirendo la conexion
 require_once('conexion3.php');
 require_once('class.Documento.php');

class Data{

 //variables
  private $con;
  function __construct(){
    # code...
    $this->conexion=new Conexion3("localhost","tec_hacienda","root","vertrigo");

  }

  public function getDocumentos(){
    $documentos=array();
    //consulta sql
    $query="select * from documento;";
    $res=$this->conexion->ejecutar($query);

    while ($row=mysql_fetch_array($res)) {
      # instacia del objeto documento
      $doc= new Documento();

      //accediendo a los atributos del modelo documento
      $doc->idDocumento=$row[0];
      $doc->Folio=$row[1];
      $doc->Concepto=$row[2];
      $doc->Tcobro=$row[3];
      $doc->Monto=$row[4];

      //agregando al arreglo
      array_push($documentos,$doc);
    }
    return $documentos;
  }

}


 ?>
