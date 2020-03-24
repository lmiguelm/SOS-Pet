<?php
	
	class Card{

		private $img;
		private $logotipo;
		private $title;
		private $texto;
		private $link;
		private $tamanho;

		public function __construct($parametros){

			$this->img=$parametros["img"];
			$this->logotipo=$parametros["logotipo"];
			$this->title=$parametros["title"];
			$this->link=$parametros["link"];
			$this->tamanho=$parametros["tamanho"];

			if(isset($parametros["texto"])){
				$this->texto=$parametros["texto"];
			}

			if(isset($parametros["classe_button"])){

				$this->classe_button=$parametros["classe_button"];
			}
			else{
				$this->classe_button='btn btn-primary';
			}
		}

		public function exibe(){

			echo 
			'	<a href="'.$this->link.'">
					<div class="col-sm-'.$this->tamanho.' col-xs-'.$this->tamanho.' col-md-'.$this->tamanho.'">
						<div class="card" style="width: 20rem;">
							<div class="zoom">
						 		<img src="'.$this->img.'" class="card-img-top" alt="'.$this->logotipo.'">
						 	</div>
				</a>
						 	<div class="card-body">
						    <h5 class="card-title">'.$this->title.'</h5>
						';if($this->texto!=null){
							echo' <p card-text">
						    		'.$this->texto.'
						    	</p>';
						}echo'
						   
						   
						  </div>
						</div>
					</div>
			';
		}
	}
?>