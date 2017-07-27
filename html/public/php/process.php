<?php
include "conexion2.php";
date_default_timezone_set("America/Mexico_City");
$date=date("Y-m-d");
$time=date("H:i:s");
//session_start();

$total=$_POST['total'];
$cliente=trim($_POST['rfc']);
$usuario=$_POST['usuario'];


 //consulta para ingresar el cobro en la tabla cobro
$consulta="INSERT INTO cobro(monto, fecha, hora) values('$total','$date','$time');";
$q1 = $conexion->query($consulta);

//consulta para conseguir el id del usuario y del cliente
$query_usuario="SELECT idUsuario FROM usuario WHERE usuario='$usuario'";
$res=$conexion->query($query_usuario);
//para sacar el id del usuario
$idusuario=0;
if($reg_user=mysqli_fetch_array($res)){
    $idusuario= $reg_user[0];
}

//consulta para conseguir el id del del cliente
$query_cliente="SELECT idCliente FROM cliente WHERE RFC='$cliente'";
$res_cliente=$conexion->query($query_cliente);

//para sacar el id del cliente
$idcliente=0;
if($reg_cliente=mysqli_fetch_array($res_cliente)){

    $idcliente= $reg_cliente[0];
}

if($q1){
    //sacamos el id del cobro que se a realizado ultimamente
    $cart_id = $conexion->query("SELECT max(idCobro) from cobro");
    $ultimocobro=0;
    if($reg=mysqli_fetch_array($cart_id)){
      $ultimocobro=$reg[0];
   }

//for para agrgar todos los detales de la cobro
    foreach($_SESSION["cart"] as $c){
      $products = $conexion->query("select * from documento where idDocumento=$c[product_id]");//conusulta para obtener el id del documento
      $r = $products->fetch_object();

      //  = $c["q"]*$r->Monto;
      $q1 = $conexion->query("INSERT INTO detalle_cobro(idDocumento2,iddetalle_cobro,idUsuario,idCliente,cantidad,sub_monto,idCobro)  VALUES
       ($c[product_id],NULL,'$idusuario','$idcliente', $c[q], $c[q]*$r->Monto ,'$ultimocobro')");
    //$q1 = $con->query("insert into cart_product(product_id,q,cart_id) value($c[product_id],$c[q],$ultimocobro)");
    }
    unset($_SESSION["cart"]);
}else{
  print "<script>alert('Cobro No realizado ');window.location='?view=cobro';</script>";

}
//Mensaje cuando el cobro  se realizo correctamente
print "<script>alert('Cobro procesado exitosamente');window.location='?view=cobro';</script>";

?>
