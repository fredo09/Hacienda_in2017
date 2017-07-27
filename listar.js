//pregunta cuando el documento este listo
$(document).ready(function(){
   listar();
   editar();
   eliminar();
});

//Lista despues de hacer alguna modificacion en documentos al presionar el boton de listar
var listar_otro=function(){
  $('#btn_listar').on('click', function(){
    listar();
  });
}

//nuevo metodo
var editar = function(){
     $("#cuadro2 #myfrm").on("submit", function(e){
       e.preventDefault();
       var frm = $(this).serialize();
       $.ajax({
         method: "GET",
         url: "funciones_D.php",
         data: frm
       }).done( function( info ){
       console.log("mi imfo "+ info );
         var json_info = JSON.parse(info);
         mostrar_mensaje_doc( json_info );
         limpiar_datos();
         listar();
       });
     });
   }

//limpia los campos de texto
 var limpiar_datos = function(){
$("#opcion").val("registrar");
$("#id").val("");
$("#folio").val("").focus();
$("#descrip").val("");
$("#tcobro").val("");
$("#monto").val("");
}

var eliminar = function(){
			$("#eliminar-usuario").on("click", function(){
				var id = $("#frmEliminardoc #id-eli").val();
        console.log("mi id "+ id);
					opcion = $("#frmEliminardoc #opcion-elim").val();
          console.log("mi opcion " + opcion);
				$.ajax({
					method:"GET",
					url: "funciones_D.php",
					data: {"idusuario": id, "opcion": opcion}

				}).done( function( inf ){
					var json_inf = JSON.parse( inf );
					mostrar_mensaje( json_inf );
					limpiar_datos();
					listar();

				});
			});
		}

//funcion para mostrar el resultado
 var mostrar_mensaje_doc = function(informacion ){
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
      $(".mensaje").html( texto ).css({"color": color });
      $(".mensaje").fadeOut(10000, function(){
      $(this).html("");
      $(this).fadeIn(6000);
      });


}


 //lista los datos de la tabla
 var listar=function(){
   $("#cuadro2").slideUp("slow");
	 $("#cuadro1").slideDown("slow");
   var table=$('#dt').DataTable({
     "destroy":true,

      //ajax
     "ajax":{
          "method":"POST",
          "url":"otros/listar.php"
     },
     //JSON
     "columns":[
       {"data":"idDocumento"},
       {"data":"Folio"},
       {"data":"Concepto"},
       {"data":"Tcobro"},
       {"data":"Monto"},
       {"defaultContent":"<button type='button' class=' editar btn btn-primary' style='margin:3px;'><span class='glyphicon glyphicon-pencil'></span></button><button type='button' class='btn btn-danger eliminar-doc' data-toggle='modal' data-target='#modalEliminar'><span class='glyphicon glyphicon-trash'></span></button>"}
     ]

   });
   obtener_data_edit("#dt tbody",table);//llamando ala function
   obtener_eliminar("#dt tbody",table);
 }
 //function para editar
 var obtener_data_edit=function(tbody,table){
    $('tbody').on("click","button.editar",function(){
      var data=table.row( $(this).parents('tr') ).data();
          //campos a llenar en variables
      var id=$('#id').val(data.idDocumento),
          Folio=$('#folio').val(data.Folio),
          Concepto=$('#descrip').val(data.Concepto),
          Tcobro=$('#tcobro').val(data.Tcobro),
          Monto=$('#monto').val(data.Monto);
          opcion = $("#opcion").val("modificar");

          $("#cuadro2").slideDown("slow");
         	$("#cuadro1").slideUp("slow");
    });

 }
 //funcion para eliminar
 var obtener_eliminar=function(tbody,table){
    $('tbody').on("click","button.eliminar-doc",function(){
      var data=table.row( $(this).parents('tr') ).data();
          //campos a llenar en variables
      var id=$('#frmEliminardoc #id-eli').val(data.idDocumento);

    //  opcion = $("#opcion-elim").val("eliminar");
      });
 }
 var limpiar_datos = function(){
			$("#opcion").val("registrar");
			$("#id").val("");
			$("#folio").val("").focus();
			$("#descrip").val("");
			$("#tcobro").val("");
      $("#monto").val("");
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
