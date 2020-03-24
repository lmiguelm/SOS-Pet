<?php
    header('Access-Control-Allow-Origin: *');
    header("Content-Type: application/json; charset=UTF-8");

    $host = "localhost";
    $db   = "sospet";
    $user = "root";
    $pass = "usbw";
    $conn = new mysqli($host, $user, $pass, $db); 
    $conn->set_charset("utf8");

    if ($conn->connect_error) {
        die("Falha na conexao: " . $conn->connect_error);
    } 

    $tabela=$_GET["tabela"];

    $sql = "SELECT COUNT(*) as contador FROM $tabela";
    $result = $conn->query($sql);
    $outp = array();
    $outp = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($outp);
    $conn->close();
    
?>