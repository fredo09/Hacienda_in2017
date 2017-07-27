<?php
$con=new Conexion();

$cv=$_POST['codigo'];
$Folio=$con->real_escape_string($_POST['folio']);
$descripcion=$con->real_escape_string($_POST['descrip']);
$tcobro=$con->real_escape_string($_POST['tcobro']);
$costo=$_POST['monto'];


$my="UPDATE descripcion SET Folio='$Folio', Concepto='$descripcion', Tcobro='$tcobro', Monto='$costo' WHERE Cv='$cv';";

 //iniciando el proceso de insertar dato en la base de datos
  $con->query($my);

    $HTML=1;


 $con->close();
  echo $HTML;


 ?>
