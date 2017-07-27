<?php
if($_POST) {

  require('core/core.php');

  switch (isset($_GET['mode']) ? $_GET['mode'] : null) {
    case 'login':
      require('core/bin/ajax/login.php');
    break;

    case 'reg':
      require('core/bin/ajax/registro.php');
    break;

    case 'reg_dog':
      require('core/bin/ajax/registro_dog.php');
      break;

     case 'reg_cli':
       require('core/bin/ajax/Registro_cli.php');
      break;

     case 'Mod_dog':
         require('core/bin/ajax/Modigicar_dog.php');
     break;
    default:
      header('location: index.php');
    break;
  }
} else {
  header('location: index.php');
}
