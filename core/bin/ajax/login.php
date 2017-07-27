<?php
//parametros del formlario que envia ajax
$param1=trim($_POST['user']);
$param2=trim($_POST['pass']);


//realizando conexion
$con= new Conexion();

$data=$con->real_escape_string($param1);
$pass_encrip=Encriptar($param2);

//sentencia SQL
$sql="SELECT idUsuario FROM usuario WHERE usuario='$data' AND Password='$pass_encrip' LIMIT 1;";
//echo "mi query". $sql;
$myquery=$con->query($sql);

//checando el resultado de la consulta
 if($con->columnas($myquery) > 0){
   //checando la variable de session
   if($_POST['sesion']) {
     ini_set('session.cookie_lifetime', time() + (60*60*24));
   }
   $_SESSION['app_id'] = $con->recorrer($myquery)['idUsuario'];
   $_SESSION['time_online'] = time() - (60*6);
    echo 1;
    }else{
      echo '<div class="alert alert-dismissible alert-danger">
      <button type="button" class="close" data-dismiss="alert">x</button>
      <strong>ERROR...! XD </strong> Las datos son incorectos intente de nuevo.
    </div>';
 }
 //libera la variable y serramos conexion
 $con->liberar($myquery);
 $con->close();
?>
