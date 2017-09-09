  $(document).ready(function(){
    	var mapa;
      var marcadores = [];

      //Obtener marcadores
         function obtenerMarcadores(){
          $('#selectMarcadores').find('option').remove();
          $.getJSON( "scripts/marcadores.json", function( data ) {
            $.each(data, function(key,val) {
              console.log("asd");
              var marcador = {
                  id:val["id"],
                  latitud:val["latitud"],
                  longitud:val["longitud"],
                  nombre: val["nombre"]
              }
              marcadores.push(marcador);
              $("#selectMarcadores").append("<option value="+marcador.id+">"+marcador.nombre+"</option>");
            });
        
          }); 
        }

      obtenerMarcadores();

    	var markerOrigen ={
          latitud: 0,
          longitud:0,
          title: "Origen"
      }

      var markerDestino ={
        latitud:0,
        longitud:0,
        title: "Destino"
    }
    mapa = new GMaps({
       div: '#map',
       lat: -12.043333,
       lng: -77.028333
   });


    			//ORIGEN
    			$('#botonOrigen').click(function()	{
                  mapa.removeMarkers();
                  GMaps.geocode({
                     address: $('#addressOrigen').val(),
                     callback: function(results, status) {
                       if (status == 'OK') {
                         var latlng = results[0].geometry.location;
                         markerOrigen.latitud = latlng.lat();
                         markerOrigen.longitud = latlng.lng();
                         mapa.setCenter(latlng.lat(), latlng.lng());
                         mapa.addMarker({
                            lat: markerOrigen.latitud,
                            lng: markerOrigen.longitud
                        });
                         if(markerDestino.latitud !=0 && markerDestino.longitud !=0){
                            console.log ("true");
                            mapa.addMarker({
                               lat: markerDestino.latitud,
                               lng: markerDestino.longitud
                           });
                        }

                    }
                }
            });
              });

    			//DESTINO
    			$('#botonDestino').click(function(){
    				mapa.removeMarkers();
                  GMaps.geocode({
                     address: $('#addressDestino').val(),
                     callback: function(results, status) {
                       if (status == 'OK') {
                         var latlng = results[0].geometry.location;
                         markerDestino.latitud = latlng.lat();
                         markerDestino.longitud = latlng.lng();
                         mapa.setCenter(latlng.lat(), latlng.lng());
                         mapa.addMarker({
                           lat: markerDestino.latitud,
                           lng: markerDestino.longitud
                       });
                         if (markerOrigen.latitud != 0 && markerOrigen.longitud !=0){
                            console.log ("true");
                            mapa.addMarker({
                               lat: markerOrigen.latitud,
                               lng: markerOrigen.longitud
                           });
                        }
                    }
                }
            });
              });

    			//CALCULAR RUTA
    			$('#calcularRuta').click(function(){
    				mapa.drawRoute({
                      origin: [markerOrigen.latitud, markerOrigen.longitud],
                      destination: [markerDestino.latitud, markerDestino.longitud],
                      travelMode: 'driving',
                      strokeColor: '#131540',
                      strokeOpacity: 0.6,
                      strokeWeight: 6
                  });
    				mapa.getRoutes({
    					origin: [markerOrigen.latitud, markerOrigen.longitud],
    					destination: [markerDestino.latitud, markerDestino.longitud],
    					callback: function (e) {
    						var time = 0;
    						var distance = 0;
    						for (var i=0; i<e[0].legs.length; i++) {
    							time += e[0].legs[i].duration.value;
    							distance += e[0].legs[i].distance.value;
    						}
    						alert("TIEMPO: "+time + " - DISTANCIA: " + distance);
    					}
    				});
    			});

          
    			//EVENTO INGRESAR MARCADOR
    			document.getElementById("botIngresarMarcador").disabled = true;
          $('#botIngresarMarcador').addClass('disabled');
    			var latitud;
    			var longitud;
          var nombre;
    			$('#direccion').bind("enterKey",function(e){
    				document.getElementById("botIngresarMarcador").disabled = false;
            $('#botIngresarMarcador').removeClass('disabled');
                  GMaps.geocode({
                     address: $('#direccion').val(),
                     callback: function(results, status) {
                       if (status == 'OK') {
                         var latlng = results[0].geometry.location;
                         latitud = latlng.lat();
                         longitud = latlng.lng();
                         mapa.setCenter(latlng.lat(), latlng.lng());
                         mapa.addMarker({
                            lat: latlng.lat(),
                            lng: latlng.lng()
                        });
                     }
                 }
             });
          });

    			$('#direccion').keyup(function(e){
                 if(e.keyCode == 13)
                 {
                     $(this).trigger("enterKey");
                 }
             });

    			$('#botIngresarMarcador').click(function(){
            document.getElementById("botIngresarMarcador").disabled = true;
            $('#botIngresarMarcador').addClass('disabled');
             if(document.getElementById('nombre').value != ""){
                nombre = document.getElementById('nombre').value;
                var marcador = {
                   latitud:latitud,
                   longitud:longitud,
                   nombre:nombre
               }
               //var jsonString = JSON.stringify(marcadores);


               var request = new XMLHttpRequest();
               request.open('POST', 'scripts/ingresar_marcador.php', true);
               request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
               request.onload = function() {
                   if (request.status >= 200 && request.status < 400) {
                     
                       obj = JSON.parse(request.responseText);
                       
                       // if(obj["action"] == "ingresar_marcador"){
                       //  var marcador = {
                       //     id:obj["id"],
                       //     latitud:obj["latitud"],
                       //     longitud:obj["longitud"],
                       //     nombre: obj["nombre"]
                       // }
                       // marcadores.push(marcador);
                       console.log(obj);
                 } else {
		          // We reached our target server, but it returned an error
		          console.error("Algo salio mal");
             }
         };

         request.send("latitud="+latitud+"&longitud="+longitud+"&nombre="+nombre);
           }

           obtenerMarcadores();
       });
  });// End Onready function