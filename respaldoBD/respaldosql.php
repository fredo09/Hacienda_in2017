<?php
$server = "localhost";
$user = "root";
$password = "vertrigo";//poner tu propia contraseña, si tienes una.
$bd = "tec_hacienda";

//Fecha en la que se ralizara la base de datos
$fecha=date("Ymd-His");

//Nombre que llevara el archivo al descargar
$salida_sql=$bd.'_'.$fecha.'.sql';

//Funcion para hacer el respaldo
$dump="mysqldump -h$server -u $user -p $password --opt $bd > $salida_sql;";
//echo $dump;
//Salida
system($dump,$output);
$zip= new ZipArchive();

$salida_zip=$bd.'_'.$fecha.'.zip';

if($zip->open($salida_zip, ZipArchive::CREATE)===true){
   $zip->addFile($salida_sql);
   $zip->close();
   header("Location: '.$salida_zip.'");
}



//print "<script>window.location='?view=index';</script>";
 ?>
