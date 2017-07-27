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
         <h1>Secretaria de Hacienda</h1>
         <br>
         <p>"Sistema ingresos"</p>
      </div>
    </div>

    <center>

           <div id="_AJAX_LOGIN_" class="container">

               </div>

      <form class="form-signin "style="width: 500px;" >
          <h2 class="form-signin-heading">Inicia Sesion</h2>
          <div class="col-md-12">
            <label for="inputEmail"  class="sr-only">Usuario</label>
            <input type="text"  id="user" class="form-control" placeholder="Introduce usuario" required="" autofocus="">
          </div>
          <div class="col-md-12">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="pass" class="form-control" placeholder="Introduce Password" required="">
          </div>

          <div class="checkbox">
            <label>
              <input type="checkbox" value="1" id="sesion"> Matenener session
            </label>
          </div>
            <button class="btn btn-block btn-primary " id="btni" type="button"  onclick="login()" >Iniciar Sesion</button>
        </form>


    </center>



  </head>
  </body>
  <?php
   //incluimos el archivo footer
   include('html/overall/footer.php');
   ?>
</html>
