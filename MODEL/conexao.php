<?php
	include_once("../VIEW/classeCabecalho.php");

    $bd = "mysql:host=us-cdbr-east-02.cleardb.com;dbname=heroku_bb3563937d246b4;charset=utf8";
    $user = "ba3534f19130d4";
    $senha = "9df3a70e";

    try{
    	$conexao = new PDO($bd,$user,$senha);
    }
	catch(Exception $e){
		echo "<div class='text-center'>Nosso sistema está indisponivel no momento. Tente novamento mais tarde :'(</h2></div>";
		die();
	}
?>
