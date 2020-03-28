<div id="parallax-image9">
    <div class="col-sm-5">

        <?php
             if (isset($_SESSION["usuario"]) && $_SESSION["usuario"]->get_permissao()==2) {

                echo
                '
                     <h1 class="text-center" id="adocao"><b id="dados_secao7_titulo"></b><i data-toggle="tooltip" title="Editar" data-original-title="Editar" class="material-icons editar-texto mouse" data-toggle="modal" data-target="#muda_dados_secao7">edit</i></h1><br/>

                     <div class="modal fade" id="muda_dados_secao7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>

							<form>
								<div class="modal-body">
									<input type="text" required="required" name="tituloSecao7" id="tituloSecao7" required="required" placeholder="Insira o novo titulo" class="form-control"/><br>
									<textarea class="form-control" name="conteudoSecao7" id="conteudoSecao7" placeholder="Informe o novo conteudo"></textarea>
								</div>

								<div class="modal-footer">
									<button type="reset" class="btn btn-secondary" >Apagar</button>
									<button type="button" value="7" class="btn btn-primary alterarSecao">Salvar mudanças</button>
								</div>
							</form>
							</div>
						</div>
					</div>
                ';

             }
             else {
                echo'<h1 class="text-center" id="adocao"><b id="dados_secao7_titulo"></b></h1><br/>';
             }
        ?>
        <p id="dados_secao7_conteudo"></p>
        <br>
        <div data-anime="right">
             <p class="text-center"><a href="listar_animais_adocao.php" class="btn btn-success">Adote aqui</a></p>
        </div>

    </div>

    <div class="col-sm-6 text-center" data-anime="left">
        
    </div>
        
</div>
