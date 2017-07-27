<?php
/*
* Este archio muestra los productos en una tabla.
*/
//session_start();
include "html/public/php/conection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="styles/css/bootstrap.min.css">
	<link rel="stylesheet" href="styles/css/jquery-ui.min.css"/>
  <link rel="stylesheet" href="styles/css/font-awesome.min.css">
</head>
<?php
 include('html/overall/nav.php');
 ?>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Carrito</h1>
			<a href="?view=cobro" class="btn btn-default">Documentos</a>
			<br><br>
<?php
/*
* Esta es la consula para obtener todos los productos de la base de datos.
*/
$products = $con->query("select * from documento");
if(isset($_SESSION["cart"]) && !empty($_SESSION["cart"])):
?>
<table class="table table-bordered">
<thead>
	<th>Cantidad</th>
	<th>Producto</th>
	<th>Precio Unitario</th>
	<th>Subtotal</th>
	<th></th>
</thead>


<?php
/*
* Apartir de aqui hacemos el recorrido de los productos obtenidos y los reflejamos en una tabla.
*/
//print_r($_SESSION["cart"]);
$Total=0;
foreach($_SESSION["cart"] as $c):
	//se hace consulta de la tabla documento por medio del ID que se consigue en la variable de session "CART"
$products = $con->query("select * from documento where idDocumento=$c[product_id]");

$r = $products->fetch_object();
//variable "q" significa la cantidad que adquirio
	?>
<tr>
<th><?php echo $c["q"];?></th>
	<td><?php echo $r->Concepto;?></td>
	<td>$ <?php echo $r->Monto; ?></td>
	<td>$ <?php echo $c["q"]*$r->Monto; ?></td>
	<?php
	//Mostart Total
	$Total+=$c["q"]*$r->Monto;
	 ?>
	<td style="width:260px;">
	<?php
	$found = false;
	foreach ($_SESSION["cart"] as $c) {
		if($c["product_id"]==$r->idDocumento){
			$found=true;
			 break;
		 }
	 }
	?>
		<a href="?view=delfromcart&id=<?php echo $c["product_id"];?>" class="btn btn-danger">Eliminar</a>
	</td>
</tr>
<?php endforeach;

?>

</table>

<h2>Total: <?php echo"$".$Total;  ?> </h2>

<!--formulario para enviar los datos ya registrar en el cobro-->
<form class="form-horizontal" id="cobro_frm" method="POST" action="?view=process">
	<!--Mostrar el total-->
 <div class="form-group">
	<!-- <label for="inputEmail3"  class="col-sm-2 control-label">Total:</label>  Nuevos cambios-->
	 <div class="col-sm-5">
<!--<input type="text" name="email" required class="form-control" id="inputEmail3" placeholder="Email del cliente">-->
			<input type="hidden" name="total" class="form-control" id="inputEmail3" value="<?php echo  $Total; ?>" readonly="readonly"  >
	 </div>
 </div>
  <div class="form-group">
    <label for="inputEmail3"  class="col-sm-2 control-label">Cliente</label>
    <div class="col-sm-5">
<!--<input type="text" name="email" required class="form-control" id="inputEmail3" placeholder="Email del cliente">-->
			 <input type="text" name="rfc" class="form-control" id="bus" placeholder="Ingrese el RFC del cliente" required="">
			 <span class="help-block">Si el Cliente no esta registrado
				 favor de dar de alta para recuperar datos. <a href="?view=clientes">ir a registro</a></span>
    </div>
  </div>
   <!--Mostrar el usuario-->
	<div class="form-group">
    <label for="inputEmail3"  class="col-sm-2 control-label">Usuario:</label>
    <div class="col-sm-5">
<!--<input type="text" name="email" required class="form-control" id="inputEmail3" placeholder="Email del cliente">-->
			 <input type="text" name="usuario" class="form-control" id="inputEmail3" value="<?php echo  $user[$_SESSION['app_id']]['usuario']?>" readonly="readonly"  >
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Procesar Cobro</button>
    </div>
  </div>
</form>


<?php else:?>
	<p class="alert alert-warning">El carrito esta vacio.</p>
<?php endif;?>
<br><br><hr>
<p>Powered by <a href="#" target="_blank">Evilnapsis</a></p>

		</div>
	</div>
</div>

<script src="styles/js/jquery.js"></script>
<script src="styles/js/jquery-ui.min.js"></script>
<script src="styles/js/bootstrap.min.js"></script>
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
