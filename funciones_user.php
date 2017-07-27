<?php
include('conexion2.php');


$opcion=$_POST['opcion'];

if($opcion=="modificar"){

  $id=$_POST['idusuarios'];
  $user=$_POST['name'];
  $email=$_POST['email'];

  modificar($id,$user,$email,$conexion);
}else if($opcion=="eliminar"){
  $id=$_POST['idusuarios'];
    eliminar($id,$conexion);
}
/*switch ($opcion) {
  case 'modificar':
    # code...
    modificar($id,$user,$email,$conexion);
    break;

    case 'eliminar':
      # code...
      eliminar($id,$conexion);
      break;

}
*/
//funcion para modficar el usuario
function modificar($id,$user,$email,$conexion){
  $my="UPDATE usuario SET usuario='$user', Email='$email' WHERE idUsuario='$id';";

  $resultado = mysqli_query($conexion, $my);
  verificar_resultado($resultado);
  cerrar($conexion);

}

function eliminar($id,$conexion){
  $query ="DELETE FROM  usuario WHERE idUsuario='$id';";
  $resultado = mysqli_query($conexion, $query);
  verificar_resultado( $resultado );
  cerrar( $conexion );

}

function verificar_resultado($resultado){
  $informacion=[];
  if(!$resultado){
    $informacion["mensaje"]="ERROR";
  }else{
    $informacion["mensaje"]="BIEN";
    echo json_encode($informacion);
  }

  function cerrar($conexion){
  mysqli_close($conexion);
  }
}
 ?>
