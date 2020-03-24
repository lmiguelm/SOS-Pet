<?php
	class ValidacaoUsuario{
		
		private $conexao;
		private $email;
		private $senha;
		
		public function __construct($conexao,$valores){
			$this->conexao=$conexao;
			$this->email=$valores["email"];
			$this->senha=$valores["senha"];			
		}
		
		public function validar(){
			$consulta = "SELECT * FROM usuario WHERE email=:email AND senha=:senha";
			
			$stmt = $this->conexao->prepare($consulta);
			$stmt->bindValue(":email",$this->email);
			$stmt->bindValue(":senha",$this->senha);
			$stmt->execute();
			
			if($stmt->rowCount()==1){
				$linha = $stmt->fetch();
				$_SESSION["usuario"] = new Usuario($linha);
				if (isset($_GET["id"])) {
					$id=$_GET["id"];
					die(header("location: listar_animais_adocao.php?id=$id#form_adocao"));
				}

				die(header("location: index.php"));
				
			}

			$consulta = "SELECT * FROM voluntario WHERE email=:email AND senha=:senha";
			
			$stmt = $this->conexao->prepare($consulta);
			$stmt->bindValue(":email",$this->email);
			$stmt->bindValue(":senha",$this->senha);
			$stmt->execute();
			
			if($stmt->rowCount()==1){
				
				$linha = $stmt->fetch();
				$_SESSION["usuario"] = new Usuario($linha);
				header("location: index.php");
			}
			else{
				header("location: index.php?erro#conta");
			}
		}
		
	}


?>