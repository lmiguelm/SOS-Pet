<?php  
	$emissor=$_POST["email"];
	$nome_emissor=$_POST["nome"];

	$receptor="pizzanetifsp@gmail.com";
	$nome_receptor="PizzaNet";

	$subject = $_POST["assunto"];
	$mensagem = $_POST["mensagem"];

	include("email.php");
?>