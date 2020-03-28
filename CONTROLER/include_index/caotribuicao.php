<div id="parallax-image2" >
	<h1 class=" text-center" style="font-size: 60px;">

		<?php
			if (isset($_SESSION["usuario"]) && $_SESSION["usuario"]->get_permissao()==2) {
				echo'
					<h1 class="text-center">
						<b id="dados_secao1_titulo"></b><i data-toggle="tooltip" title="Editar" data-original-title="Editar" class="material-icons editar-texto mouse" data-toggle="modal" data-target="#muda_dados_secao1">edit</i>
					</h1>
					
					<div class="modal fade" id="muda_dados_secao1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>

						<form>
							<div class="modal-body">
								<input type="text" required="required" id="tituloSecao1" required="required" placeholder="Insira o novo titulo" class="form-control"/><br>
								<textarea class="form-control"  id="conteudoSecao1" placeholder="Informe o novo conteudo"></textarea>
							</div>

							<div class="modal-footer">
								<button type="reset" class="btn btn-secondary" >Apagar</button>
								<button type="button" value="1" class="btn btn-primary alterarSecao">Salvar mudanças</button>
							</div>
						</form>
						</div>
					</div>
					</div>';
			}else{
				echo'
					<h1 class="text-center">
						<b id="dados_secao1_titulo"></b>
					</h1>';
			}	
		?>
	</h1>
	<div class="row">
		
		<div class="container col-sm-6 text-center" data-anime="top">
			<br><br>
	      	<p id="dados_secao1_conteudo"></p>
	    </div>

	    <div class="col-sm-6 text-center" data-anime="left">
			
		</div>
		
	</div>
</div>