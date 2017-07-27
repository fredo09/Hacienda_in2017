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

    <div class="_AJAX_">

    </div>
    <div class="container" style="margin-top:10px;">
      <div class="jumbotron">
         <h1>Modificando Documentos</h1>
         <br>
      </div>
    </div>
    <?php
      if(isset($_SESSION['app_id'])){
        echo '<div class="container" id="cuadro1">
          <table id="dt" class="table table-bordered table-hover dt" cellspacing="0" width="100%">
           <thead>
             <tr>
               <th>idDocumento</th>
               <th>Folio</th>
               <th>Concepto</th>
               <th>Tcobro</th>
               <th>Monto</th>
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

     <div class="col-sm-offset-2 col-sm-8">
				<p class="mensaje"></p>
			</div>

     <!--Formulario de modificacion-->
     <div class="container" id="cuadro2">
       <form class="form-horizontal" id="myfrm" action="" method="POST">
      <div class="form-group">
        <h3 class="col-sm-offset-2 col-sm-8 text-center">
        Documentos</h3>
      </div>
      <input type="hidden" id="id" name="idusuario" value="0">
      <input type="hidden" id="opcion" name="opcion" value="modificar">
      <div class="form-group">
        <label for="nombre" class="col-sm-2 control-label">Folio</label>
        <div class="col-sm-8"><input id="folio" name="folio" type="text" class="form-control"  autofocus></div>
      </div>
      <div class="form-group">
        <label for="textArea" class="col-lg-2 control-label">Descripcion</label>
        <div class="col-lg-10">
          <textarea class="form-control" rows="2" id="descrip" name="concepto"></textarea>
          <span class="help-block">Ingrese el concepto de cobro.</span>
        </div>
      </div>
      <div class="form-group">
        <label for="apellidos" class="col-sm-2 control-label">Tcobro</label>
        <div class="col-sm-8"><input id="tcobro" name="tcobro" type="text" class="form-control" maxlength="8" ></div>
      </div>
      <div class="form-group">
        <label  class="col-sm-2 control-label">Folio</label>
        <div class="col-sm-8"><input id="monto" name="monto" type="text" class="form-control"  autofocus></div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-8">
          <input id="" type="submit" class="btn btn-primary" value="Editar">
          <input id="btn_listar" type="button" class="btn btn-primary" value="Listar">
        </div>
      </div>
    </form>
     </div>

   <!--Fomulario de eliminacion-->
   <div>
   		<form id="frmEliminardoc" action="" method="POST">
   			<input type="hidden" id="id-eli" name="idusuario" value="0">
   			<input type="hidden" id="opcion-elim" name="opcion" value="eliminar">
   			<!-- Modal -->
   			<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel">
   				<div class="modal-dialog" role="document">
   					<div class="modal-content">
   						<div class="modal-header">
   							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   							<h4 class="modal-title" id="modalEliminarLabel">Eliminar Documento</h4>
   						</div>
   						<div class="modal-body">
   							¿Está seguro de eliminar el Documento?<strong data-name=""></strong>
   						</div>
   						<div class="modal-footer">
   							<button type="button" id="eliminar-usuario" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
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
