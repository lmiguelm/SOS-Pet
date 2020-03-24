<?php
	include("../../MODEL/classeUsuario.php");
	include("../../MODEL/classeBancoDeDados.php");
	session_start();

	$id=$_SESSION["usuario"]->get_id();
	$tabela=$_GET["tabela"];

	if(isset($_POST["nome"])){

		$nome=$_POST["nome"];
		$update="UPDATE $tabela SET nome = '$nome' WHERE id_$tabela=$id";
		$stmt = $conexao->prepare($update);
        $stmt->execute();
	}
	elseif (isset($_POST["telefone"])) {

		$telefone=$_POST["telefone"];
		$update="UPDATE $tabela SET telefone = '$telefone' WHERE id_$tabela=$id";
		$stmt = $conexao->prepare($update);
        $stmt->execute();
	}
	elseif (isset($_POST["email"])) {

		$email=$_POST["email"];
		$update="UPDATE $tabela SET email = '$email' WHERE id_$tabela=$id";
		$stmt = $conexao->prepare($update);
        $stmt->execute();
	}
	elseif (isset($_POST["senha"])) {

		$senha=$_POST["senha"];
		$senha1=md5($senha);
		$senha2=sha1($senha1);
		$update="UPDATE $tabela SET senha = '$senha2' WHERE id_$tabela=$id";
		$stmt = $conexao->prepare($update);
        $stmt->execute();
	}
	elseif (isset($_POST["endereco"])) {

		$endereco=$_POST["endereco"];
		$update="UPDATE $tabela SET endereco = '$endereco' WHERE id_$tabela=$id";
		$stmt = $conexao->prepare($update);
        $stmt->execute();
	}
	elseif(isset($_POST["coluna"])){
		$id_animal=$_POST["id"];
		$status=$_POST["status"];	
		$update="UPDATE animal SET status = 'Achado' WHERE id_animal=$id_animal";
		$stmt = $conexao->prepare($update);
        $stmt->execute();
	}


	include("../../VIEW/classeRodape.php");
?>
<script src="../../js/mudar_dados.js"></script>