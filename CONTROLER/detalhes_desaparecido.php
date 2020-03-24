<?php
	if (isset($_GET["id"])) {
		$id=$_GET["id"];

		$consulta="SELECT * FROM desaparecido WHERE id_animal=$id";
		$stmt = $conexao->prepare($consulta);
        $stmt->execute();
        $result=$stmt->fetch();
	}
?>

<div class="col-xs-12 col-sm-10 offset-sm-1 col-md-10 offset-md-1"  id="form_desaparecido">
	<div id="parallax-image3" class="detalhe_animal">
		<h2 class="text-center"><?php echo($result["nome"]); ?></h2><br><br>

		<div class="row c">

			<div class="col-sm-6" data-anime="left">
				<div class="zoom">
					<img src="../img/animais/<?php echo($result["foto"]); ?>" class="img-fluid" width="400px" height="500px">
				</div>	
			</div>

			<div class="col-sm-6">
				
				<p>Raça: <?php echo($result["raca"]); ?></p>
				<p>Visto pela ultima vez no bairro: <?php echo($result["bairro_desaparecido"]); ?>, em <?php echo($result["data_desaparecido"]); ?></p>
				<p>Dono: <?php echo($result["nome_dono"]); ?></p>
				<p>Telefone: <?php echo($result["telefone"]); ?></p>
				<p>Descrição: <?php echo($result["descricao_desaparecido"]); ?></p>
				
				<br><br><br>
				<div class="text-center">
					<a href="listar_desaparecidos.php#listar_animais_desaparecidos" class="btn btn-warning desaparece scroll">Voltar</a>
				</div>
			</div>
		</div>
	</div>
</div>