 <?php

 ////////////////////////////////////////////////////////////////////////////////////////////////////////7
  $id=$_REQUEST['id'];
 /*
 * Este archio muestra los productos en una tabla.
 */
 //session_start();
 include "conexion2.php";
 //unset($_SESSION["cart"]);
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Cobro</title>
 	<link rel="stylesheet" href="styles/css/bootstrap.min.css"/>
   <link rel="stylesheet" href="styles/css/jquery-ui.min.css"/>
   <link rel="stylesheet" href="styles/css/dataTables.bootstrap.min.css">
   <link rel="stylesheet" href="styles/css/font-awesome.min.css">
 </head>
 <body>
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
       //$admin=$user[$_SESSION['app_id']]['usuario'];
       echo '<li><a href="?view=clientes"><span class="glyphicon glyphicon-user"></span>Clientes</a></li>';
     //  echo '<li><a href="?view=registro">'.strtoupper($user[$_SESSION['app_id']]['usuario']).'</a></li>';
     //  echo '<li><a href="?view=cuenta&id='.$_SESSION['app_id'].'"><span class="glyphicon glyphicon-user" style="margin-rigth:5px;"></span>Mi Cuenta</a></li>';
       echo '<li><a href="?view=salir"><span class="glyphicon glyphicon-off"></span> Cerrar Session</a></li>';

       //  if($admin==="admin"){
       //    echo '<li><a href="?view=user"><span class="glyphicon glyphicon-user"></span> Usuarios</a></li>';
       //  }
     }
      ?>
    <!--Inlcuimos con etiquetas php el formulario de registrode nuevo usuario-->
    <!-- Modal -->
      <div class="modal fade" id="myReg" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">

            <div class="" id="_AJAX_REG_">

            </div>
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Registro</h4>
            </div>
            <div class="modal-body">
              <center>
                <form class="form-signin "style="width: 500px;" >
                  <h2 class="form-signin-heading">Registre un nuevo usuario</h2>
                     <label for="inputEmail"  class="sr-only">Usuario</label>
                     <input type="text"  id="user_reg" class="form-control" placeholder="Introduce usuario" required="" autofocus="">
                     <label for="inputPassword" class="sr-only">Password</label>
                     <input type="password" id="pass_reg" class="form-control" placeholder="Introduce Password" required="">
                     <label for="inputPassword" class="sr-only">Email</label>
                     <input type="email" id="email_reg" class="form-control" placeholder="Introduce email" required="">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value="1" id="sesion_reg"> Recordarme
                    </label>
                  </div>
                    <button class="btn btn-block btn-primary " id="btni" type="button"  onclick="registro()" >Registrarse</button>
                </form>
              </center>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
          </div>

        </div>
      </div>
      <!--Fin del registro-->
   </ul>
   </div>
   </div>
   </nav>
 <!--Aqui es la parte del cobro-->
   <div class="container" style="margin-top:10px;">
     <div class="row">

     </div>
      <div class="jumbotron">
         <h1>Detalle de cobro</h1>
         <br>
      </div>
    </div>

 <div class="container">
 	<div class="row">
 		<div class="col-md-12">
 			<h1>listado del cobro con ID:<?php echo $id ?></h1>
 			<br><br>

 <?php
 //recibimos el id que se envia desde lis-ventas
 $id=$_REQUEST['id'];

 /*
 * Esta es la consula para obtener todos los productos de la base de datos.
 */
 //$cobro = $conexion->query("select d.iddetalle_cobro, doc.Concepto,u.usuario, cli.Nombre, d.cantidad, d.sub_monto
//from detalle_cobro d, documento doc, usuario u, cliente cli
//where d.idDocumento2 = doc.idDocumento and d.idUsuario = u.idUsuario and d.idCliente = cli.idCliente and
//d.idCobro='$id';");

