<?php
$ruta="styles/img/avatar/".$_SESSION['app_id'];
if(file_exists($ruta.'.jpg')){
    $ruta="styles/img/avatar/".$_SESSION['app_id'].'.jpg';
}else if(file_exists($ruta.'.png')){
    $ruta="styles/img/avatar/".$_SESSION['app_id'].'.png';
}else if(file_exists($ruta.'.jpeg')){
    $ruta="styles/img/avatar/".$_SESSION['app_id'].'.jpeg';
}else if(file_exists($ruta.'.JPG')){
    $ruta="styles/img/avatar/".$_SESSION['app_id'].'.JPG';
}else if(file_exists($ruta.'.PNG')){
    $ruta="styles/img/avatar/".$_SESSION['app_id'].'.PNG';
}else if(file_exists($ruta.'.JPEG')){
    $ruta="styles/img/avatar/".$_SESSION['app_id'].'.JPEG';
}else if(file_exists($ruta.'.gif')){
    $ruta="styles/img/avatar/".$_SESSION['app_id'].'.gif';
}else if(file_exists($ruta.'.GIF')){
    $ruta="styles/img/avatar/".$_SESSION['app_id'].'.GIF';
}else{
    $ruta="styles/img/avatar/default.png";
}
 ?>
