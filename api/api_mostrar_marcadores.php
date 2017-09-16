<?php
	header("Content-Type: application/json; charset=UTF-8");
	require "../Marcadores.php";
	$clase_marcadores = new Marcadores();
	if(isset($_GET["id_marcador"])){
		$id = $_GET["id_marcador"];

		if($marcadores = $clase_marcadores->getMarcadores($id))
		echo json_encode(["status"=>200,"data"=>$marcadores]);
		else
		echo json_encode(["status"=>400]);

	}else{
		if($marcadores = $clase_marcadores->getMarcadores())
		echo json_encode(["status"=>200,"data"=>$marcadores]);
		else
		echo json_encode(["status"=>400]);
	}
