<?php
if(isset($_POST["usuario"]) && isset($_POST["pass"])){
  header("Content-Type: application/json; charset=UTF-8");
  $usuario_login = $_POST["usuario"];
  $pass_login = $_POST["pass"];

  require "../DBconnection.php";
  DBconnection::setData("localhost", "gruporod_grupo_rodriguez","root","");
  $db = DBconnection::getConnection();

  $query = "Select * from configuracion where usuario ='$usuario_login' and pass='$pass_login'";
  $instanciabase = $db->prepare($query);
  $instanciabase->execute();

  if($instanciabase->rowCount() > 0){
    session_start();
    $_SESSION["sesion_gruporod"] = $usuario_login;
    echo json_encode(["status"=>200]);
  }
  else
    echo json_encode(["status"=>400]);
}
