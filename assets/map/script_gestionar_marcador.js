$(document).ready(function(){
  var current;
  var mapa;
  var marcadores = [];
  var origen;
  var destino;

  //AJAX, OBTENER MARCADORES
  $.ajax({url: "api/api_mostrar_marcadores.php",
        type: "GET",
        async: false,
        success: function(result){
          if(result.status == 200){
            marcadores = result.data;
          }
  }});

  //BOTON ABRIR MODAL E INICIALIZACION DEL MAPA
  $(".bot_modal").click(function(event) {
    current = event.target.id;
    console.log(current);
    if (current == "bot_origen")
      $('#titulo_mapa').html('ORIGEN');
    else if (current == "bot_destino")
      $('#titulo_mapa').html('DESTINO');

    $('#modal_mapa').modal('show');
  });
  $('#modal_mapa').on('shown.bs.modal', function (e) {
    if(typeof(mapa) != "undefined"){
      //Si tengo el origen o el destino seleccionado del SELECT, lo muestro
      if (current == "bot_origen" && typeof(origen) != "undefined"){
        console.log(origen);
        mapa.addMarker({
          lat: origen.latitud,
          lng: origen.latitud,
          title: origen.nombre
        });
        mapa.setCenter(origen.latitud, origen.longitud);
      }else if (current == "bot_destino" && typeof(destino) != "undefined"){
        console.log(destino);
        mapa.addMarker({
          lat: destino.latitud,
          lng: destino.latitud,
          title: destino.nombre
        });
        mapa.setCenter(destino.latitud, destino.longitud);
      }
    }
    //SI EL MAPA NO ESTA CREADO, LO CREO
    if(typeof(mapa) == "undefined"){
      mapa = new GMaps({
        div: '#map',
        lat: -34.608322,
        lng: -58.439440,
        zoom: 11
      });
      if (current == "bot_origen" && typeof(origen) != "undefined"){
        console.log(origen);
        mapa.addMarker({
          lat: origen.latitud,
          lng: origen.longitud,
          title: origen.nombre
        });
        mapa.setCenter(origen.latitud, origen.longitud);
      }else if (current == "bot_destino" && typeof(destino) != "undefined"){
        console.log(destino);
        mapa.addMarker({
          lat: destino.latitud,
          lng: destino.longitud,
          title: destino.nombre
        });
        mapa.setCenter(destino.latitud, destino.longitud);
      }
      //EVENTO CLICK PARA INGRESAR MARCADOR
      GMaps.on('click', mapa.map, function(event) {
        mapa.removeMarkers();
        var lat = event.latLng.lat();
        var lng = event.latLng.lng();
        var marcador = {
            latitud: lat,
            longitud: lng,
            nombre: "Marcador no ingresado."
        }
        if(current == "bot_origen")
          origen = marcador;
        else
          destino = marcador;

        mapa.addMarker({
          lat: lat,
          lng: lng,
        });
      });
    }
  });

  //INGRESAR DIRECCION EN EL MODAL
  $('#direccion').keypress(function(e) {
      if(e.which == 13) {
          GMaps.geocode({
              address: $('#direccion').val(),
              callback: function(results, status) {
                  if (status == 'OK') {
                       var latlng = results[0].geometry.location;
                       latitud = latlng.lat();
                       longitud = latlng.lng();
                       mapa.setCenter(latlng.lat(), latlng.lng());
                       mapa.removeMarkers();
                       mapa.addMarker({
                          lat: latlng.lat(),
                          lng: latlng.lng()
                      });
               }
           }
           });
      }
    });

  //Evento: cada vez que se cambia el select del ORIGEN
  $( "#origen" ).change(function() {
    id = $('#origen').find(":selected").val();
    origen = buscarItem(marcadores, id);
  });
  //Evento: cada vez que se cambia el select del DESTINO
  $( "#destino" ).change(function() {
    id = $('#destino').find(":selected").val();
    destino = buscarItem(marcadores, id);
  });

});// End Onready function

function buscarItem (array, id){
  var item_devuelto;
  array.forEach(function(item) {
    if(item.id == id)
      item_devuelto = item;
  });
return item_devuelto;
}
