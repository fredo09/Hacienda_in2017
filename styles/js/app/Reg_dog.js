function runlogin(e){

  //Si se presiona el ultimo boton del teclado que es Enter se accede al codigo
   if(e.keyCode == 13){
     login(); //Metodo login
   }
}

function Registro_doc(){
var connect, form, response, result, codigo, descrip, tcobro,costo;
   //llamando al los id del formulario
   codigo=myid('codigo').value;
   descrip=myid('descrip').value;
   tcobro = myid('tcobro').value;
   monto = myid('monto').value;
  if(codigo!="" && descrip!="" && tcobro!="" && monto!=""){
    console.log(monto);
    //concatenando los datos para el envio al form
      form='&codigo= '+ codigo + '&descrip= '+ descrip + '&tcobro='+ tcobro + '&monto='+ monto;
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
        }
     }

        //abriendo peticion ajax
     connect.open('POST','ajax.php?mode=reg_dog',true);
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
