$(document).ready(function(){
  var marcadores = [];
  var id_editar;
  $.ajax({url: "api/api_mostrar_marcadores.php",
        type: "GET",
        async: false,
        success: function(result){
          if(result.status == 200){
            marcadores = result.data;
          }
  }});

  //Evento: cada vez que se cambia el select de los marcadores
  $( "#marcadores" ).change(function() {
    id_editar = $('#marcadores').find(":selected").val();
    marcadores.forEach(function(item) {
      if(item.id == id_editar){
        $("#register-username").val(item.nombre);
        $("#direccion").val(item.direccion);
        $("#tipo").val(item.tipo);
        $("#mail").val(item.mail);
        $("#cuit").val(item.cuit),
        $("#condicion_afip").val(item.condicion_afip);
        $("#nombre_contacto").val(item.nombre_contacto);
        $("#actividad_comercial").val(item.actividad_comercial);
        $("#telefono").val(item.telefono);
        $("#latitud").val(item.latitud);
        $("#longitud").val(item.longitud);
      }
    });
  });
  //Submit del formulario
  $("#form_editar_marcador").submit(function(event){
    event.preventDefault();
    datos = {
        nombre: $("#register-username").val(),
        direccion: $("#direccion").val(),
        tipo: $("#tipo").val(),
        mail: $("#mail").val(),
        cuit: $("#cuit").val(),
        condicion_afip: $("#condicion_afip").val(),
        nombre_contacto: $("#nombre_contacto").val(),
        actividad_comercial: $("#actividad_comercial").val(),
        telefono: $("#telefono").val(),
        latitud: $("#latitud").val(),
        longitud: $("#longitud").val()
    }
    $.ajax({url: "api/api_editar_marcador.php?id_editar="+id_editar,
        type: "POST",
        data: datos,
        success: function(result){
          console.log(result.status);
  }});
  });

  //EDITADO OK, FALTA ACTUALIZAR LA PAGINA
  
});// End Onready function