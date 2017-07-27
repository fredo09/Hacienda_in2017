<?php
//instanciado la clase conexion
$con=new Conexion();
$user=$con->real_escape_string(trim($_POST['user']));
$email=$con->real_escape_string(trim($_POST['email']));
$pass=trim($_POST['pass']);
//encriptando contraseña
$pass_encript=Encriptar($pass);

//consultas

//Consuta para ver el email
$sql=$con->query("SELECT Email FROM usuario WHERE Email='$email'LIMIT 1; ");

//condicion para checar el resultado de la consultas
if($con->columnas($sql)==0){
//  $key=md5(time());
$my="INSERT INTO usuario (usuario, Email, Password) VALUES ('$user','$email','$pass_encript');";

 //iniciando el proceso de insertar dato en la base de datos
  $con->query($my);
  $sql2=$con->query("SELECT MAX(idUsuario) AS idUsuario FROM usuario;");
  $_SESSION['app_id']=$con->recorrer($sql2)['idUsuario'];
  $con->liberar($sql2);
$HTML=1;
}else{
  $usuario=$con->recorrer($sql)['idUsuario'];
  $HTML= '<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">x</button>
  <strong>ERROR...! XD </strong> El Usuario ya existe.
</div>';

}

$con->liberar($sql);
$con->close();

echo $HTML;

 ?>
