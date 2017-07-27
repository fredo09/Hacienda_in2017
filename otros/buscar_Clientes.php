<?php
include('otros/conexion2.php');
$rfc = trim($_GET['term']);
$consulta = "SELECT RFC FROM cliente WHERE RFC LIKE '%.$rfc.%'";

$result = $con->query($consulta);

if($result->num_rows > 0){
   while($fila = $result->fetch_array()){
       $doc[] = $fila['RFC'];
   }
    echo "hola" . $doc;
    echo json_encode($doc);
}
 ?>
