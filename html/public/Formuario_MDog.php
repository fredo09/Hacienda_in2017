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
         <h1>Edite sus Documentos</h1>
         <br>
         <p>"Formulario para editar los documentos"</p>
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
      <!--Etiqueta php-->
         <?php
             $id=$_REQUEST['id'];

            include('otros/conexion2.php');

             $query="SELECT * FROM descripcion WHERE Cv='$id';";
            // echo $query;
             $resultado=$con->query($query);
             $row=$resultado->fetch_assoc();

          ?>
      <form class="form-horizontal" style="margin: 20px;">
  <fieldset>
              <legend><strong>Modifique el archivo!</strong></legend>
              <center>
                <div class="col-md-12">
                    <!--Caja de texto en el que aparecera el resultado del registro-->
                       <div id="_AJAX_">

                        </div>
                    </div>
              </center>

<h1><?php echo $row['Cv'];?></h1>
<div class="form-group">
  <label for="inputEmail" class="col-md-2 control-label">ID</label>
  <div class="col-lg-2">
    <input type="text" class="form-control" id="codigo" value="<?php echo $row['Cv'];?>"  disabled>
  </div>
</div>
 <div class="form-group">
   <label for="inputEmail" class="col-md-2 control-label">Clave de Ingreso</label>
   <div class="col-lg-5">
     <input type="text" class="form-control" id="folio" value="<?php echo $row['Folio'];?>" placeholder="ingrese el Codigo">
   </div>
 </div>

 <div class="form-group">
   <label for="textArea" class="col-lg-2 control-label">Descripcion</label>
   <div class="col-lg-10">
     <textarea class="form-control" rows="2"  id="descrip" placeholder="ingrese el Concepto"><?php echo $row['Concepto'];?></textarea>
     <span class="help-block">Ingrese el concepto de cobro.</span>
   </div>
 </div>
 <div class="form-group col-lg-offset-4">
   <label for="inputEmail" class="col-lg-2 control-label">Tipo de cobro</label>
   <div class="col-lg-5">
     <input type="text" class="form-control" id="tcobro" value="<?php echo $row['Tcobro'];?>" placeholder="ingrese el tipo de cobro">
   </div>
 </div>

 <div class="form-group col-lg-offset-4">
   <label for="inputEmail" class="col-lg-2 control-label">Costo</label>
   <div class="col-lg-5">
     <input type="text" class="form-control" id="monto" value="<?php echo $row['Monto'];?>" placeholder="ingrese el costo">
   </div>
 </div>
 <div class="form-group">
   <div class="col-lg-10 col-lg-offset-2">

     <button type="button"  class="btn btn-primary" onclick="Modificar_doc()">Actualizar</button>
     <a href="?view=modi_dog" class="btn btn-success"> Regresar</a>
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
