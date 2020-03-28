
<div id="parallax-image10">

	<div class="col-sm-6 text-center"  data-anime="left">
		
	</div>

	<div class="col-sm-6"><br>

		<?php
			if (isset($_SESSION["usuario"]) && $_SESSION["usuario"]->get_permissao()==2) {
				echo
				'
					<h1 id="desaparecido" class="text-center"><b id="dados_secao8_titulo"></b><i data-toggle="tooltip" title="Editar" data-original-title="Editar" class="material-icons editar-texto mouse" data-toggle="modal" data-target="#muda_dados_secao8">edit</i></h1>

					<div class="modal fade" id="muda_dados_secao8" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>

							<form>
								<div class="modal-body">
									<input type="text" required="required" name="tituloSecao8" id="tituloSecao8" required="required" placeholder="Insira o novo titulo" class="form-control"/><br>
									<textarea class="form-control" name="conteudoSecao8" id="conteudoSecao8" placeholder="Informe o novo conteudo"></textarea>
								</div>

								<div class="modal-footer">
									<button type="reset" class="btn btn-secondary" >Apagar</button>
									<button type="button" value="8" class="btn btn-primary alterarSecao">Salvar mudanças</button>
								</div>
							</form>
							</div>
						</div>
					</div>
				';
			}
			else {
				echo'<h1 id="desaparecido" class="text-center"><b id="dados_secao8_titulo"></b></h1>';
			}
		?>

		<div data-anime="right">
			
			<p id="dados_secao8_conteudo"></p>
			<p class="text-center"><a href="listar_desaparecidos.php" class="btn btn-success">Ver mais</a></p>
		</div>
		

	</div>
</div>
