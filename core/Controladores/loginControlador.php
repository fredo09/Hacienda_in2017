<?php
if(!isset($_SESSION['app_id'])){
    include('html/public/login.php');

}else{
    header('Location:?view=index');
  }



 ?>
