

<?php

	include("../VIEW/classeCabecalho.php");
	$c->exibe_menu();
	include("../VIEW/classeCard.php");
	include("../VIEW/classeForm.php");
	include("../MODEL/classeBancoDeDados.php");
	//session_start();
?>

<div class="col-xs-12 col-sm-10 offset-sm-1 col-md-10 offset-md-1">
	<?php include("include_index/card.php");?>
	
	<br  id="doacao"/><br/>
	<?php include("include_index/caotribuicao.php");?>

	<br  id="duvidas"/><br/>
	<?php include("include_index/duvidas.php"); ?>	

	<?php
		if(!isset($_SESSION["usuario"])) {
			echo "<br id='conta'/><br>";
			include("include_index/form_login.php"); 
		}
	 ?>

	<br id="abandonado">
	<?php include("include_index/abandonado.php");?>

	<br id="adocao">
	<?php include("include_index/adocao.php");?>

	<br id="desaparecido">
	<?php include("include_index/achados_e_perdidos.php");?>

	<br id="contato"><br>
	<?php include("include_index/form_contato.php"); ?>

	<br id="redes_sociais"><br>
	<?php include("include_index/redes_sociais.php"); ?>

	
</div>

<?php
	include("../VIEW/classeRodape.php");

	if (isset($_GET["sucesso_abandonado"])) {
		
		echo
		'
			<script>
				$(document).ready(function(){
					alert("Animal cadastrado com sucesso!")
				})
			</script>
		';
	}
	if (isset($_GET["autenticacao"])) {
		
		echo
		'
			<script>
				$(document).ready(function(){
					alert("Você não tem permissão para acessar está página. Você sera redirecionado para a página inicial")
				})
			</script>
		';
	}
?>

<script>
	$(function(){


		var url="http://localhost/TCC/CONTROLER/";

		$('.scroll').click(function(event){
			event.preventDefault();
			$('html, body').animate({scrollTop:$(this.hash).offset().top},800)
		})
	});
</script>