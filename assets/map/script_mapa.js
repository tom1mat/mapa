$(document).ready(function(){

	//Guardo la seccion que esta en GET en una variable
	var seccion = getParameterByName("seccion");

	if (seccion == "mapa"){
		$("body").stop().animate({scrollTop:150}, 1000, 'swing');
	}else if (seccion = "ingresar_marcador"){
		$("body").stop().animate({scrollTop:650}, 1000, 'swing');
	}else if(seccion = "eliminar_marcador"){
		$("body").stop().animate({scrollTop:650}, 1000, 'swing');
	}

	$("body").stop().animate({scrollTop:500}, 1000, 'swing');
	var marcadores = [];
	$.ajax({url: "api/api_mostrar_marcadores.php",
    		type: "GET",
    		async: false,
    		success: function(result){
    			if(result.status == 200){
    				marcadores = result.data;
    			}
    }});

	var mapa;
	mapa = new GMaps({
	   div: '#map',
	   lat: -34.608322,
	   lng: -58.439440,
	   zoom: 11
	});

	marcadores.forEach(function(marcador) {
		mapa.addMarker({
			title: marcador.nombre,
            lat: marcador.latitud,
            lng: marcador.longitud
        });
	});

});// End Onready function

function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}
