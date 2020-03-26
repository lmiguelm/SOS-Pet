<div id="parallax-image4">

		<div class="row c">

			<div class="col-sm-5 text-center">
				<br><br><br><br>
				<?php
					if (isset($_GET["erro"])){
				?>
					<br><br><br><br><br>
					<p class="text-center red">Senha ou E-mail incorretos. Tente novamente.</p>
					<button class="btn btn-success" id="button_reload" style="width: 200px;">Ok</button>
				<?php
					}

					elseif (isset($_GET["adocao"])) {
						$id=$_GET["id"];
						echo"<p class='text-center red'>Primeiro entre em sua conta:</p>";
						$parametros["action"]="validacao.php?id=$id";
					}
					else{
						echo"<p class='text-center'>Entre com seu E-mail e Senha:</p>";
						$parametros["action"]="validacao.php";
					}
				?>
				<br>
				<?php
					if (!isset($_GET["erro"])) {?>

						<form method="POST" id="form_login" action="<?php echo $parametros["action"]?>">
							<input type="email" name="email"  class="form-control" placeholder="E-mail" required="required"/><br>
							<input type="password" name="senha" class="form-control" data-cript="md5, sha1" placeholder="Senha" required="required"/><br>

							<button class="btn btn-success" style="width: 200px;">Entrar</button>
						</form>
						<br>
						<p class='text-center'>
							Você ainda não tem uma conta?<a style="color: red;" href='#' data-toggle="modal" data-target="#cadastro"> Registre-se aqui</a>
						</p>

						<p class="text-center">
							<a style="color:red;" href='#' data-toggle="modal" data-target="#EsqueciSenha">Esqueci minha senha</a>
						</p>
				<?php } ?>

				<!-- Modal -->
				<div class="modal fade" id="cadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Formulário de cadastro</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <form id="form_cadastro"action="validacao.php?usuario" method="post">
					      <div class="modal-body">

					      	<div class="row">
					            <div class="input-group col-sm-12 col-xs-12">
					                <input type="text" name="nome" id="nome" required="required" class="form-control" placeholder="Nome Completo" />
					            </div>
					        </div><br/>

					        <div class="row">
					        	<div class="input-group col-sm-12 col-xs-12">
						           <select name="sexo" class="form-control">
						                <option>Selecione seu sexo:</option>
						                <option value="Masculino">Masculino</option>
						                <option value="Feminino">Feminino</option>
						           </select>
						        </div>
					        </div><br/>

					         <div class="row">
					            <div class="input-group col-sm-12 col-xs-12">
					                <input type="text" name="telefone" required="required" class="form-control telefone" placeholder="Telefone"/>
					            </div>
					        </div><br/>

					        <div class="row">
					            <div class="input-group col-sm-12 col-xs-12">
					                <input type="text" name="endereco" required="required" class="form-control" placeholder="Endereço"/>
					            </div>
					        </div><br/>

					        <div class="row">
					            <div class="input-group col-sm-12 col-xs-12">
					              <div class="input-group-prepend">
					                <span class="input-group-text" id="addon-wrapping">@</span>
					              </div>
					              <input type="email" class="form-control" placeholder="Email" required="required" name="email" aria-describedby="addon-wrapping">
					            </div>
					        </div><br/>

					        <div class="row">
					           <div class="input-group col-sm-6 col-xs-12">
					                <input type="password" name="senha" id="senha" required="required" class="form-control password" placeholder="Senha" data-cript="md5, sha1"/>
					            </div>

					            <div class="input-group col-sm-6 col-xs-12">
					                <input type="password" name="senha" id="senhaConfirmacao" required="required" placeholder="Digite novamente" class="form-control password" data-cript="md5, sha1"/>
					            </div>
					        </div><br/>

					      </div>
					      <div class="modal-footer">
					        <input type="reset" class="btn btn-secondary" value="Apagar">
					        <button class="btn btn-primary">Salvar mudanças</button>
					      </div>
					  </form>
				    </div>
				  </div>
				</div>

				<div class="col-sm-7" data-anime="letf">
				
				
				</div>
			</div>

			<!-- Modal -->
			<div class="modal fade" id="EsqueciSenha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Insira o e-mail de recuperação</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>

			      <form method="POST" id="form_recuperar_senha" action="enviar_resetar_senha.php">
			      	 <div class="modal-body">
				        <div class="row">
				            <div class="input-group col-sm-12 col-xs-12">
				              <div class="input-group-prepend">
				                <span class="input-group-text" id="addon-wrapping">@</span>
				              </div>
				              <input type="email" class="form-control" placeholder="Email" required="required" name="email" aria-describedby="addon-wrapping"><br>
				            </div>
				        </div>
				     </div>
				     <div class="modal-footer">
				       <input type="reset" class="btn btn-secondary" value="Apagar">
				       <button type="submit" class="btn btn-primary">Enviar</button>
				     </div>
			      </form>
			    </div>
			  </div>
			</div>

		</div>
	</div>
