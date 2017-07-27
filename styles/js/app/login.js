function runlogin(e){

  //Si se presiona el ultimo boton del teclado que es Enter se accede al codigo
   if(e.keyCode == 13){
     login(); //Metodo login
   }
}

function login(){
var connect, form, response, result, user, pass, sesion;
   //llamando al los id del formulario
   user=myid('user').value;
   pass=myid('pass').value;
   sesion = myid('sesion').checked ? true : false;
  if(user!="" && pass!=""){

    //concatenando los datos para el envio al form
      form='&user= '+ user + '&pass= '+ pass + '&sesion='+ sesion;
     connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

     connect.onreadystatechange=function (){
        if(connect.readyState == 4 && connect.status == 200){
          if(connect.responseText == 1){

            result = '<div class="alert alert-dismissible alert-success">';
            result += '<h4>Conectado!</h4>';
            result += '<p><strong>Estamos redireccionandote...</strong></p>';
            result += '</div>';

             document.getElementById('_AJAX_LOGIN_').innerHTML=result;
          //     myid('_AJAX_LOGIN_').innerHTML=result;
              location.href="ajax.php?mode=index";
              //window.location('ajax.php?mode=index');
          }else {
            document.getElementById('_AJAX_LOGIN_').innerHTML=connect.responseText;
          //  myid('_AJAX_LOGIN_').innerHTML=connect.responseText;

          }
        }else if(connect.readyState != 4){

          result = '<div class="alert alert-dismissible alert-warning">';
          result += '<button type="button" class="close" data-dismiss="alert">x</button>';
          result += '<h4>Procesando...</h4>';
          result += '<p><strong>Estamos intentando logearte....</strong></p>';
          result += '</div>';

            document.getElementById('_AJAX_LOGIN_').innerHTML=result;
          //  myid('_AJAX_LOGIN_').innerHTML=result;
        }
     }

        //abriendo peticion ajax
     connect.open('POST','ajax.php?mode=login',true);
     connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
     connect.send(form);
  }else{
    //Mostando el campo de error
    result ='<div class="alert alert-dismissible alert-danger" style="width: 500px;">';
    result += '<button type="button" class="close" data-dismiss="alert"><font><font>&times;</button>';
    result += '<strong>Error!</strong>Los campos no deben estar vacios';
    result += ' </div>';

    //incorporando el texto al documento html
      document.getElementById('_AJAX_LOGIN_').innerHTML= result;
  }

}
