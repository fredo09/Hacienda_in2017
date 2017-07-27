<?php
$con=new Conexion();

$rfc=$con->real_escape_string(trim($_POST['rfc']));
$nombre=$con->real_escape_string(trim($_POST['nombre']));
$domicilio=$con->real_escape_string(trim($_POST['domicilio']));



$my="INSERT INTO cliente () VALUES ('','$rfc','$domicilio','$nombre');";

 //iniciando el proceso de insertar dato en la base de datos
  $con->query($my);
  $HTML=1;

//cerramos la conexion;
 $con->close();
  echo $HTML;
 ?>
