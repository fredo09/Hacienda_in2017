//preguntamos si a la pagina ya esta lista para operar
$(document).ready(function(){
    mylistar();
    editar_Cli();
    eliminar_Cli();
    nuevo_cliente();
    listar_nuevo_cliente();
});

//metodo para listar despues de agregar un nuevo Cliente
var listar_nuevo_cliente=function(){
    $('#btn_listar').on('click', function(){
      $("#cuadro2_cli").slideUp("slow");
      $("#cuadro1_cli").slideDown("slow");
  });
}


//nuevo metodo
var editar_Cli = function(){
     $("#cuadro2_cli").on("submit", function(e){
       e.preventDefault();
       var frm = $(this).serialize();
       $.ajax({
         method: "GET",
         url: "funciones_cli.php",
         data: frm
       }).done( function( infor ){
       console.log("mi imfo "+ infor );
         var json_infor = JSON.parse(infor);
         mostrar_mensaje_Cli( json_infor );
         limpiar_datos_cli();
         mylistar();
       });
     });
   }

   var eliminar_Cli = function(){
   			$("#eliminar-cli").on("click", function(){
   				var id = $("#frmEliminarCliente #id_cliem").val();
            console.log("mi id "+ id);
   					opcion = $("#frmEliminarCliente #opcion_cli").val();
             console.log("mi opcion " + opcion);
   				$.ajax({
   					method:"GET",
   					url: "funciones_cli.php",
   					data: {"idcliente": id, "opcion": opcion}

   				}).done( function( inf ){
   					var json_inf = JSON.parse( inf );
   					mostrar_mensaje_Cli( json_inf );
   					limpiar_datos_cli();
   					mylistar();

   				});
   			});
   		}



      //funcion para mostrar el resultado
       var mostrar_mensaje_Cli = function(informacion ){
         console.log(informacion);
           var texto = "", color = "";
           if( informacion.mensaje== "BIEN" ){
                texto = "<strong>Bien!</strong> Se han guardado los cambios correctamente.";
                color = "#379911";
           }else if( informacion.mensaje == "ERROR"){
               texto = "<strong>Error</strong>, no se ejecutó la correctamente.";
               color = "#C9302C";
           }else if( informacion.mensaje == "EXISTE" ){
               texto = "<strong>Información!</strong> el documento ya existe.";
               color = "#5b94c5";
           }else if( informacion.mensaje == "VACIO" ){
                 texto = "<strong>Advertencia!</strong> debe llenar todos los campos solicitados.";
                  color = "#ddb11d";
      //muestra el resultado
      }
            $("#_AJAX_").html( texto ).css({"color": color });
            $("#_AJAX_").fadeOut(10000, function(){
            $(this).html("");
            $(this).fadeIn(8000);
            });


      }

//lista los datos de la tabla
var mylistar=function(){
  $("#cuadro2_cli").slideUp("slow");
  $("#cuadro1_cli").slideDown("slow");
  var table=$('#dtc').DataTable({
    "destroy":true,

     //ajax
    "ajax":{
         "method":"POST",
         "url":"otros/listar_cli.php"
    },
    //JSON
    "columns":[
      {"data":"idCliente"},
      {"data":"RFC"},
      {"data":"Direccion"},
      {"data":"Nombre"},
      {"defaultContent":"<button type='button' class=' editar_cli btn btn-primary' style='margin:3px;'><span class='glyphicon glyphicon-pencil'></span></button><button type='button' class='btn btn-danger eliminar' data-toggle='modal' data-target='#modalEliminar'><span class='glyphicon glyphicon-trash'></span></button>"}
    ],
    //lenguaje
    "language": lenguaje



  });
  obtener_data_edit_cli("#dtc tbody",table);//llamando ala function
  obtener_eliminar_cli("#dtc tbody",table);
}

var nuevo_cliente =function(){
  $('#btn_nuevo_cli').on("click",function(){
    limpiar_datos_cli();
    $('#edit_cli').hide(5500);
    $("#cuadro2_cli").slideDown("slow");
    $("#cuadro1_cli").slideUp("slow");
    $('#btn_reg_cli').show(5500);
  });

}

//function para editar
var obtener_data_edit_cli=function(tbody,table){
   $('tbody').on("click","button.editar_cli",function(){
     var data=table.row( $(this).parents('tr') ).data();
         //campos a llenar en variables
     var id=$('#idcliente').val(data.idCliente),
         rfc=$('#rfc').val(data.RFC),
         nombre=$('#nombre').val(data.Direccion),
         domicilio=$('#domicilio').val(data.Nombre),
         opcion = $("#opciones_cli").val("modificar");

         $('#btn_reg_cli').hide(5500);
         $("#cuadro2_cli").slideDown("slow");
         $("#cuadro1_cli").slideUp("slow");
   });

}

//funcion para eliminar
var obtener_eliminar_cli=function(tbody,table){
   $('tbody').on("click","button.eliminar",function(){
     var data=table.row( $(this).parents('tr') ).data();
         //campos a llenar en variables
     var id=$('#frmEliminarCliente #id_cliem').val(data.idCliente);
         opcion = $("#opcion_cli").val("eliminar");
     });
}


var limpiar_datos_cli = function(){
     $("#opcion").val("registrar");
     $("#idcliente").val("");
     $("#rfc").val("").focus();
     $("#nombre").val("");
     $("#domicilio").val("");

   }



//obtiene el idioma español
 var lenguaje ={
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }

}
