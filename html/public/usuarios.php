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

  <div class="container jumbotron">
      <h1>Usuarios</h1>
  </div>
  <div class="col-sm-offset-2 col-sm-8">
     <p class="msg_usuario"></p>
   </div>

  <?php
    if(isset($_SESSION['app_id'])){
      echo '<div class="container" id="cuadro1_user">
        <table id="dt_user" class="table table-bordered table-hover" cellspacing="0" width="100%">
         <thead>
           <tr>
             <th>ID</th>
             <th>Nombre</th>
             <th>Email</th>
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

   <!--Formulario de modificacion-->
   <div class="container " id="cuadro2_user">
     <form class="form-horizontal" action="" method="POST">
    <div class="form-group">
      <h3 class="col-sm-offset-2 col-sm-8 text-center"> Edite el Usuario</h3>
    </div>
    <input type="hidden" id="id" name="idusuarios" value="0">
    <input type="hidden" id="opcion_user" name="opcion" value="modificar">
    <div class="form-group">
      <label for="nombre" class="col-sm-2 control-label">Usuario</label>
      <div class="col-sm-8">
        <input id="user" name="name" type="text" class="form-control"  autofocus>
      </div>
    </div>

    <div class="form-group">
      <label for="apellidos" class="col-sm-2 control-label">email</label>
      <div class="col-sm-8">
        <input id="email" name="email" type="email" class="form-control" >
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-8">
        <input id="" type="submit" class="btn btn-primary" value="Editar">
        <input id="btn_listar" type="button" class="btn btn-primary" value="Listar">
      </div>
    </div>
  </form>
   </div>

   <!--Empieza el modal de eliminacion-->
<div class="form_u">
<form id="frmEliminaruser" action="" method="POST">
<input type="hidden" id="id_user" name="idusuarios" value="">
<input type="hidden" id="opcion_user_eli" name="opcion" value="eliminar">
<!-- Modal -->
<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="modalEliminarLabel">Eliminar Cliente</h4>
</div>
<div class="modal-body">
¿Está seguro de eliminar al Usuario?<strong data-name=""></strong>
</div>
<div class="modal-footer">
<button type="button" id="eliminar-user" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
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
