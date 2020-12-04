<?php
    header('Access-Control-Allow-Origin: *');
    header("Content-Type: application/json; charset=UTF-8");
    $host = "host=us-cdbr-east-02.cleardb.com";
    $db   = "heroku_bb3563937d246b4";
    $user = "ba3534f19130d4";
    $pass = "9df3a70e";
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