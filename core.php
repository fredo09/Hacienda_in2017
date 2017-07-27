<?php
/*
* Nucleo del sistema
*/

//session
session_start();

#variables
define('HOST','localhost');
define('BD', 'haciendabd');
define('USER','root');
define('PASS','vertrigo');

#Constantes de la app
define('HTML_DIR','html/');

#Estrustura
require('core/modelo/class.ConexionBD.php');
require('core/bin/Funciones/Encriptar.php');
require('core/bin/Funciones/usuarios.php');



//varianble que engloba a todos los usarios
$user=Usuarios();

 ?>
