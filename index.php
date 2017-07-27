<?php

//Editar respuestas*
require('core/core.php');
//verifica el variable view

//echo Encriptar("123");
    if(isset($_GET['view'])) {
     //verifica si esta el archivo
     if(file_exists('core/Controladores/' . strtolower($_GET['view']) . 'Controlador.php')) {
       //incluimos el archivo
       include('core/Controladores/' . strtolower($_GET['view']) . 'Controlador.php');
     } else {
       include('core/Controladores/errorControlador.php');
     }
   } else {
     include('core/Controladores/indexControlador.php');
   }

 ?>
