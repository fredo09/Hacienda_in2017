<?php
//importamos el archivo de documentos
require_once('../../core/modelo/class.Documento.php');


//HACIMOS INSTANCIA DE LA CLASE DOCUMENTO
$d= new Documento();

//ACCEDIENDO A LOS DATOS DE LA CLASE DOCUMENTO
$d->idDocumento=$_POST['txtID'];
$d->Folio=$_POST['txtFolio'];
$d->Concepto=$_POST['txtConcepto'];
$d->Tcobro=$_POST['txtTcobro'];
$d->Monto=$_POST['txtMonto'];
$d->cantidad=$_POST['txtCantidad'];
$d->sub_total=$d->Monto * $d->cantidad;

//iniciamos sesion
session_start();
if(isset($_SESSION['compra'])){
  $compra=$_SESSION['compra'];
}else{
   $compra=array();
}
  array_push($compra, $d);
//  echo "mi arrary".  array_push($compra, $d);
 $_SESSION['compra']=$compra;
 header('Location:Cobro.php');
// echo"<script language='javascript'>window.location=''?view=cobro'</script>";
 ?>
