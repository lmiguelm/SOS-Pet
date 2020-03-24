<?php
	include("../../MODEL/classeBancoDeDados.php");

	$id_animal=$_POST["id_animal_form"];
	$nome=$_POST["nome"];
	$sexo=$_POST["sexo"];
	$porte=$_POST["porte"];
	$descricao=$_POST["descricao"];
	$raca=$_POST["raca"];

	$update="UPDATE animal SET nome='$nome', sexo='$sexo', porte='$porte', descricao_adocao='$descricao', raca='$raca', status='Adocao' WHERE id_animal=$id_animal";
	$stmt = $conexao->prepare($update);
    $stmt->execute();

	include("../../VIEW/classeRodape.php");
?>
<script src="../../js/colocar_animal_adocao.js"></script>