//preguntamos si a la pagina ya esta lista para operar
$(document).ready(function(){
    listar_user();
    editar_user();
    eliminar_user();
  //  nuevo_cliente();
});

//nuevo metodo
var editar_user = function(){
     $("#cuadro2_user form").on("submit", function(e){
       e.preventDefault();
       var frm_u = $(this).serialize();
       $.ajax({
         method: "POST",
         url: "funciones_user.php",
         data:frm_u
       }).done( function( infor_u ){
       console.log("mi imfo "+ infor_u );
         var json_infor_user = JSON.parse(infor_u);
         mostrar_mensaje_user( json_infor_user );
        limpiar_datos_user();
        listar_user();
       });
     });
   }

   var eliminar_user = function(){
   			$("#frmEliminaruser").on("click", function(){
   				var id = $("#frmEliminaruser #id_user").val();
           console.log("mi id "+ id);
   					opcion = $("#frmEliminaruser #opcion_user_eli").val();
             console.log("mi opcion " + opcion);
          //empezando el metodo ajax
          $.ajax({
   					method:"POST",
   					url: "funciones_user.php",
   					data: {"idusuarios": id, "opcion": opcion}

   				}).done( function( inf ){
            console.log("mii "  + inf);
   					var json_inf = JSON.parse( inf );
   					mostrar_mensaje_user( json_inf );
   					limpiar_datos_user();
   					listar_user();

   				});
   			});
   		}

   //limpia los campos de texto
    var limpiar_datos_user = function(){
   $("#opcion").val("registrar");
   $("#id").val("");
   $("#user").val("").focus();
   $("#email").val("");

   }

         //funcion para mostrar el resultado
          var mostrar_mensaje_user = function(informacion ){
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
               $(".msg_usuario").html( texto ).css({"color": color });
               $(".msg_usuario").fadeOut(10000, function(){
               $(this).html("");
               $(this).fadeIn(8000);
               });


         }

//lista los datos de la tabla
var listar_user=function(){
 $("#cuadro2_user").slideUp("slow");
  $("#cuadro1_user").slideDown("slow");
  var table=$('#dt_user').DataTable({
    "destroy":true,

     //ajax
    "ajax":{
         "method":"POST",
         "url":"otros/listar_usuario.php"
    },
    //JSON
    "columns":[
      {"data":"idUsuario"},
      {"data":"usuario"},
      {"data":"Email"},
      {"defaultContent":"<button type='button' class=' editar_user btn btn-primary' style='margin:3px;'><span class='glyphicon glyphicon-pencil'></span></button><button type='button' class='btn btn-danger eliminar_user' data-toggle='modal' data-target='#modalEliminar'><span class='glyphicon glyphicon-trash'></span></button>"}
    ],
    //lenguaje
    "language": lenguaje
  });
  obtener_data_edit_user("#dt_user tbody",table);//llamando ala function
  obtener_eliminar_user("#dtc_user tbody",table);
}

//function para editar
var obtener_data_edit_user=function(tbody,table){
   $('tbody').on("click","button.editar_user",function(){
     var data=table.row( $(this).parents('tr') ).data();
         //campos a llenar en variables
     var id=$('#id').val(data.idUsuario),
         usuario=$('#user').val(data.usuario),
         email=$('#email').val(data.Email),
         opcion = $("#opcion_user").val("modificar");

      //   $('#btn_reg_cli').hide(5500);
         $("#cuadro2_user").slideDown("slow");
         $("#cuadro1_user").slideUp("slow");
   });

}

//funcion para eliminar
var obtener_eliminar_user=function(tbody,table){
   $('tbody').on("click","button.eliminar_user",function(){
     var data=table.row( $(this).parents('tr') ).data();
         //campos a llenar en variables
     var id=$('#frmEliminaruser #id_user').val(data.idUsuario);

      opcion = $("#opcion_user_eli").val("eliminar");
     });
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
