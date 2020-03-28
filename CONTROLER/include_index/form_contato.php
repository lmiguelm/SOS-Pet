<div id="parallax-image7">
	<?php
		if (isset($_SESSION["usuario"]) && $_SESSION["usuario"]->get_permissao()==2) {

			echo'<h1 class=" text-center" style="font-size: 60px;"><b id="dados_secao9_titulo"></b><i data-toggle="tooltip" title="Editar" data-original-title="Editar" class="material-icons editar-texto mouse" data-toggle="modal" data-target="#muda_dados_secao9">edit</i></h1>

			<div class="modal fade" id="muda_dados_secao9" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>

							<form>
								<div class="modal-body">
									<input type="text" required="required" name="tituloSecao9" id="tituloSecao9" required="required" placeholder="Insira o novo titulo" class="form-control"/><br>
									<textarea class="form-control" name="conteudoSecao9" id="conteudoSecao9" placeholder="Informe o novo conteudo"></textarea>
								</div>

								<div class="modal-footer">
									<button type="reset" class="btn btn-secondary" >Apagar</button>
									<button type="button" value="9" class="btn btn-primary alterarSecao">Salvar mudanças</button>
								</div>
							</form>
							</div>
						</div>
					</div>';
		}
		else {
			echo'<h1 class=" text-center" style="font-size: 60px;"><b id="dados_secao9_titulo"></b></h1>';
		}
	?>
	

	<div class="row c">
		
		<div class="col-sm-6" data-anime="letf">
			<br><br><br><br>
			<br><br><h4 class="text-center"><b>Telefone: <span id="dados_secao9_conteudo"></span></b></h4>
		</div>

		<div class="col-sm-6 text-center"data-anime="right">
			<br><br>
			<form action="index.php" method="POST" id="form_contato">
				<input type="text" id="nome_contato" name="nome" class="form-control" placeholder="Nome" required="required" /><br>
				<input type="text" id="email_contato" name="email" class="form-control" placeholder="E-mail" required="required"/><br>
				<input type="text" id="assunto_contato"name="assunto" class="form-control" placeholder="Assunto" required="required"/><br>
				<textarea class="form-control" id="mensagem_contato" name="mensagem" placeholder="Mensagem" style="height: 150px;" required="required"></textarea><br>
				<button class="btn btn-primary" type="button" id="btn_contato" style="width: 200px;">Enviar</button>
			</form>
		</div>
	</div>

</div>
