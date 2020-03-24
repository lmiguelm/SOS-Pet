<?php
		
	include("classeInputOpcoes.php");
	include("classeSelect.php");
	include("classeButton.php");
	include("classeLabel.php");
	include("classeModal.php");

	class Form implements Exibicao{
		
		private $action;
		private $method;		
		public $entradas;
		private $reset;
		private $nome_submit;
		private $modal;
		private $enctype;
		private $id;
		private $type;
		private $id_button;
		
		public function __construct($parametros){
			
			$this->action = $parametros["action"];
			$this->method = $parametros["method"];

			if (isset($parametros["id"])) {
				$this->id = $parametros["id"];
			}
			if (isset($parametros["enctype"])) {
				$this->enctype = true;
			}
			else{
				$this->enctype = false;
			}

			if(isset($parametros["reset"])){
				$this->reset=$parametros["reset"];
			}

			if(isset($parametros["nome_submit"])){
				$this->nome_submit=$parametros["nome_submit"];
			}
			else{
				$this->nome_submit = "Enviar";
			}

			if(isset($parametros["modal"])){
				$this->modal=true;
			}	
			else{
				$this->modal=false;
			}

			if(isset($parametros["type"])){
				$this->type=$parametros["type"];
			}
			else{
				$this->type="submit";
			}

			if(isset($parametros["id_button"])){
				$this->id_button=$parametros["id_button"];
			}
			
		}

		public function add_button($parametros){
			$this->entradas[] = new Button($parametros);
		}
		
		public function add_input($parametros){
			$this->entradas[] = new Input($parametros);
		}
		
		public function add_inputOpcoes($parametros){
			$this->entradas[] = new InputOpcoes($parametros);
		}		
		
		public function add_select($parametros,$vetor_options){
			$this->entradas[] = new Select($parametros,$vetor_options);
		}

		public function add_label($parametros)
		{
			$this->entradas[] = new Label($parametros);
		}

		public function add_textarea($parametros)
		{
			$this->entradas[] = new Textarea($parametros);
		}
			
		public function exibe(){

			if($this->modal){

				echo "
				<div class='form-group'>";

				echo"<form method='$this->method' action='$this->action'";

				if($this->enctype){
					echo 'enctype="multipart/form-data"';
				}

				if($this->id){
					echo "id='$this->id'";
				}
				echo "/>";			
				
				if($this->entradas!=null)
				foreach($this->entradas as $i=>$e){				
					echo '<div class="row">
	                        <div class="form-group col-sm-12 col-xs-12">';
					$e->exibe();
					echo "</div></div>";
				}
					
				
				echo "
				
					<div class='text-center'>";

						if($this->reset!=null){
							echo "<hr/><button type='reset' class='btn btn-secondary'>Apagar</button>&nbsp;&nbsp;&nbsp;&nbsp;";
						}	
						
						echo "<button type='$this->type'";

						if($this->id_button){
							echo "id='$this->id_button'";
						}
						echo "class='btn btn-primary'>$this->nome_submit</button>
						
					</div>
					
					</form>
				
				</div>";
			}
			else{

				echo "
				<div class='login-form col-xs-10 offset-xs-1 col-sm-6 offset-sm-3 col-md-4 offset-md-4'>
					<form method='$this->method' action='$this->action'";

					if($this->id){
						echo "id='$this->id'";
					}
					echo">";
						
						foreach($this->entradas as $i=>$e){
							echo "<div class='form-group'>";
								$e->exibe();
							echo "</div>";
						}	
				echo "</form>
				</div>";
			}		
		}
	}
?>