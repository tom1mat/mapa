<?php
	header("Content-Type: application/json; charset=UTF-8");
	require "../config.php";

	$conn = mysqli_connect($servername, $username, $password, $base);

	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}

	$marcadores = array();

	$respuesta = mysqli_query($conn, 'select * from marcador;');

	while ($marcador = mysqli_fetch_assoc($respuesta)) {
		$marcadores[] = $marcador;
	}

	echo json_encode(["status"=>200,"data"=>$marcadores]);
