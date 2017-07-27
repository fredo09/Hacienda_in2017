function runlogin(e){

  //Si se presiona el ultimo boton del teclado que es Enter se accede al codigo
   if(e.keyCode == 13){
     login(); //Metodo login
   }
}

function Registro_cli(){
var connect, form, response, result, rfc, nombre,domicilio;
   //llamando al los id del formulario
   rfc=myid('rfc').value;
   nombre=myid('nombre').value;
   domicilio = myid('domicilio').value;
  if(rfc!="" && nombre!="" && domicilio!="" ){
    //console.log(monto);
    //concatenando los datos para el envio al form
      form='&rfc= '+ rfc + '&nombre= '+ nombre + '&domicilio='+ domicilio;
      console.log(form);
      //creando el objeto XMLHttpRequest
     connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

    //verificando coenxion para en ajax
     connect.onreadystatechange=function (){
        if(connect.readyState == 4 && connect.status == 200){
          if(connect.responseText == 1){

            result = '<div class="alert alert-dismissible alert-success">';
            result += '<h4>Exito!</h4>';
            result += '<p><strong>Registro exitoso...</strong></p>';
            result += '</div>';

             document.getElementById('_AJAX_').innerHTML=result;
          //     myid('_AJAX_LOGIN_').innerHTML=result;
              // location.reload();

              //window.location('ajax.php?mode=index');
          }else {
            document.getElementById('_AJAX_').innerHTML=connect.responseText;
          //  myid('_AJAX_LOGIN_').innerHTML=connect.responseText;

          }
        }else if(connect.readyState != 4){

          result = '<div class="alert alert-dismissible alert-warning">';
          result += '<button type="button" class="close" data-dismiss="alert">x</button>';
          result += '<h4>Procesando...</h4>';
          result += '<p><strong>Estamos Procesando tu registro...</strong></p>';
          result += '</div>';

            document.getElementById('_AJAX_').innerHTML=result;
          //  myid('_AJAX_LOGIN_').innerHTML=result;

          //limpiando campos
          myid('rfc').value="";
          myid('nombre').value="";
          myid('domicilio').value="";
        }
     }

        //abriendo peticion ajax
     connect.open('POST','ajax.php?mode=reg_cli',true);
     connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
     connect.send(form);
  }else{
    //Mostando el campo de error
    result ='<div class="alert alert-dismissible alert-danger" style="width: 500px;">';
    result += '<button type="button" class="close" data-dismiss="alert"><font><font>&times;</button>';
    result += '<strong>Error!</strong>Los campos no deben estar vacios';
    result += ' </div>';

    //incorporando el texto al documento html
      document.getElementById('_AJAX_').innerHTML= result;
  }

}
