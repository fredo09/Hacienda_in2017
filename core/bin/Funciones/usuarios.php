<?php
function Usuarios(){
 $con=new Conexion();

  $sql=$con->query("SELECT * FROM usuario;");

  if($con->columnas($sql) > 0){
    while ($d= $con->recorrer($sql)) {
      # arrreglo de usuarios
      $user[$d['idUsuario']] = array(
      'idUsuario'=>$d['idUsuario'],
      'usuario'=>$d['usuario'],
      'Email'=>$d['Email'],
      'Password'=>$d['Password']
    //  'Nombre'=>$d['Nombre'],
    //  'Apellido'=>$d['Apellido'],
      //'cambio'=>$d['cambio']
    );
       }
  }
return $user;
}

 ?>
