<?php
	header("Content-Type: application/json; charset=UTF-8");
	if(isset($_POST["id_eliminar"])){
		$id_eliminar = $_POST["id_eliminar"];

		require "../Marcadores.php";
		$clase_marcadores = new Marcadores();

		if($clase_marcadores->deleteMarcador($id_eliminar))
			echo json_encode(["status"=>200]);
		else
			echo json_encode(["status"=>400]);
	}
