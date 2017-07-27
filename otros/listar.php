<?php
  //incuimos la conexion2
    include('../conexion2.php');
    $query="SELECT * FROM documento;";
    $resul=mysqli_query($conexion,$query);

    if($resul){

      while($data=mysqli_fetch_assoc($resul)){
         $array["data"][]=array_map("utf8_encode",$data);
      }
      //mostramos el resultado del arreglo en formato json
    // print_r($array);
    echo json_encode($array);
    }

mysqli_free_result($resul);
mysqli_close($conexion);
 ?>