$cobro = $conexion->query("select d.iddetalle_cobro, doc.Concepto,u.usuario, cli.Nombre, d.cantidad, d.sub_monto
from detalle_cobro d, documento doc, usuario u, cliente cli
where d.idDocumento2 = doc.idDocumento and d.idUsuario = u.idUsuario and d.idCliente = cli.idCliente and
d.idCobro='$id';");

 ?>
 <table class="table table-bordered">
 <thead>
 	<th>ID</th>
 	<th>Concepto</th>
 	<th>Usuario</th>
 	<th>Cliente</th>
  <th>Cantidad</th>
  <th>Sub_total</th>
 </thead>
 <?php
 /*
 * Apartir de aqui hacemos el recorrido de los productos obtenidos y los reflejamos en una tabla.
 */
 //print_r($_SESSION["cart"]);
 $Total=0;

 while($r=$cobro->fetch_object()):
 	?>
 <tr>
 	<td><?php echo $r->iddetalle_cobro;?></td>
 	<td><?php echo $r->Concepto;?></td>
 	<td><?php echo $r->usuario; ?></td>
  <td><?php echo $r->Nombre; ?></td>
  <td><?php echo $r->cantidad; ?></td>
  <td><?php echo $r->sub_monto; ?></td>
  <?php
//Sumatora de los sub_cobros para sacar el total
 $Total+=$r->cantidad*$r->sub_monto;
   ?>
  </tr>
 <?php endwhile; ?>
 </table>
  <?php
   $sql=$conexion->query("SELECT monto From cobro where idcobro='$id'");
   while($c=$sql->fetch_object()){
     ?>

    <?php
     }
    // Se actualiza cada ves que se haga una modificacion
     $conexion->query("UPDATE cobro SET monto='$Total' WHERE idCobro='$id';");
    ?>
    <h1>Total: $ <?php echo $Total;?></h1>

    <a href="?view=list-ventas" class="btn btn-warning">Regresar</a>
    <a href="?view=pdf&id=<?php echo  $id ?>&idtotal=<?php echo $Total?>" class="btn btn-primary">PDF</a>
 <br><br><hr>
 <p>Hecho por ISC <a href="#" target="_blank">Evilnapsis</a></p>

 		</div>
 	</div>
 </div>
 <script src="styles/js/jquery.js"></script>
 <script src="styles/js/bootstrap.min.js"></script>
 <script src="styles/js/jquery-ui.min.js"></script>
 <script src="styles/js/jquery.dataTables.min.js"></script>
 <script src="styles/js/dataTables.bootstrap.js"></script>
 <script type="text/javascript" src="styles/js/bootstrap-datepicker.js"></script>
 <!--<script src="styles/js/buttons.bootstrap.min.js"></script>
 -->
 <!--Librerias para exportar PDF-->
 <script src="styles/js/pdfmake.min.js"></script>
 <script src="styles/js/vfs_fonts.js"></script>

 <!--Librerias para botones de exportación-->
 <script src="styles/js/buttons.html5.min.js"></script>

 <!--Libreria para exportar Excel-->
 <script src="styles/js/jszip.min.js"></script>

 <!--Codigo JAVASCRIPT-->
 <script src="listar.js"></script>
 <script src="styles/js/app/listar_cli.js"></script>
 <script src="styles/js/app/listar_usuario.js"></script>
 <!--Script javascript-->
 <script type="text/javascript" src="styles/js/app/buscar.js"></script>
 <script type="text/javascript" src="styles/js/app/buscar_cli.js"></script>
 <script type="text/javascript" src="styles/js/app/Generales.js"></script>
 <script type="text/javascript" src="styles/js/app/login.js" ></script>
 <script type="text/javascript" src="styles/js/app/registro.js"></script>
 <script type="text/javascript" src="styles\js\app\Reg_dog.js"></script>
 <script type="text/javascript" src="styles\js\app\Modificar_dog.js"></script>
 <script type="text/javascript" src="styles\js\app\reg_clientes.js"></script>

 </body>
 </html>
