<?php
$con=new Conexion();

$id=$_REQUEST['id'];

$sql="DELETE FROM  descripcion WHERE Cv='$id';";
$my=$con->query($sql);
if($con->columnas($my)==0){
  header("Location:?view=modi_dog");
}
 ?>
