<?php
		header("Content-Type: application/json; charset=UTF-8");

		require "../Marcadores.php";

		var_dump($_POST);
		die();
		if($respuesta)
			echo json_encode(["status"=>200]);
		else
			echo json_encode(["status"=>400]);
