<?php
	include("../../MODEL/classeUsuario.php");
	include("../../MODEL/classeBancoDeDados.php");
	session_start();

	$id_voluntario=$_SESSION["usuario"]->get_id();
	$id=$_POST["id"];
	
	if (isset($_GET["resgatado"])) {
		
		$update="UPDATE animal set cod_voluntario=$id_voluntario, status='Resgatado' WHERE id_animal=$id";
		$stmt = $conexao->prepare($update);
        $stmt->execute();
	}



	include("../../VIEW/classeRodape.php");
?>
<script src="../../js/resgatar_animais.js"></script>