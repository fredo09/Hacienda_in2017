<?php
$con=new Conexion();

$codigo=$con->real_escape_string(trim($_POST['codigo']));
$descripcion=$con->real_escape_string(trim($_POST['descrip']));
$tcobro=$con->real_escape_string(trim($_POST['tcobro']));
$costo=trim($_POST['monto']);


$my="INSERT INTO documento () VALUES ('','$codigo','$descripcion','$tcobro','$costo');";

 //iniciando el proceso de insertar dato en la base de datos
  $con->query($my);
  $HTML=1;

 $con->close();
  echo $HTML;
 ?>
