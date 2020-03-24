<?php

	include("../VIEW/classeCabecalho.php");
	$c->exibe_menu();
	include("../VIEW/classeForm.php");
	include("../MODEL/classeBancoDeDados.php");

	$op = new BancoDeDados($conexao);

	if (!empty($_POST)) {
		$email=$_POST["email"];
		$codigo_alteracao=$_POST["codigo_alteracao"];
	}
	else{
		$email=$_GET["email"];
		$codigo_alteracao=$_GET["codigo_alteracao"];
	}
	
	$tabela[]="usuario";
	$coluna[]="id_usuario as id";
	$condicao[] = "email='$email'";
	$condicao[] = "codigo_alteracao='$codigo_alteracao'";
	$ordenacao="";

	$m = $op->select($tabela,$coluna,$condicao,$ordenacao);
	
	if($m!=null){

		if(!empty($_POST)){
			$id=$m[0]["id"];
			$valores=array("senha"=>$_POST['senha'], "codigo_alteracao"=>"");
			$op->alterar($valores, 'cliente', $id);
			header("location: form_login.php?SenhaAlterada")
			
		}
		else{
			$parametros["action"] = 'resetar_senha.php';
			$parametros["method"] = "post";
			$f = new Form($parametros);

			$parametros=null;
			$parametros["name"]="senha";
			$parametros["type"]="password";
			$parametros["class"]="form-control password";
			$parametros["data_cript"]="md5, sh1";
			$parametros["required"]="required";
			$parametros["placeholder"]="Nova senha";
			$f->add_input($parametros);

			$parametros=null;
			$parametros["name"]="senha";
			$parametros["type"]="password";
			$parametros["class"]="form-control password";
			$parametros["data_cript"]="md5, sha1";
			$parametros["required"]="required";
			$parametros["placeholder"]="Digite novamente";
			$f->add_input($parametros);

			$parametros=null;
			$parametros["name"]="email";
			$parametros["type"]="hidden";
			$parametros["value"]=$_GET["email"];
			$f->add_input($parametros);

			$parametros=null;
			$parametros["name"]="codigo_alteracao";
			$parametros["type"]="hidden";
			$parametros["value"]=$_GET["codigo_alteracao"];
			$f->add_input($parametros);

			$parametros=null;
			$parametros["label"]="Alterar senha";
			$parametros["class"]="btn btn-success";
			$f->add_button($parametros);

			$f->exibe();
		}
	}
	include("../VIEW/classeRodape.php");
?>
