
function Modificar_doc(){
var connect, form, response, result, codigo, descrip, tcobro,costo;
var cv;
   //llamando al los id del formulario
   cv=myid('codigo').value;
   console.log(cv);
   codigo=myid('folio').value;
   descrip=myid('descrip').value;
   tcobro = myid('tcobro').value;
   monto = myid('monto').value;

        //concatenando los datos para el envio al form
      form='&codigo='+ cv +'&folio= '+ codigo + '&descrip= '+ descrip + '&tcobro='+ tcobro + '&monto='+ monto;
      console.log(form);
      //creando el objeto XMLHttpRequest
     connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

    //verificando coenxion para en ajax
     connect.onreadystatechange=function (){
        if(connect.readyState == 4 && connect.status == 200){
          if(connect.responseText == 1){

            result = '<div class="alert alert-dismissible alert-success">';
            result += '<h4>Exito!</h4>';
            result += '<p><strong>Actualizacion exitosa...</strong></p>';
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
          result += '<p><strong>Estamos Procesando la Actualizacion...</strong></p>';
          result += '</div>';

            document.getElementById('_AJAX_').innerHTML=result;
          //  myid('_AJAX_LOGIN_').innerHTML=result;
        }
     }

        //abriendo peticion ajax
     connect.open('POST','ajax.php?mode=Mod_dog',true);
     connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
     connect.send(form);


}
