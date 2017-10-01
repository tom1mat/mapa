<?php
	header("Content-Type: application/json; charset=UTF-8");
	if(isset($_POST["nombre"]) && isset($_POST["direccion"]) && isset($_POST["latitud"]) && isset($_POST["longitud"]) && isset($_POST["tipo"])){
		require "../Marcadores.php";
		$clase_marcadores = new Marcadores();
		$valores = $_POST;

		if($clase_marcadores->insertMarcador($valores))
			echo json_encode(["status"=>200]);
		else
			echo json_encode(["status"=>400]);
	}
