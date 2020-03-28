<?php 

    include("../../MODEL/classeUsuario.php");
    session_start();
   

    //conectando ao bd.
    $host = "localhost";
    $db   = "sospet";
    $user = "root";
    $pass = "usbw";
    $conn = new mysqli($host, $user, $pass, $db); 
    $conn->set_charset("utf8");

    $secao=$_GET["secao"];

    if(isset($_GET["update"])){
        $cont=false;
       if (isset($_GET["novoTitulo"])) {
            $titulo=$_GET["novoTitulo"];
            $update="UPDATE $secao SET titulo='$titulo'";
            $cont=true;
       }
       if (isset($_GET["novoConteudo"])) {
            $conteudo=$_GET["novoConteudo"];
            if ($cont) {
                $update.=", conteudo='$conteudo'";
            }else{
                $update="UPDATE $secao SET conteudo='$conteudo'";
            }
       }
       $result = $conn->query($update);
       $conn->close();  
    }else {
        //LISTAR O CONTEUDO DAS SECOES
        $sql="SELECT titulo, conteudo FROM $secao";

        $result = $conn->query($sql);
        $outp = array();
        $outp = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($outp);
        $conn->close();   
    }


    
?>