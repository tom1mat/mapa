<?php
	if(isset($_GET["id_eliminar"])){
		$id_eliminar = $_GET["id_eliminar"];
		header("Content-Type: application/json; charset=UTF-8");
		require "../config.php";

		$conn = mysqli_connect($servername, $username, $password, $base);

		if (!$conn) {
		  die("Connection failed: " . mysqli_connect_error());
		}
		
		$respuesta = mysqli_query($conn, 'delete from marcador where id='.$id_eliminar.';');

		if($respuesta)
			echo json_encode(["status"=>200]);
		else
			echo json_encode(["status"=>400]);
	}

