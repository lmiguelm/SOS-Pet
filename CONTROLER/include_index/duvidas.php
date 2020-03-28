<div id="parallax-image5">
	<?php
		if (isset($_SESSION["usuario"]) && $_SESSION["usuario"]->get_permissao()==2) {
			echo'
			<h1 class="text-center" style="font-size: 60px;"><b id="dados_secao2_titulo"></b><i data-toggle="tooltip" title="Editar" data-original-title="Editar" class="material-icons editar-texto mouse" data-toggle="modal" data-target="#muda_dados_secao2">edit</i></h1>
			
			<div class="modal fade" id="muda_dados_secao2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<form>
						<div class="modal-body">
							<input type="text" required="required"  id="tituloSecao2" required="required" placeholder="Insira o novo titulo" class="form-control"/><br>
							<textarea class="form-control"  id="conteudoSecao2" placeholder="Informe o novo conteudo"></textarea>
							
						</div>

						<div class="modal-footer">
							<button type="reset" class="btn btn-secondary" >Apagar</button>
							<button type="button" value="2" class="btn btn-primary alterarSecao">Salvar mudanças</button>
						</div>
					</form>
					</div>
				</div>
				</div>
			';
		}
		else {
			echo'<h1 class="text-center" style="font-size: 60px;"><b id="dados_secao2_titulo"></b></h1>';
		}

	?>
	<div class="row">

		<div class="col-sm-6 text-center" data-anime="left">
			
		</div>

		<div class="col-sm-6" data-anime="right">
			<ol class="text-center">
				<br/><br/><br/>
				<span id="dados_secao2_conteudo"></span>
			</ol>
		</div>	
	</div>
	</div>

	<br/><br/>



	<div id="parallax-image3">
		<div class="container" id="R1">
			<?php
				if (isset($_SESSION["usuario"]) && $_SESSION["usuario"]->get_permissao()==2) {
					echo
					'
						<h1 class="text-center"><b id="dados_secao3_titulo"></b><i data-toggle="tooltip" title="Editar" data-original-title="Editar" class="material-icons editar-texto mouse" data-toggle="modal" data-target="#muda_dados_secao3">edit</i></h1><br>

						<div class="modal fade" id="muda_dados_secao3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>

								<form>
									<div class="modal-body">
										<input type="text" required="required" name="tituloSecao3" id="tituloSecao3" required="required" placeholder="Insira o novo titulo" class="form-control"/><br>
										<textarea class="form-control" name="conteudoSecao3" id="conteudoSecao3" placeholder="Informe o novo conteudo"></textarea>
									</div>

									<div class="modal-footer">
										<button type="reset" class="btn btn-secondary" >Apagar</button>
										<button type="button" value="3"  class="btn btn-primary alterarSecao">Salvar mudanças</button>
									</div>
								</form>
								</div>
							</div>
						</div>
					';
				}
				else {
					echo'<h1 class="text-center"><b id="dados_secao3_titulo"></b></h1>';
				}

			?>
	        
	        <p id="dados_secao3_conteudo"></p>
		</div>
	</div>

	<br/>
	<div id="parallax-image3">
		<div class="container " id="R2">
				<?php

					if (isset($_SESSION["usuario"]) && $_SESSION["usuario"]->get_permissao()==2) {
						
						echo
						'	
							<h1 class="text-center"><b id="dados_secao4_titulo"></b><i data-toggle="tooltip" title="Editar" data-original-title="Editar" class="material-icons editar-texto mouse" data-toggle="modal" data-target="#muda_dados_secao4">edit</i></h1><br>

							<div class="modal fade" id="muda_dados_secao4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
										<span aria-hidden="true">&times;</span>
										</button>
									</div>

									<form>
										<div class="modal-body">
											<input type="text" required="required" name="tituloSecao3" id="tituloSecao4" required="required" placeholder="Insira o novo titulo" class="form-control"/><br>
											<textarea class="form-control" name="conteudoSecao3" id="conteudoSecao4" placeholder="Informe o novo conteudo"></textarea>
										</div>

										<div class="modal-footer">
											<button type="reset" class="btn btn-secondary" >Apagar</button>
											<button type="button" value="4" class="btn btn-primary alterarSecao">Salvar mudanças</button>
										</div>
									</form>
									</div>
								</div>
							</div>
						';
					}
					else {
						echo
						'	
							<h1 class="text-center"><b id="dados_secao4_titulo"></b></h1><br>
						';
					}
				?>

	           <p id="dados_secao4_conteudo"></p>
	        </div>
	    </div>

	<br/>

	<div id="parallax-image3">
		<div class="container " id="R3">
				<?php

					if (isset($_SESSION["usuario"]) && $_SESSION["usuario"]->get_permissao()==2) {
						
						echo
						'	
							<h1 class="text-center"><b id="dados_secao5_titulo"></b><i data-toggle="tooltip" title="Editar" data-original-title="Editar" class="material-icons editar-texto mouse" data-toggle="modal" data-target="#muda_dados_secao5">edit</i></h1><br>

							<div class="modal fade" id="muda_dados_secao5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
										<span aria-hidden="true">&times;</span>
										</button>
									</div>

									<form>
										<div class="modal-body">
											<input type="text" required="required" name="tituloSecao5" id="tituloSecao5" required="required" placeholder="Insira o novo titulo" class="form-control"/><br>
											<textarea class="form-control" name="conteudoSecao5" id="conteudoSecao5" placeholder="Informe o novo conteudo"></textarea>
										</div>

										<div class="modal-footer">
											<button type="reset" class="btn btn-secondary" >Apagar</button>
											<button type="button" value="5" class="btn btn-primary alterarSecao">Salvar mudanças</button>
										</div>
									</form>
									</div>
								</div>
							</div>
						';
					}
					else {
						echo
						'	
							<h1 class="text-center"><b id="dados_secao5_titulo"></b></h1><br>
						';
					}
				?>

	           <p id="dados_secao5_conteudo"></p>
	        </div>
	    
	
</div>