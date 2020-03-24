<?php

	class Usuario{
	
		private $id;
		private $nome;
		private $email;
		private $senha;
		private $permissao;
		private $endereco;
		private $telefone;
		private $foto;
		private $cpf;
		
		public function __construct($parametros){

			if(isset($parametros["id_usuario"])) {
				$this->id = $parametros["id_usuario"];
			}else{
				$this->id = $parametros["id_voluntario"];
			}
			
			if(isset($parametros["cpf"])) {
				$this->cpf = $parametros["cpf"];
			}

			$this->nome = $parametros["nome"];
			$this->endereco = $parametros["endereco"];
			$this->telefone = $parametros["telefone"];
			$this->email = $parametros["email"];
			$this->senha = $parametros["senha"];
			$this->permissao = $parametros["permissao"];			
			$this->foto = $parametros["foto"];			
		}
		
		public function get_nome(){
			return($this->nome);
		}
		public function get_cpf(){
			return($this->cpf);
		}
		public function get_permissao(){
			return($this->permissao);
		}
		public function get_id(){
			return($this->id);
		}
		public function get_email(){
			return($this->email);
		}
		public function get_endereco(){
			return($this->endereco);
		}
		public function get_telefone(){
			return($this->telefone);
		}
		public function get_foto(){
			return($this->foto);
		}
	}
?>