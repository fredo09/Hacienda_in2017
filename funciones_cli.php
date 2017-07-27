<?php
include('conexion2.php');

$opcion=$_GET['opcion'];

if($opcion=="modificar"){
  $id=$_GET['idcliente'];
  $rfc=$_GET['rfc'];
  $nombre=$_GET['nombre'];
  $domicilio=$_GET['domicilio'];
  modificar($id,$rfc,$nombre,$domicilio,$conexion);
}else if($opcion=="eliminar"){
   $id=$_GET['idcliente'];
    eliminar($id,$conexion);
}
/*switch ($opcion) {
  case 'modificar':
    # code...
    modificar($id,$rfc,$nombre,$domicilio,$conexion);
    break;

    case 'eliminar':
      # code...
      eliminar($id,$conexion);
      break;

}
*/
function modificar($id,$rfc,$nombre,$domicilio,$conexion){
  $my="UPDATE cliente SET RFC='$rfc', Direccion='$domicilio' ,Nombre='$nombre'WHERE idCliente='$id';";
  $resultado = mysqli_query($conexion, $my);
  verificar_resultado($resultado);
  cerrar($conexion);

}

function eliminar($id,$conexion){
  //Modificando la parte de la eliminacion del cliente
  $my="SELECT idCobro FROM detalle_cobro WHERE idCliente='$id';";
  $resul = mysqli_query($conexion, $my);
//recogiendo el id en la cosulta de detalle_cobro
  $idcobro=array();
while ($reg=mysqli_fetch_row($resul)) {
    $idcobro[]=$reg;

}

  $query ="DELETE FROM  cliente WHERE idCliente='$id';";
  $resultado = mysqli_query($conexion, $query);

  //recoriendo el arreglo asosiativo
    foreach ($idcobro as $a=>$p) {
          foreach ($p as $k) {
            $borrar="DELETE FROM cobro WHERE idCobro='$k';";
            $resul = mysqli_query($conexion, $borrar);
          }

    }

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
