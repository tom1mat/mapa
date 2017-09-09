$(document).ready(function(){
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
});// End Onready function