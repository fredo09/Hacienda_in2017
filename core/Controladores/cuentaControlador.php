<?php
//verifica si hay sesion iniciada
if(isset($_SESSION['app_id'])){
//si ya se ha echo un envio por metodo post
  if($_POST){
        //Codigo a ejecutar
        if(!empty($_POST['user']) && !empty($_POST['email'])){

        }

  }else{
        include('core/bin/Funciones/imgs.php');
        include('html/public/cuenta.php');//llama a la vista cuenta
  }
}else{
  header('location:?view=index');//redirecciona a index
}


 ?>
