//se ejecuta cunado el documento este listo
$('document').ready(function(){
  //llmndo ala id
$('#bus').autocomplete({
  source: "buscar_Clientes.php"
});
});
