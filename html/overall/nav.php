<nav class="navbar navbar-default">
<div class="container-fluid">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
 <span class="sr-only">Toggle navigation</span>
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="?view=index">Hacienda</a>
</div>

<?php
if(!isset($_SESSION['app_id'])){

}else{
  echo '<ul class="nav navbar-nav">
   <li class="active"><a href="?view=cobro">Cobrar <span class="sr-only">(current)</span></a></li>
    <li class="dropdown">
     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Documentos<span class="caret"></span></a>
     <ul class="dropdown-menu" role="menu">
       <li><a href="?view=reg_doc"><span class="glyphicon glyphicon-list-alt" style="margin:5px;"></span>Registro de documentos</a></li>
       <li class="divider"></li>
       <li><a href="?view=modi_dog"><span class="glyphicon glyphicon-list-alt" style="margin:5px;"></span>Modificar Documentos</a></li>
     </ul>
   </li>
  </ul>
  ';
}



 ?>

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav navbar-right">
  <?php
  //mete los enlaces si la session no esta
  if(!isset($_SESSION['app_id'])){
    echo '<li><a href="#" data-toggle="modal" data-target="#myReg">Registratre!</a></li>';
    echo '<li><a href="?view=login">Login</a></li>';

  }else {
    $admin=$user[$_SESSION['app_id']]['idUsuario'];
    echo '<li><a href="?view=clientes"><span class="glyphicon glyphicon-user"></span>Clientes</a></li>';
    echo '<li><a href="#">'.strtoupper($user[$_SESSION['app_id']]['usuario']).'</a></li>';
    //echo '<li><a href="#"><span class="glyphicon glyphicon-user" style="margin-rigth:5px;"></span>Mi Cuenta</a></li>';
    echo '<li><a href="?view=salir"><span class="glyphicon glyphicon-off"></span> Cerrar Session</a></li>';

      if($admin==="1"){
        echo '<li><a href="?view=user"><span class="glyphicon glyphicon-user"></span> Usuarios</a></li>';
      //  echo '<li><a href="?view=respaldo"><span class="glyphicon glyphicon-user"></span>Respaldar BD</a></li>';
      }
  }
   ?>
 <!--Inlcuimos con etiquetas php el formulario de registrode nuevo usuario-->
 <?php
    include('html/public/registro.html');
  ?>
</ul>
</div>
</div>
</nav>
