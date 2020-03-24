<?php
	include("../VIEW/classeCabecalho.php");
	include("../MODEL/classeBancoDeDados.php");
	include("../MODEL/classeValidacaoUsuario.php");

	if (isset($_GET["usuario"])) {
		$operacao = new BancoDeDados($conexao);	
		$operacao->insercao("usuario",$_POST);
	}

	$v = new ValidacaoUsuario($conexao,$_POST);

	$v->validar();
?>
