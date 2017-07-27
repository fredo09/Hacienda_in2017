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
  <div class="container">
        <div class="row">
          <div class="col-sm-3 col-md-2 sidebar">

          </div>
          <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h2 class="sub-header">Configuración de tu cuenta</h2>
              <!--<div class="alert alert-success" role="alert">...</div>
              <div class="alert alert-info" role="alert">...</div>
              <div class="alert alert-warning" role="alert">...</div>
              <div class="alert alert-danger" role="alert">...</div>-->
            <div class="form-signin">
              <form action="?view=cuenta" method="POST" enctype="multipart/form-data"><!-- Explicar -->
              <label>Nombre de Usuario <span style="color: #FF0000">*</span></label>
              <input style="margin-bottom: 10px;" type="text" class="form-control" name="user" placeholder="Tu nombre de usuario" required=""
              value="<?php echo $user[$_SESSION['app_id']]['usuario']; ?>" />

               <label>Email <span style="color: #FF0000">*</span></label>
              <input style="margin-bottom: 10px;" type="email" class="form-control" name="email" placeholder="Tu correo electrónico" required=""
              value="<?php echo $user[$_SESSION['app_id']]['Email']; ?>" />

<!--
              <label>Fecha de Nacimiento</label>
              <div class="input-group date">
              <input type="text" id="nacimiento" data-date="01-01-2015" data-date-format="dd-mm-yyyy" class="form-control" name="fecha" placeholder="dd-mm-yyyy" aria-describedby="basic-addon2" value="" readonly="">
              <span class="input-group-addon add-on glyphicon glyphicon-calendar" id="basic-addon2"></span>
              </div>
-->
<!--
              <label>Nombre</label>
              <input style="margin-bottom: 10px;" type="text" class="form-control" name="names" placeholder="Tus nombres"
              value="<?php echo $user[$_SESSION['app_id']]['Nombre']; ?>" />

               <label>Apellidos</label>
              <input style="margin-bottom: 10px;" type="text" class="form-control" name="lastnames" placeholder="Tus apellidos"
              value="<?php echo $user[$_SESSION['app_id']]['Apellido']; ?>" />
            -->

             <div class="media">
                <div class="media-left">
                  <img class="media-object" src="<?php echo $rutas ?>" width="70" height="70" />
                </div>
                <div class="media-body">

                  <label>Nueva foto de Perfil</label>
                  <input style="margin-bottom: 10px;" type="file" name="foto" class="form-control" />
                </div>
              </div>

              <center><input class="btn btn-primary" type="submit" value="Guardar" style="width: 120px;" /></center>
                </form>
            </div>
          </div>
        </div>
           </div>

      <script type="text/js">
      $('form #nacimiento').datepicker('place');

      </script>
    </body>
<?php
     //incluimos el archivo footer
     include('html/overall/footer.php');
     ?>
  </html>
