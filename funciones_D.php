<?php
///Modificar al eliminar para hacienda
include('conexion2.php');

$opcion=$_GET['opcion'];
//$opcion="eliminar";
//echo $opcion;
if($opcion=="modificar"){

  $id=$_GET['idusuario'];
  $folio=$_GET['folio'];
  $concepto=$_GET['concepto'];
  $tcobro=$_GET['tcobro'];
  $monto=$_GET['monto'];

  modificar($id,$folio,$concepto,$tcobro,$monto,$conexion);

}else if($opcion=="eliminar"){
  $id=$_GET['idusuario'];
//$id=2;
  //  echo  "Mi id".$id;
    eliminar($id,$conexion);
}

/*
switch ($opcion) {
  case 'modificar':
    # code...
    modificar($id,$folio,$concepto,$tcobro,$monto,$conexion);
    break;

    case 'eliminar':
      # code...
      eliminar($id,$conexion);
      break;

}
*/
function modificar($id,$folio,$concepto,$tcobro,$monto,$conexion){
  $my="UPDATE documento SET Folio='$folio', Concepto='$concepto', Tcobro='$tcobro', Monto='$monto' WHERE idDocumento='$id';";
  $resultado = mysqli_query($conexion, $my);
  verificar_resultado($resultado);
  cerrar($conexion);

}

function eliminar($id,$conexion){
  $my="SELECT idCobro FROM detalle_cobro WHERE idDocumento2='$id';";
  $resul = mysqli_query($conexion, $my);
  $idcobro=array();
while ($reg=mysqli_fetch_row($resul)) {
    $idcobro[]=$reg;

}
// print_r ($idcobro);
//Elimino el documento
$query ="DELETE FROM  documento WHERE idDocumento='$id';";
$resultado = mysqli_query($conexion, $query);

//$tam=count($idcobro) ;

  foreach ($idcobro as $a=>$p) {
        foreach ($p as $k) {
          $borrar="DELETE FROM cobro WHERE idCobro='$k';";
          $resul = mysqli_query($conexion, $borrar);
        }

  }


  //verifica el resultado de la elimnacion del documento
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
