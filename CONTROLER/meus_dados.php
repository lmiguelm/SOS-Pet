<?php
	include("../VIEW/classeCabecalho.php");
	include("autenticacao/autenticacao.php");
    include("../MODEL/conexao.php");
    include("../MODEL/classeBancoDeDados.php");
    include("autenticacao/autenticacao.php");

    $bd = new BancoDeDados($conexao);



    if ($_SESSION["usuario"]->get_permissao()==0) {
    	$tabela[]="usuario";
		$coluna[]= "id_usuario as id";
		$condicao[]='id_usuario='.$_SESSION["usuario"]->get_id().'';
		$coluna[]= "id_usuario";

		$banco="usuario";
    }else{
    	$tabela[]="voluntario";
		$coluna[]= "id_voluntario as id";
		$condicao[]='id_voluntario='.$_SESSION["usuario"]->get_id().'';
		$coluna[]= "id_voluntario";

		$banco="voluntario";
    }

	$coluna[]= "nome";
	$coluna[]= "foto";
	$coluna[]= "endereco";
	$coluna[]= "telefone";
	$coluna[]= "email";
	$coluna[]= "senha";

	$ordenacao=null;
	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);

	echo "<br><br><br><br><br>";

	echo'

	<div class="col-xs-12 col-sm-10 offset-sm-1 col-md-10 offset-md-1">

		<span hidden id="ta">'.$banco.'</span>

		<div id="parallax-image31">
			<br><br>
			<h3 class="text-center">Configuração gerais da conta</h3>
			<br><br>	 
			<table class="table table-striped">
				<tbody>
					<tr>
						<td><div class="zoom"><img src="../img/'.$banco.'s/'.$m[0]["foto"].'" height="150px"/></div></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td class="text-right" aa><a href="#" data-toggle="modal" data-target="#mudar_foto"><br><br><i class="editar material-icons text-warning">edit</i>Editar</a></td>
					</tr>

					<tr>
						<td>Nome</td>
						<td>'.$m[0]["nome"].'</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td class="text-right" aa><a href="#" data-toggle="modal" data-target="#mudar_nome"><i class="editar material-icons text-warning">edit</i>Editar</a></td>

					</tr>

					<tr>
						<td>Endereço</td>
						<td>'.$m[0]["endereco"].'</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td class="text-right"><a href="#" data-toggle="modal" data-target="#mudar_endereco"><i class="editar material-icons text-warning">edit</i>Editar</a></td>
					</tr>

					<tr>
						<td>Telefone</td>
						<td>'.$m[0]["telefone"].'</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td class="text-right"><a href="#" data-toggle="modal" data-target="#mudar_telefone"><i class="editar material-icons text-warning">edit</i>Editar</a></td>
					</tr>

					<tr>
						<td>E-mail</td>
						<td>'.$m[0]["email"].'</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td class="text-right"><a href="#" data-toggle="modal" data-target="#mudar_email"><i class="editar material-icons text-warning">edit</i>Editar</a></td>
					</tr>

					<tr>
						<td colspan="6">Senha</td>
						<td class="text-right"><a href="#" data-toggle="modal" data-target="#mudar_senha"><i class="editar material-icons text-warning">edit</i>Editar</a></td>
					</tr>
				</tbody>
			</table>
		</div>	
	</div>	

	<!-- foto -->
	<div class="modal fade" id="mudar_foto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>

	      <form method="post" action="insere.php?tabela='.$banco.'&mudarFoto" enctype="multipart/form-data">
		      <div class="modal-body">
		       		<input type="file" required="required" name="foto" required="required" class="form-control"/><br>
		       		<div class="text-center">
		       			<a class="btn btn-danger" href="insere.php?mudarFoto&removerFoto&tabela='.$banco.'">Remover Foto</a>
		       		</div>
		      </div>

		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
		        <button class="btn btn-primary">Salvar mudanças</button>
		      </div>
	      </form>
	    </div>
	  </div>
	</div>

	<!-- nome -->
	<div class="modal fade" id="mudar_nome" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>

	      <form>
		      <div class="modal-body">
		       		<input type="text" required="required" name="nome" required="required" placeholder="Insira o novo nome" class="form-control"/>
		      </div>

		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
		        <button type="button" id="btn_mudar_nome" class="btn btn-primary">Salvar mudanças</button>
		      </div>
	      </form>
	    </div>
	  </div>
	</div>

	<!-- endereco -->
	<div class="modal fade" id="mudar_endereco" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>

	      <form>
		      <div class="modal-body">
		       		<input type="text" required="required" name="endereco" required="required" placeholder="Insira o novo endereço" class="form-control"/>
		      </div>

		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
		        <button type="button" id="btn_mudar_endereco" class="btn btn-primary">Salvar mudanças</button>
		      </div>
	      </form>
	    </div>
	  </div>
	</div>

	<!-- telefone -->
	<div class="modal fade" id="mudar_telefone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>

	    	<form>
		      <div class="modal-body">
		       		<input type="text" required="required" name="telefone" required="required" placeholder="Insira o novo telefone" class="form-control telefone"/>
		      </div>

		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
		        <button type="button" id="btn_mudar_telefone" class="btn btn-primary">Salvar mudanças</button>
		      </div>
	      </form>
	    </div>
	  </div>
	</div>

	<!-- email -->
	<div class="modal fade" id="mudar_email" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>

	     <form>
		      <div class="modal-body">
		       		<input type="email" required="required" name="email" required="required" placeholder="Insira o novo e-mail" class="form-control"/>
		      </div>

		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
		        <button type="button" id="btn_mudar_email" class="btn btn-primary">Salvar mudanças</button>
		      </div>
	      </form>
	    </div>
	  </div>
	</div>

	<!-- senha -->
	<div class="modal fade" id="mudar_senha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>

	     <form>
		      <div class="modal-body">

		      		<input type="password" required="required" name="senha_atual" required="required" placeholder="Insira sua senha atual" class="form-control" data-cript="md5, sha1"/><br>

		       		<input type="password" required="required" name="nova_senha1" required="required" placeholder="Insira a nova senha" class="form-control" data-cript="md5, sha1"/><br>

		       		<input type="password" required="required" name="nova_senha2" required="required" placeholder="Digite novamente" class="form-control" data-cript="md5, sha1"/><br>

		       		<input type="hidden" name="id" value="'.$_SESSION["usuario"]->get_id().'"/>
		      </div>

		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
		        <button type="button" id="btn_mudar_senha" class="btn btn-primary">Salvar mudanças</button>
		      </div>
	      </form>
	    </div>
	  </div>
	</div>';
	
	include("../VIEW/classeRodape.php");
?>

<script src="../js/mudar_dados.js"></script>
