$(document).ready(function(){
    var ingresar_direccion = false;
    mapa = new GMaps({
       div: '#map',
       lat: -34.608322,
       lng: -58.439440,
       zoom: 11
   });
    document.getElementById("bot_submit").disabled = true;
    $('#direccion').keypress(function(e) {
        if(e.which == 13) {
            $('#botIngresarMarcador').removeClass('disabled');
            GMaps.geocode({
                address: $('#direccion').val(),
                callback: function(results, status) {
                    if (status == 'OK') {
                         $("body").stop().animate({scrollTop:150}, 1000, 'swing');
                         document.getElementById("bot_submit").disabled = false;
                         var latlng = results[0].geometry.location;
                         latitud = latlng.lat();
                         longitud = latlng.lng();
                         $("#latitud").val(latitud);
                         $("#longitud").val(longitud);
                         mapa.setCenter(latlng.lat(), latlng.lng());
                         mapa.addMarker({
                            lat: latlng.lat(),
                            lng: latlng.lng()
                        });
                 }
             }
             });
        }
      });
     $("#form_ingresar").submit(function(event) {
        event.preventDefault();
        if ($("#register-username").val() == ""){
            swal(
              '',
              'Ingrese un nombre',
              'warning'
            );
            return;
        }
        if ($("#tipo option:selected").val() != "proveedor" && $("#tipo option:selected").val() != "cliente"){
            swal(
              '',
              'Seleccione el tipo',
              'warning'
            );
            return;
        }
        //AJAX, OBTENER MARCADORES
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
        $.ajax({url: "api/api_insertar_marcador.php",
            type: "POST",
            data: datos,
            success: function(result){
              if(result.status == 200){
                    swal(
                  '',
                  'Marcador ingresado',
                  'success'
                );
              }else if(result.status == 400){
                swal(
                  'Error',
                  'No se pudo editar el marcador',
                  'error'
                );
              }
        }});
    });
});// End Onready function