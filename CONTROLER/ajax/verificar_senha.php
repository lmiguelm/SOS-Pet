<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json;charset=UTF-8');

	$id=$_GET["id"];
    
    $host = "localhost";
    $db = "sospet";
    $user = "root";
    $pass = "usbw";

    $conn = new mysqli($host, $user, $pass, $db);
    $conn->set_charset("utf8");

    if($conn->connect_error){
        die("Falha na conexão: " .$conn->connect_error);
    }

    
    $sql = "SELECT senha FROM usuario WHERE id_usuario=$id";
   
    $result = $conn->query($sql);

    $output = array();
    $output = $result->fetch_all(MYSQLI_ASSOC);

    echo json_encode($output);
    $conn->close();

?>