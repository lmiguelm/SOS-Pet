<?php
	include("../MODEL/classeUsuario.php");
	include("interfaceExibicao.php");
	class Cabecalho{

		private $charset;
		private $title;
		private $links;
		private $icone;
	

		public function __construct($parametros){

			$this->charset=$parametros["charset"];
			$this->title=$parametros["title"];
			if(isset($parametros["links"])){
				$this->links=$parametros["links"];
			}
			if(isset($parametros["icone"])){
				$this->icone=$parametros["icone"];
			}
		}

		public function exibe(){
			session_start();
			echo
			"
				<!DOCTYPE html>
					<html lang='pt-BR'>
						<head>
							<meta name='viewport' content='width=device-width, initial-scale=1' />

							<meta charset='$this->charset' />

							<title>$this->title</title>";

							if($this->links!=null){
								foreach($this->links as $i=>$l){
									echo "<link rel='stylesheet' href='$l' />";
								}
							}			 
							if($this->icone!=null){
									
								echo "<link rel='icon' type='image/png' href='$this->icone'/>";
								
							}	


				echo"	</head>

						<body id='index'>
					</html>
			";
		}

		public function exibe_menu(){

			if (!isset($_SESSION["usuario"])) {
			    	
			    	echo
			    	'
			    		<div id="parallax-image">
							<div class="col-md-12 align-self-center">
								

								<p class="text-center">
									<a class="btn btn-success scroll" href="index.php?#conta">Cadastre-se</a>
								</p>
								
							</div>
						</div>
			    	';

			    }else{

			    	echo
			    	'
			    		<div id="parallax-image">
							<div class="col-md-12 align-self-center">
								<div class="text-center zoom">
									<img src="../img/site/icone.png"class="d-inline-block align-top zoom" height="150px" alt="Logotipo"/>
								</div>

								<h1 class="text-center" style="color:black"><b>SOS Pet</b></h1>
							</div>
						</div>	
			    	';	
			    }
		}

		public function exibe_links(){

			echo
			'
				<nav class="navbar navbar-expand-lg navbar-dark scrolling-navbar fixed-top" style="background-color: #4682B4">
		       			
						<a href="#index" class="navbar-brand logotipo scroll2 zoom" >
					 			<img src="../img/site/icone.png"class="d-inline-block align-top" alt="Logotipo"/>
					 			<b>SOS Pet</b>
					 	</a>

			       		<div class="container ">
			       			<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menu">
						        <span class="navbar-toggler-icon"></span>
						    </button>

						    <div class="collapse navbar-collapse" id="menu">
					            
					            <ul class="navbar-nav mr-auto">

					            	<li class="nav-item ">
					            		<a class="nav-link" href="index.php"><b>Home</b></a>
					            	</li>

					            	<li class="nav-item">
					            		<a class="nav-link scroll" href="index.php#adocao">Adoções</a>
					            	</li>

					            	<li class="nav-item">
					            		<a class="nav-link scroll" href="index.php#abandonado">Abandonados</a>
					            	</li>

					            	<li class="nav-item">
					            		<a class="nav-link scroll" href="index.php#desaparecido">Desaparecidos</a>
					            	</li>';
					           
					       			if(isset($_SESSION["usuario"])){
					            		
					            		if ($_SESSION["usuario"]->get_permissao()==2) {
					            			
					            			echo
					            			'
					            				<li class="nav-item">
								            		<a class="nav-link" href="form_voluntario.php">Voluntarios</a>
								            	</li>

								            	<li class="nav-item">
								            		<a class="nav-link" href="form_usuario.php">Usuarios</a>
								            	</li>

								            	<li class="nav-item">
								            		<a class="nav-link" href="listar_animais.php">Animais</a>
								            	</li>
								            	
					            			';
					            		}elseif($_SESSION["usuario"]->get_permissao()==1){

					            			echo
					            			'
					            				<li class="nav-item">
								            		<a class="nav-link" href="resgatar_abandonado.php">Resgatar</a>
								            	</li>
								            	<li class="nav-item">
					            					<a class="nav-link" href="colocar_adocao.php">Colocar_Adoção</a>
					            				</li>
					            			';

					            		}
					            		else{
					            			echo'
						            		<li class="nav-item">
							            		<a class="nav-link scroll" href="index.php#duvidas">Dúvidas</a>
							            	</li>

							            	<li class="nav-item">
							            		<a class="nav-link scroll" href="index.php#doacao">Doação</a>
							            	</li>

						            		<li class="nav-item">
								            	<a class="nav-link scroll" href="index.php#contato">Contato</a>
								            </li>';
					            		}

					          
					            		
					            	}else{
					            		echo'
					            		<li class="nav-item">
						            		<a class="nav-link scroll" href="index.php#duvidas">Dúvidas</a>
						            	</li>

						            	<li class="nav-item">
						            		<a class="nav-link scroll" href="index.php#doacao">Doação</a>
						            	</li>

					            		<li class="nav-item">
							            	<a class="nav-link scroll" href="index.php#contato">Contato</a>
							            </li>';
					            	}

					            	echo'
					            	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					            	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					            	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					            	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					            	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					            	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;             
			';


			if (isset($_SESSION["usuario"])) {

						
				echo'<div class="dropdown">
					  <a class="btn btn-primary dropdown-toggle logotipo" href="#" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >';
						
					$host = "localhost";
				    $db = "sospet";
				    $user = "root";
				    $pass = "usbw";

				    $conn = new mysqli($host, $user, $pass, $db);
    				$conn->set_charset("utf8");


					  if($_SESSION["usuario"]->get_permissao()==0 ){

					  		$sql='SELECT*FROM usuario WHERE id_usuario='.$_SESSION['usuario']->get_id().'';

					  		$result = $conn->query($sql);

					  		$output = array();
    						$output = $result->fetch_all(MYSQLI_ASSOC);
    						
							echo'<img src="../img/usuarios/'.$output[0]["foto"].'" class="d-inline-block align-top" alt="Logotipo"/>
							'.$output[0]["nome"].'';
					  }
					  else{

					  	$sql='SELECT*FROM voluntario WHERE id_voluntario='.$_SESSION['usuario']->get_id().'';

				  		$result = $conn->query($sql);

				  		$output = array();
						$output = $result->fetch_all(MYSQLI_ASSOC);

					  	echo'<img src="../img/voluntarios/'.$output[0]["foto"].'" class="d-inline-block align-top" alt="Logotipo"/>
							'.$output[0]["nome"].'';
					  }
					  echo' 
					  </a>
					  <div class="dropdown-menu" aria-labelledby="dropdownMenu2" >
					    <a href="meus_dados.php#meus_dados" class="dropdown-item">Meus dados</a>
					    ';if($_SESSION["usuario"]->get_permissao()==0){
					    	echo'	<a href="meus_animais.php" class="dropdown-item" >Meus animais</a>';
					    }
					   echo' <hr>
					    <a href="logout.php" class="dropdown-item">Sair</a>
					  </div>
					</div>';
								

			}
			else{
				echo' 
				<a  class="btn btn-info scroll" href="index.php#conta" style="border-radius: 15px">Entrar</a>

				';
			}

			    echo'</ul>
		    		  </div>
		       		</div>
			    </nav>';		

			    

				


			    echo'
				<div class="btn_voltar jbtn_voltar">
					<a href="" class="btn_voltar_link jbtn_voltar_link" title="Voltar para o topo">
						<i class="material-icons">arrow_upward</i>
					</a>
				</div>';
		}
	}


	$parametros["charset"]="utf-8";
	$parametros["links"][] = "../css/bootstrap.min.css";
	$parametros["links"][] = "../css/estilos.css";
	$parametros["links"][] = "https://fonts.googleapis.com/icon?family=Material+Icons";
	$parametros["icone"] = "../img/site/icone.png";
	
	$parametros["title"]="SOS Pet";
	$c=new Cabecalho($parametros);
	$c->exibe();	
	$c->exibe_links();	
?>