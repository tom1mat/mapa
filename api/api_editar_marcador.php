<?php
	if(isset($_GET["id_editar"]) && isset($_GET["nombre_edit"]) && isset($_GET["direcc_edit"])
		&& isset($_GET["lat_edit"]) && isset($_GET["long_edit"])){
		header("Content-Type: application/json; charset=UTF-8");
		
		$id_editar = $_GET["id_editar"];
		$nombre_edit = $_GET["nombre_edit"];
		$direcc_edit = $_GET["direcc_edit"];
		$lat_edit = $_GET["lat_edit"];
		$long_edit = $_GET["long_edit"];
		$tel_edit = "NULL";
		if(isset($_GET["tel_edit"]))
			$tel_edit = $_GET["tel_edit"];

		require "../config.php";

		$conn = mysqli_connect($servername, $username, $password, $base);

		if (!$conn) {
		  die("Connection failed: " . mysqli_connect_error());
		}
		if($tel_edit == "NULL"){
			$query = 'update marcador set nombre="'.$nombre_edit.'", direccion="'.$direcc_edit.'",
			latitud ='.$lat_edit.', longitud ='.$long_edit.' where id=13;';
		}else{
			$query = 'update marcador set nombre="'.$nombre_edit.'", direccion="'.$direcc_edit.'",
			latitud ='.$lat_edit.', longitud ='.$long_edit.', telefono ="'.$tel_edit.'" where id='.$id_editar.';';
		}
		$respuesta = mysqli_query($conn, $query);

		if($respuesta)
			echo json_encode(["status"=>200]);
		else
			echo json_encode(["status"=>400]);
	}