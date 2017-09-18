$(document).ready(function(){
  $("#form_login").submit(function(event) {
    event.preventDefault();
    var usuario = $("#login-username").val();
    var pass = $("#login-password").val();
    $.ajax({url: 'api/api_validar_login.php',
	    		type: "POST",
					data: 'usuario='+usuario+'&'+
								'pass='+pass,
	    		success: function(result){
	    			if(result.status==200){
              var ruta = window.location.href;
              if (ruta.substr(ruta.length - 1) == "l"){
                console.log(ruta.replace("index_mapa.html", "index_mapa.php"));
                window.location.replace(ruta.replace("index_mapa.html", "index_mapa.php"));
              }else{
                console.log(ruta+"index_mapa.php");
                window.location.replace(ruta+"index_mapa.php");
              }
	    			}else if (result.status == 400){
                $("#error").text("Usuario y/o contraseña inválidos").show().fadeOut( 3000 );
            }
		}});

  });
});// End Onready function
