<?php
if(isset($_POST["nombre"]) && isset($_POST["direccion"]) && isset($_POST["latitud"]) && isset($_POST["longitud"]) && isset($_POST["tipo"])){
	$id = $_GET["id_editar"];
	require "../Marcadores.php";
	$clase_marcadores = new Marcadores();
	$valores = $_POST;

	if($clase_marcadores->updateMarcador($valores, $id))
		header("Location: ../index.php");
	else
		die("ERROR: no se pudo ingresar el marcador.");
}