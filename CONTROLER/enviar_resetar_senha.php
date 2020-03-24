<?php
	include("../VIEW/classeCabecalho.php");
	$c->exibe_menu();
	include("../MODEL/classeBancoDeDados.php");

	@$chave = md5($_POST["email"].date("Ymdhis"));
	
	$op = new BancoDeDados($conexao);
	
	$tabela[]="usuario";
	$coluna[]="id_usuario as id";
	$coluna[]="nome";
	$condicao[] = "email='".$_POST["email"]."'";
	$ordenacao="";
	$m = $op->select($tabela,$coluna,$condicao,$ordenacao);

	if($m==null){

	}
	else{
		$id=$m[0]["id"];
		$valores = array("codigo_alteracao"=>$chave);
		$op->alterar($valores,"usuario",$id);
		
		$emissor='pizzanetifsp@gmail.com';
		$nome_emissor='SOS Pet';

		$receptor=$_POST["email"];
		$nome_receptor=$m[0]["nome"];
		
		$subject = "Você solicitou o reset de senha";
		$mensagem = "Você solicitou um reset de senha.<br /><br />
		<a href='http://localhost/TCC/CONTROLER/resetar_senha.php?email=".$_POST["email"]."&codigo_alteracao=$chave'>Clique aqui</a> para resetar sua senha.";
		
		include("email.php");
		
		echo'
		<div class=" text-center col-xs-10 offset-xs-1 col-sm-6 offset-sm-3 col-md-4 offset-md-4">
			<img src="../img/icone.png" height="250px" width="350px" />	
		</div>
		<div class="text-center">
			<h2>Seu reset de senha foi enviado. Confira seu email.</h2>
		</div>';
	}
	include("../VIEW/classeRodape.php");
?>