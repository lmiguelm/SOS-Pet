
<div id="parallax-image8">
	
	<div class="col-xs-6 col-sm-6  col-md-6  text-center" data-anime="left">
		<h1 id='abandonado' style="font-size: 50px;">Encontrou um animal abandonado?</h1>
	</div>

	<div class="col-xs-6 col-sm-6  col-md-6" data-anime="right"><br><br><br>
		<div class="container">
	        <p>
	           De acordo com a Organização Mundial da Saúde, há cerca de 30 milhões de animais abandonados no Brasil. Destes, 20 milhões são cachorros, enquanto 10 milhões são gatos. Para você ter ideia, em 2010, o continente inteiro da Oceania tinha cerca de 36 milhões de pessoas. E isso são números referentes a 2014, é muito provável que a situação esteja até pior.
	        </p>
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

