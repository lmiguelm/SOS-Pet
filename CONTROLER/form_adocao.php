<?php
	
	if (isset($_GET["id"])) {
		$id=$_GET["id"];

		$consulta="SELECT * FROM adocao WHERE id_animal=$id";
		$stmt = $conexao->prepare($consulta);
        $stmt->execute();
        $result=$stmt->fetch();
	}


?>
<div id="parallax-image3" class="detalhe_animal">
	<div class="col-xs-12 col-sm-10 offset-sm-1 col-md-10 offset-md-1">
		<h2 class="text-center"><?php echo($result["nome"]); ?></h2><br><br>

		<div class="row c">

			<div class="col-sm-6" data-anime="top">
				<div class="zoom">
					<img src="../img/animais/<?php echo($result["foto"]); ?>" class="img-fluid" width="700px" height="500px">
				</div>	
			</div>

			<div class="col-sm-6">
				<br><br>
				<ul>
					<li>Raça: <?php echo($result["raca"]); ?></li>
					<li>Porte: <?php echo($result["porte"]); ?></li>
					<li>Sexo: <?php echo($result["sexo"]); ?></li>
					<li>Descrição: <?php echo($result["descricao_adocao"]); ?></li>
				</ul>

				<br><br>

				<?php if (isset($_SESSION["usuario"])){?>
						
					<div class="text-center">  
						<a href="#" class="btn btn-success"  data-toggle="modal" data-target="#modalConfirmarAdocao">Adotar <?php echo($result["nome"]) ?></a>
					</div>

					<!-- nome -->
					<div class="modal fade" id="modalConfirmarAdocao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header text-center" style="background-color: red;">
					      	 <h5 class="modal-title  text-center" id="exampleModalLabel"><b>---------------------- Atenção! -----------------</b></h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>

					      
					      <div class="modal-body">
					       		<p style="color: black;" class="text-center">Tem certeza que deseja adotar este animal?</p>
					      </div>

					      <div class="modal-footer">
					        <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
					       <a href="confirmar_adocao.php?id=<?php echo($result["id_animal"]); ?>" class="btn btn-success">Sim</a>
					      </div>
					    
					    </div>
					  </div>
					</div>
				<?php }
				else{
					echo'<div class="text-center"><a href="index.php?adocao&id='.$result["id_animal"].'#conta" class="red"><b>Faça login para continuar</b></a></div>';
				} ?>
				<br><br>
				<div class="text-center">
					<a href="listar_animais_adocao.php#listar_animais_adocao" class="btn btn-warning">Voltar</a>
				</div>
				
			</div>
		</div>
	</div>
</div>

