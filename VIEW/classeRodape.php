<?php
	class Rodape{

		private $scripts;
		
		public function __construct($parametros){
			
			$this->scripts = $parametros["scripts"];
			
		}
		
		public function exibe(){

			echo
			'
				<br/><br/><br/>

				
				<div class="container-fluid rodape" id="container-rodape" ><br>
					<div class="container">
						<div class="row zoom">
							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
								<a href="#index" class="logotipo scroll2" id="index">
						 			<img src="../img/site/icone.png"class="d-inline-block align-top" alt="Logotipo"/>
						 			<b>SOS Pet</b>
							 	</a>
							</div>

							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
								<p>&reg; Copyright 2019 Instituto Federal</p>
							</div>

							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
								<p>Contato: sospet@gmail.com</p>
							</div>
						</div>
					</div>
				<div>
			';
				
			foreach($this->scripts as $i=>$s){
				echo "<script type='text/javascript' src='$s'></script>";
			}
			echo "</body>
				</html>";	
		}
	}
	$parametros=null;
	$parametros["scripts"][] ="../js/jquery-3.3.1.min.js";
	$parametros["scripts"][] ="../js/bootstrap.min.js";
	$parametros["scripts"][] ="../js/jquery.mask.js";
	$parametros["scripts"][] ="../js/validaform.min.js";
	$parametros["scripts"][] ="../js/jquery.validate.min.js";
	$parametros["scripts"][] ="../js/messages_pt_BR.js";
	$parametros["scripts"][] ="../js/sospet.js";
	$parametros["scripts"][] ="../js/animacao.js";

	$r=New Rodape($parametros);
	$r->exibe();
?>


	