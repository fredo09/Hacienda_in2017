<?php
	$server = "localhost";
	$user = "root";
	$password = "vertrigo";//poner tu propia contraseña, si tienes una.
	$bd = "tec_hacienda";
  $conexion;

	$conexion = mysqli_connect($server, $user, $password, $bd);
	if (!$conexion){
		die('Error de Conexión: ' . mysqli_connect_errno());
	}
?>
