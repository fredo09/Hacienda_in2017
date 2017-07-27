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
         <h1>Registre sus Documentos</h1>
         <br>
         <p>"Formulario para su registro de documentos"</p>
      </div>
    </div>
<!--
    <div class="row fix">
      <div class="col-md-12">
          <div class="container">
            <div class="alert alert-dismissible alert-info">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                 <strong>Registre su documento!</strong> <p class="lead">Favor de llenar los campos para registrar el documento</p>.
            </div>
          </div>
      </div>
    </div>
-->
    <div class="container">

      <form class="form-horizontal" style="margin: 20px;">
  <fieldset>
              <legend><strong>Llene porfavor!</strong></legend>
              <center>
                <div class="col-md-12">
                    <!--Caja de texto en el que aparecera el resultado del registro-->
                       <div id="_AJAX_">

                        </div>
                    </div>
              </center>


 <div class="form-group">
   <label for="inputEmail" class="col-md-2 control-label">Codigo</label>
   <div class="col-lg-5">
     <input type="text" class="form-control" id="codigo" placeholder="ingrese el Codigo">
   </div>
 </div>

 <div class="form-group">
   <label for="textArea" class="col-lg-2 control-label">Descripcion</label>
   <div class="col-lg-10">
     <textarea class="form-control" rows="2" id="descrip"></textarea>
     <span class="help-block">Ingrese el concepto de cobro.</span>
   </div>
 </div>
 <div class="form-group col-lg-offset-4">
   <label for="inputEmail" class="col-lg-2 control-label">Tipo de cobro</label>
   <div class="col-lg-5">
     <input type="text" class="form-control" id="tcobro" placeholder="ingrese el tipo de cobro">
   </div>
 </div>

 <div class="form-group col-lg-offset-4">
   <label for="inputEmail" class="col-lg-2 control-label">Costo</label>
   <div class="col-lg-5">
     <input type="text" class="form-control" id="monto" placeholder="ingrese el costo">
   </div>
 </div>
 <div class="form-group">
   <div class="col-lg-10 col-lg-offset-2">

     <button type="button"  class="btn btn-primary" onclick="Registro_doc()">Registrar</button>
   </div>
 </div>
</fieldset>
</form>
    </div>

  

  </body>
  <?php
   //incluimos el archivo footer
   include('html/overall/footer.php');
   ?>
</html>
