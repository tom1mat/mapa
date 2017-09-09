$(document).ready(function(){
	mapa = new GMaps({
        div: '#map',
        lat: -34.608322,
        lng: -58.439440,
        zoom: 11
    });
	// Hacer que los campos se vuelvan editables al hacer click
	$("body").click(function(ev){
		var target = ev.target;
		if ($(target).attr('class') == "editable"){
			$(".boton_edit").prop("disabled",true);
			var valor = $(ev.target).text();
			$(target).focus();
			$(target).replaceWith(function(){
			    return $('<input class="editandose" value="'+valor+'" />', {html: $(this).html()});
			});
		}else if ($(target).attr('class') != "editandose"){
			$('.editandose').each(function() {
				$(".boton_edit").prop("disabled",false);
				if($(this).val() != ""){
	    			$(this).replaceWith('<p class="editable">'+$(this).val()+"</p>")
				}
			});
		}
	});
	//Ubicar en el mapa la direccion nueva
	$('.input_direccion').keypress(function(e) {
        if(e.which == 13) {
            GMaps.geocode({
                address: $(e.target).val(),
                callback: function(results, status) {
                    if (status == 'OK') {
                         $("body").stop().animate({scrollTop:150}, 1000, 'swing');
                         var latlng = results[0].geometry.location;
                         latitud = latlng.lat();
                         longitud = latlng.lng();
                         $(e.target).parent().next().next().text(latitud)
                         $(e.target).parent().next().next().next().text(longitud);
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
	//Eliminar marcador
	$(".boton_eliminar").click(function(ev){
		var id_eliminar;
		if($(ev.target).prop("tagName") == "BUTTON"){
			id_eliminar = $(ev.target).val();
		}else{
			id_eliminar = $(ev.target).parent().val();
		}
		swal({
		  title: '¿Estas seguro?',
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  cancelButtonText: 'Cancelar',
		  confirmButtonText: 'Si'
		}).then(function () {
		  	$.ajax({url: "api/api_eliminar_marcador.php?id_eliminar="+id_eliminar,
	    		type: "GET",
	    		success: function(result){
	    			if(result.status==200){
	    				//HACER UN SWAL CON SE ELIMINO EL CONTENIDO Y ELIMINAR EL ELEMENTO DE LA TABLA!!
	    				location.reload();
	    			}
    		}});
		});
	});
	//Editar marcador
	$(".boton_edit").click(function(ev){
		var target = ev.target;
		var id_editar;
		var nombre_edit;
		var direcc_edit;
		var lat_edit;
		var long_edit;
		var tel_edit;

		if($(target).prop("tagName") == "BUTTON"){
			id_editar = $(target).val();
			long_edit = $(target).parent().parent().prev().text();
			lat_edit = $(target).parent().parent().prev().prev().text();
			tel_edit = $(target).parent().parent().prev().prev().prev().text();
			direcc_edit = $(target).parent().parent().prev().prev().prev().prev().text();
			nombre_edit = $(target).parent().parent().prev().prev().prev().prev().prev().text();
		}else{
			id_editar = $(target).parent().val();
			long_edit = $(target).parent().parent().parent().prev().text();
			lat_edit = $(target).parent().parent().parent().prev().prev().text();
			tel_edit = $(target).parent().parent().parent().prev().prev().prev().text();
			direcc_edit = $(target).parent().parent().parent().prev().prev().prev().prev().text();
			nombre_edit = $(target).parent().parent().parent().prev().prev().prev().prev().prev().text();
			console.log(id_editar, long_edit, lat_edit, tel_edit, nombre_edit);
		}

		$.ajax({url: 'api/api_editar_marcador.php?'+
							'id_editar='+id_editar+'&'+
							'nombre_edit='+nombre_edit+'&'+
							'direcc_edit='+direcc_edit+'&'+
							'lat_edit='+lat_edit+'&'+
							'long_edit='+long_edit+'&'+
							'tel_edit='+tel_edit,
	    		type: "GET",
	    		success: function(result){
	    			if(result.status==200){
	    				swal(
						  'Acción realizada',
						  'Se editó un marcador',
						  'success'
						);
	    			}
		}});
	});
});// End Onready function