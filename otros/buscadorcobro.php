<?php
include('conexion2.php');
$cobro = $_GET['term'];

$consulta = "SELECT Concepto FROM descripcion WHERE Concepto LIKE '%$cobro%'";

$result = $con->query($consulta);

if($result->num_rows > 0){
   while($fila = $result->fetch_array()){
       $doc[] = $fila['Concepto'];
   }
    echo json_encode($doc);
}
 ?>
