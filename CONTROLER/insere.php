<?php
	include("../VIEW/classeCabecalho.php");
  include("../MODEL/classeBancoDeDados.php");
		
	$operacao = new BancoDeDados($conexao);	

  if (isset($_GET["MudarDados"])) {
      
      $id=$_POST["id"];
      unset($_POST["id"]);

      $operacao->alterar($_POST, "usuario", $id);

      die();
  }
  
  //BAIXAR AS IMAGENS NOS DIRETORIOS
	if (isset($_FILES["foto"])) {
	       
       $extensao=strtolower(substr($_FILES['foto']['name'], -4));
       $novo_nome=md5(time()).$extensao;
       
       switch($_GET["tabela"]){

       		case'animal': $diretorio="../img/animais/";
       						break;

       		case'voluntario': $diretorio="../img/voluntarios/";
       						break;

       		case'usuario': $diretorio="../img/usuarios/";
       						break;
      }

      move_uploaded_file($_FILES["foto"]["tmp_name"], $diretorio.$novo_nome);

      $_POST["foto"]=$novo_nome;
    }


    //MUDAR FOTO
    if (isset($_GET["mudarFoto"])) {

      $host = "localhost";
      $db = "sospet";
      $user = "root";
      $pass = "usbw";

      $conn = new mysqli($host, $user, $pass, $db);
      $conn->set_charset("utf8");

      $id=$_SESSION["usuario"]->get_id();


      if($_SESSION["usuario"]->get_permissao()==0){
          $tabela="usuario";
      }else{
          $tabela="voluntario";
      }

      if(isset($_GET["removerFoto"])){
  

        $sql="SELECT*FROM $tabela WHERE id_$tabela=$id";
        $result = $conn->query($sql);

        $output = array();
        $output = $result->fetch_all(MYSQLI_ASSOC);

        if($output[0]['foto']!="sem_foto.png"){
          unlink('../img/'.$tabela.'s/'.$output[0]['foto']);
        }

        $sql="UPDATE $tabela SET foto='sem_foto.png' WHERE id_$tabela=$id";
        $result = $conn->query($sql);

        die(header("location: meus_dados.php"));
      }

      
      $sql="SELECT*FROM $tabela WHERE id_$tabela=$id";

      $result = $conn->query($sql);

      $output = array();
      $output = $result->fetch_all(MYSQLI_ASSOC);
  
      if($output[0]['foto']!="sem_foto.png"){
          unlink('../img/'.$tabela.'s/'.$output[0]['foto']);
      }

      $operacao->alterar($_POST, $_GET["tabela"], $_SESSION["usuario"]->get_id());
      die(header("location: meus_dados.php"));
  
    }

    $operacao->insercao($_GET["tabela"],$_POST);
   

    if($_GET["tabela"]=='usuario' && isset($_GET["admin"])){

      header("location: form_usuario.php?sucesso_usuario");
    }
    elseif($_GET["tabela"]=='animal' && isset($_GET["abandonado"])){

       header("location: index.php?sucesso_abandonado#abandonado");
    }
    elseif($_GET["tabela"]=='animal' && isset($_GET["adocao"])){

         header("location: listar_animais_adocao.php?sucesso_cadastra_adocao");
    }
    elseif($_GET["tabela"]=='animal' && isset($_GET["perdido"])){

        header("location: listar_desaparecidos.php?sucesso_anuncio");
    }
    elseif($_GET["tabela"]=='voluntario'){

      header("location: form_voluntario.php?sucesso_voluntario");
    }
    else{
      header("location: index.php");
    }
   
?>
