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
    activarCampos();
    id_editar = $('#marcadores').find(":selected").val();
    marcadores.forEach(function(item) {
      if(item.id == id_editar){
        $("#register-username").val(item.nombre);
        $("#direccion").val(item.direccion);
        $("#tipo").val(item.tipo);
        $("#mail").val(item.mail);
        $("#cuit").val(item.cuit);
        $("#condicion_afip").val(item.condicion_afip);
        $("#nombre_contacto").val(item.nombre_contacto);
        $("#actividad_comercial").val(item.actividad_comercial);
        $("#telefono").val(item.telefono);
        $("#latitud").val(item.latitud);
        $("#longitud").val(item.longitud);
      }
    });
  });

  //Bot editar
  $("#bot_editar").click(function(ev){
    ev.preventDefault();
    console.log(validarCampos());
    if (validarCampos() != ""){


    var datos;
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
        async: false,
        data: datos,
        success: function(result){
            if (result.status == 200){
                swal(
                  '',
                  'ÅMarcador editado',
                  'success'
                );
                setInterval(function(){ location.reload(); }, 1000);
            }else{
                swal(
                  'Error',
                  'No se pudo editar el marcador',
                  'error'
                );
            }
            
     }});
    }else{
      swal({html: 'No se edit&oacute ning&uacuten campo'});
    }
  });

  //Eliminar marcador
	$("#bot_eliminar").click(function(ev){
	    ev.preventDefault();
		swal({
		  title: 'øEstas seguro?',
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  cancelButtonText: 'Cancelar',
		  confirmButtonText: 'Si'
		}).then(function () {
		  	$.ajax({url: "api/api_eliminar_marcador.php",
	    		type: "POST",
	    		async: false,
				data: "id_eliminar="+id_editar,
	    		success: function(result){
	    			if(result.status==200){
	    				location.reload();
	    			}
    		}});
		});
	});

function activarCampos (){
  $('#bot_editar').prop('disabled', false);
  $('#bot_eliminar').prop('disabled', false);
  $("#register-username").prop('disabled', false);
  $("#direccion").prop('disabled', false);
  $("#tipo").prop('disabled', false);
  $("#mail").prop('disabled', false);
  $("#cuit").prop('disabled', false);
  $("#condicion_afip").prop('disabled', false);
  $("#nombre_contacto").prop('disabled', false);
  $("#actividad_comercial").prop('disabled', false);
  $("#telefono").prop('disabled', false);
}
function validarCampos (){
  var bool = "";
  marcadores.forEach(function(item) {
      if(item.id == id_editar){
        if(item.nombre != $("#register-username").val())
          bool+="nombre";//bool = true;

        if(item.direccion != $("#direccion").val())
          bool+="direcc";//bool = true;
        
        if(item.tipo != $("#tipo").val())
          bool+="tipo";//bool = true;

        if(item.mail != $("#mail").val())
          bool+="mail";//bool = true;
        
        if(item.cuit != $("#cuit").val())
          bool+="cuit";//bool = true;

        if(item.condicion_afip != $("#condicion_afip").val() && $("#condicion_afip").val() != null)
          bool+="condic_afip";//bool = true;
        
        if(item.nombre_contacto != $("#nombre_contacto").val())
          bool+="nombre_contact";//bool = true;

        if(item.actividad_comercial != $("#actividad_comercial").val())
          bool+="activ_com";//bool = true;

        if(item.telefono != $("#telefono").val())
          bool+="telefo";//bool = true;

        if(item.latitud != $("#latitud").val())
          bool+="latitud";//bool = true;

        if(item.longitud != $("#longitud").val())
          bool+="long";//bool = true;
      }
    });
  return bool;
}  
});// End Onready function


/*
 if ($("#register-username").val() != "")
      datos["nombre"] = $("#register-username").val();

    if ($("#direccion").val() != "")
      datos["direccion"] = $("#direccion").val();

    if ($("#tipo").val() != "")
      datos["tipo"] = $("#tipo").val();

    if ($("#mail").val() != "")
      datos["mail"] = $("#mail").val();

    if ($("#cuit").val() != "")
      datos["cuit"] = $("#cuit").val();

    if ($("#condicion_afip").val() != "")
      datos["condicion_afip"] = $("#condicion_afip").val();

    if ($("#nombre_contacto").val() != "")
      datos["nombre_contacto"] = $("#nombre_contacto").val();

    if ($("#actividad_comercial").val() != "")
      datos["actividad_comercial"] = $("#actividad_comercial").val();

    if ($("#telefono").val() != "")
      datos["telefono"] = $("#telefono").val();

    if ($("#latitud").val() != "")
      datos["latitud"] = $("#latitud").val();

    if ($("#longitud").val() != "")
      datos["longitud"] = $("#longitud").val();
    */