<?php
	include("../VIEW/classeCabecalho.php");
	include("../MODEL/classeBancoDeDados.php");
		
	

	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json;charset=UTF-8');
	$host = "us-cdbr-east-02.cleardb.com";
    $db   = "heroku_bb3563937d246b4";
    $user = "ba3534f19130d4";
    $pass = "9df3a70e";
	$conn = new mysqli($host, $user, $pass, $db);
		$conn->set_charset("utf8");

	$id=$_GET["id"];

	if (isset($_GET["usuario"])) {
		$delete="DELETE FROM usuario WHERE id_usuario=$id";
	}
	if (isset($_GET["voluntario"])) {
		$delete="DELETE FROM voluntario WHERE id_voluntario=$id";
	}
	if (isset($_GET["animal"])) {
			$delete="DELETE FROM animal WHERE id_animal=$id";
		}

	
    $conn->query($delete);

	$conn->close();

?>
