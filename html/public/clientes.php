<?php
  //incluimos el archivo header
  include('html/overall/header.php');
 ?>
  <body>

  <header class="container-fluid">
    <?php
    //incluimos el archivo nav
    include('html/overall/nav.php');
     ?>
  </header>


    <div class="container" style="margin-top:10px;">
      <div class="jumbotron">
         <h1>Registre sus Clientes </h1>
         <br>
         <p>"Tablas relacionados con clientes"</p>
      </div>
    </div>
    <div class="container">

      <form class="form-horizontal" style="margin: 20px;" id="cuadro2_cli">
  <fieldset>
              <legend><strong>Llene porfavor!</strong></legend>
              <center>
                <div class="col-md-12">
                    <!--Caja de texto en el que aparecera el resultado del registro-->
                       <div id="_AJAX_">

                        </div>
                    </div>
              </center>


  <div class="form-group" id="cuadro2_cli">
        <input type="hidden" id="idcliente" name="idcliente" value="0">
				<input type="hidden" id="opciones_cli" name="opcion" value="registrar">
   <label for="inputEmail" class="col-md-2 control-label">RFC</label>
   <div class="col-lg-5">
     <input type="text" class="form-control" id="rfc"name="rfc" placeholder="ingrese el RFC">
   </div>
  </div>

  <div class="form-group col-lg-offset-4">
   <label for="inputEmail" class="col-lg-2 control-label">Nombre</label>
   <div class="col-lg-5">
     <input type="text" class="form-control" id="nombre" name="nombre" placeholder="ingrese el Nombre">
   </div>
  </div>

  <div class="form-group col-lg-offset-4">
   <label for="inputEmail" class="col-lg-2 control-label">Domicilio</label>
   <div class="col-lg-5">
     <input type="text" class="form-control" id="domicilio"  name="domicilio" placeholder="ingrese el Domicilio">
   </div>
  </div>
  <div class="form-group">
   <div class="col-lg-10 col-lg-offset-2">
     <input id="edit_cli" type="submit" class="btn btn-success" value="Editar">
     <input id="btn_listar" type="button" class="btn btn-primary" value="Listar">
     <button type="button" id="btn_reg_cli" class="btn btn-primary" onclick="Registro_cli()">Registrar</button>

   </div>
  </div>
  </fieldset>
  </form>
    </div>


    <?php
      if(isset($_SESSION['app_id'])){
        echo '<div class="container" id="cuadro1_cli">
        <button class="btn btn-primary" id="btn_nuevo_cli" style="margin-bottom:10px;"> Nuevo Cliente</button>
          <table id="dtc" class="table table-bordered table-hover" cellspacing="0" width="100%">
           <thead>
             <tr>
               <th>Cv</th>
               <th>RFC</th>
               <th>Domicilio</th>
               <th>Nombre</th>
               <th scope="2">Operaciones</th>
             </tr>
           </thead>
         </table>
        </div>';
      }else{
        echo '<div class="container" style="margin-top:10px;">
          <div class="jumbotron">
             <h1>Inicie Sesion</h1>
             <br>
             <p><a class="btn btn-primary btn-lg" href="?view=login">Logearse</a></p>
          </div>
        </div>';
      }

     ?>


                  <!--Empieza el modal de eliminacion-->
     <div>
		<form id="frmEliminarCliente" action="" method="POST">
			<input type="hidden" id="id_cliem" name="idcliente" value="">
			<input type="hidden" id="opcion_cli" name="opcion" value="eliminar">
			<!-- Modal -->
			<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="modalEliminarLabel">Eliminar Cliente</h4>
						</div>
						<div class="modal-body">
							¿Está seguro de eliminar al Cliente? <strong data-name=""></strong>
						</div>
						<div class="modal-footer">
							<button type="button" id="eliminar-cli" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						</div>
					</div>
				</div>
			</div>
			<!-- Modal -->
		</form>
	</div>



  </body>
  <?php
   //incluimos el archivo footer
   include('html/overall/footer.php');
   ?>
</html>
