<?php
  //incuimos la conexion2
  //incuimos la conexion2
    include('conexion2.php');
    $query="SELECT * FROM documento;";
    $resul=mysqli_query($conexion,$query);
      if($resul){
      while($data=$resul->fetch_assoc()){
         $array["data"][]=$data;
      }
      //mostramos el resultado del arreglo en formato json
     echo json_encode($array);

    }



 ?>
