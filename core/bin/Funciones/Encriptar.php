<?php

//Funcion que encripta el string que recibe
function Encriptar($string){
  //Longitud de la cadena
  $log=strlen($string)-1;
  $str='';

  //for que recorre la cadena
  for($x=$log;$x>=0; $x--){
    //if conpacta que revisa si hay par y encripte y si no lo deje como tal
     $str .= $string[$x];
    }
    $str=md5($str);
    return $str;//retorno de valor
}
