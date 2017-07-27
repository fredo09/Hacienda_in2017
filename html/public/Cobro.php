<?php
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
        <h1>Cobre sus Documentos</h1>
        <br>
     </div>
   </div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Documentos</h1>
			<a href="?view=reg_doc" class="btn btn-default">Agregar Documentos</a>
			<a href="?view=cart" class="btn btn-warning">Ver Carrito</a>
			<a href="?view=list-ventas" class="btn btn-warning">Ver Cobros</a>
			<br><br>

<?php
/*
* Esta es la consula para obtener todos los productos de la base de datos.
*/
$products = $conexion->query("select * from documento;");
?>
<table class="table table-bordered">
<thead>
	<th>iddocumento</th>
	<th>Concepto</th>
	<th>Precio</th>
	<th></th>
</thead>
<?php
/*
* Apartir de aqui hacemos el recorrido de los productos obtenidos y los reflejamos en una tabla.
*/
//print_r($_SESSION["cart"]);
while($r=$products->fetch_object()):
	?>
<tr>
	<td><?php echo $r->idDocumento;?></td>
	<td><?php echo $r->Concepto;?></td>
	<td>$ <?php echo $r->Monto; ?></td>
	<td style="width:260px;">
	<?php
	$found = false;

	if(isset($_SESSION["cart"])){
		 foreach ($_SESSION["cart"] as $c) {
			 if($c["product_id"]==$r->idDocumento){
				 $found=true;
				 break;
			  }
			 }
		 }
	?>
	<?php if($found):?>
		<a href="?view=cart" class="btn btn-info">Agregado</a>
	<?php else:?>
	<form class="form-inline" method="post" action="?view=addtocart">
	<input type="hidden" name="product_id" value="<?php echo $r->idDocumento; ?>">
	  <div class="form-group">
	    <input type="number" name="q" value="1" style="width:100px;" min="1" class="form-control" placeholder="Cantidad">
	  </div>
	  <button type="submit" class="btn btn-primary">Agregar al carrito</button>
	</form>
	<?php endif; ?>
	</td>
</tr>
<?php endwhile; ?>
</table>
<br><br><hr>
<p>Hecho por ISC <a href="#" target="_blank">ISC</a></p>

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
