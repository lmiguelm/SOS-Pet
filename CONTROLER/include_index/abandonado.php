
<div id="parallax-image8">

	<div class="col-xs-6 col-sm-6  col-md-6  text-center">
		<?php

			if (isset($_SESSION["usuario"]) && $_SESSION["usuario"]->get_permissao()==2) {

				echo
				'
					<h1 id="abandonado" style="font-size: 50px;"><span id="dados_secao6_titulo"></span><i data-toggle="tooltip" title="Editar" data-original-title="Editar" class="material-icons editar-texto mouse" data-toggle="modal" data-target="#muda_dados_secao6">edit</i></h1>

					<div class="modal fade" id="muda_dados_secao6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>

							<form>
								<div class="modal-body">
									<input type="text" required="required" name="tituloSecao6" id="tituloSecao6" required="required" placeholder="Insira o novo titulo" class="form-control"/><br>
									<textarea class="form-control" name="conteudoSecao6" id="conteudoSecao6" placeholder="Informe o novo conteudo"></textarea>
								</div>

								<div class="modal-footer">
									<button type="reset" class="btn btn-secondary" >Apagar</button>
									<button type="button" value="6" class="btn btn-primary alterarSecao">Salvar mudanças</button>
								</div>
							</form>
							</div>
						</div>
					</div>
				';
			}
			else {
				echo'<h1 id="abandonado" style="font-size: 50px;"><span id="dados_secao6_titulo"></span></h1>';
			}
		?>
	</div>

	<div class="col-xs-6 col-sm-6  col-md-6" data-anime="right"><br><br><br>
		<div class="container">
	        <p id="dados_secao6_conteudo"></p>
	        <br>
	    </div>
	    <?php 
	    	if (!isset($_SESSION["usuario"])) {
	    		echo'<p><a href="index.php?#conta" class="red text-center scroll"><b>Entre com sua conta para continuar</b></a></p>';
	    	}
	    ?>
	</div>

	<div class="col-xs-6 col-sm-6  col-md-6">
		
				
		<?php	

			if (isset($_SESSION["usuario"]) && $_SESSION["usuario"]->get_permissao()==0) {
				
				$parametros=null;
				$parametros["action"]="insere.php?tabela=animal&abandonado";
				$parametros["method"]="POST";
				$parametros["modal"]=true;
				$parametros["reset"]=true;
				$parametros["enctype"]=true;
				$f=new Form($parametros);

				$parametros=null;
				$parametros["name"]="foto";
				$parametros["type"]="file";
				$parametros["label"] = "Foto do animal";
				$parametros["id"]="foto";
				$parametros["class"]="form-control";
				$parametros["required"]="required";
				$f->add_input($parametros);

				$parametros=null;
				$vetor=null;
				$vetor[] = array("value"=>"Cachorro","label"=>"Cachorro");
				$vetor[] = array("value"=>"Gato","label"=>"Gato");
				$parametros["name"] = "tipo";
				$parametros["class"] = "form-control";
				$parametros["id"] = "sexo";
				$f->add_select($parametros,$vetor);

				$parametros=null;
				$vetor=null;
				$vetor[] = array("value"=>"1","label"=>"Macho");
				$vetor[] = array("value"=>"2","label"=>"Femêa");
				$parametros["name"] = "sexo";
				$parametros["class"] = "form-control";
				$parametros["id"] = "sexo";
				$f->add_select($parametros,$vetor);

				$parametros=null;
				$parametros["name"]="endereco_abandonado";
				$parametros["type"]="text";
				$parametros["id"]="endereco";
				$parametros["class"]="form-control";
				$parametros["placeholder"]="Informe o endereço";
				$parametros["required"]="required";
				$f->add_input($parametros);		

				$parametros = null;
				$parametros["name"] = "observacao_abandonado";
				$parametros["class"]="form-control";
				$parametros["placeholder"] = "Observações (opcional)";
				$f->add_textarea($parametros);

				$parametros=null;
				$parametros["name"]="status";
				$parametros["type"]="hidden";
				$parametros["id"]="status";
				$parametros["value"]="Abandonado";
				$f->add_input($parametros);

				$parametros=null;
				$parametros["name"]="cod_usuario_cadastra";
				$parametros["type"]="hidden";
				$parametros["id"]="cod_usuario_cadastra";
				$parametros["value"]=$_SESSION["usuario"]->get_id();
				$f->add_input($parametros);				

				$parametros["modal_title"]="Formulário de animal abandonado";
				$parametros["btn_title"]="Anunciar um animal abandonado";
				$m=new Modal($f, $parametros);

				$m->exibe();
			}
		?>
	</div>
</div>

