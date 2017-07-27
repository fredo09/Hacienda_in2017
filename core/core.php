<?php
/*
* Nucleo del sistema
*/

//session
session_start();

#variables
define('HOST','localhost');
define('BD', 'tec_hacienda');
define('USER','root');
define('PASS','vertrigo');

#Constantes de la app
define('HTML_DIR','html/');

#Estrustura
require('core/modelo/class.ConexionBD.php');
//require('core/modelo/conexion3.php');
//require('core/modelo/data.php');
require('core/bin/Funciones/Encriptar.php');
require('core/bin/Funciones/usuarios.php');
require('core/bin/Funciones/img.php');



//varianble que engloba a todos los usarios
$user=Usuarios();
$rutas=imagen();
//echo "mi ruta ". $rutas;
 ?>
