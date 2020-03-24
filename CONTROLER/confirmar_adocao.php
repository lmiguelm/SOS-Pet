<?php
	include("../VIEW/classeCabecalho.php");
	include("autenticacao/autenticacao.php");
    include("../MODEL/conexao.php");
    include("../MODEL/classeBancoDeDados.php");

    $id=$_GET["id"];

   if(!isset($_SESSION["usuario"])){
		die(header("location:index.php?#conta&adocao&id=$id"));
	}

	$alteracao='UPDATE animal SET cod_usuario_adota='.$_SESSION["usuario"]->get_id().', status="Adotado" WHERE id_animal='.$id.'';
	$stmt=$conexao->prepare($alteracao);
	$stmt->execute();


    $consulta="SELECT * FROM animal WHERE id_animal=$id";
    $stmt = $conexao->prepare($consulta);
    $stmt->execute();


    $result=$stmt->fetch();
?>
<br><br><br><br>
<div class="col-xs-12 col-sm-10 offset-sm-1 col-md-10 offset-md-1">
	<div id="parallax-image333">
		<h2 class="text-center">Você acabou de adotar <?php echo($result["nome"]);?> !!</h2><br><br>

		<div class="text-center row c">
			<div class="col-sm-6">
				<div class="zoom">
					<img src="../img/animais/<?php echo($result["foto"]); ?>" width="450px" height="500px">
				</div>	
			</div>

			<div class="col-sm-6">
				<br><br>
				<div class="container">
					<p>
						Olá, <?php echo($_SESSION["usuario"]->get_nome());  ?>. Muito obrigado por realizar uma adoção!! Para buscar seu novo animal vá até a nossa ONG com seus documentos.<br><br>

						Rua Castro Alves, Nº200, Araraquara-SP, Brasil
					</p>

					
				</div>
				
			</div>
		</div>
	</div>
</div>
<?php
    include("../VIEW/classeRodape.php");
?>