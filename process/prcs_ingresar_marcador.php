<?php
if(isset($_POST["nombre"]) && isset($_POST["direccion"]) && isset($_POST["latitud"]) && isset($_POST["longitud"]) && isset($_POST["tipo"])){
	$nombre = $_POST["nombre"];
	$direccion = $_POST["direccion"];
	$latitud = $_POST["latitud"];
	$longitud = $_POST["longitud"];
	$tipo = $_POST["tipo"];
	$telefono = "";
	if(isset($_POST["telefono"]))
		$telefono = $_POST["telefono"];

	require "../config.php";

	$conn = mysqli_connect($servername, $username, $password, $base);

	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}

	$query = 'insert into marcador (nombre, tipo, telefono, direccion, latitud, longitud) 
				values ("'.$nombre.'","'.$tipo.'","'.$telefono.'","'.$direccion.'",'.$latitud.','.$longitud.');';
				
	$respuesta = mysqli_query($conn, $query);

	if($respuesta){
		header("Location: ../index.php?seccion=mapa");
	}else{
		echo "Error";
	}

}