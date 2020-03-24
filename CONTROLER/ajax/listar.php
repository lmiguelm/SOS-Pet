<?php
    include("../../MODEL/classeUsuario.php");
    session_start();
    header('Access-Control-Allow-Origin: *');
    header("Content-Type: application/json; charset=UTF-8");

   
    if (isset($_GET['linhasPorPagina']) && is_numeric($_GET['linhasPorPagina'])) {
        $linhasPorPagina = (int) $_GET['linhasPorPagina'];
    } else {
        $linhasPorPagina = 8;  
    }

    if (isset($_GET['paginaAtual'])) {
        $paginaAtual = (int) $_GET['paginaAtual'];
    } else {
        $paginaAtual = 1; 
    }

    $offset = ($paginaAtual - 1) * $linhasPorPagina;

   
    $host = "localhost";
    $db   = "sospet";
    $user = "root";
    $pass = "usbw";
    $conn = new mysqli($host, $user, $pass, $db); 
    $conn->set_charset("utf8");

    $cont=false;

    $tabela=$_GET["tabela"];

    if ($tabela=='meus_animais') {
        $sql="SELECT * FROM animal";
    }else{
        $sql="SELECT * FROM $tabela";
    }

    if($tabela=="adocao"){

        $tipo=$_GET["tipo"];
        $sexo=$_GET["sexo"];
        $porte=$_GET["porte"];
        $nome=$_GET["nome"];


        if($sexo!=null){
            $sql.=" WHERE sexo LIKE '%$sexo%'";
            $cont=true;
        }
        if($tipo!=null){
            if ($cont==false) {
                $sql.=" WHERE tipo LIKE '%$tipo%'";
                $cont=true;
            }else{
                $sql.=" AND tipo LIKE '%$tipo%'";
            }
            
        }
        if($porte!=null){
            if ($cont==false) {
                 $sql.=" WHERE porte LIKE '%$porte%'";
                 $cont=true;
            }else{
                $sql.=" AND porte LIKE '%$porte%'";
            }
        }
        if($nome!=null){
            if ($cont==false) {
                $sql.=" WHERE nome LIKE '%$nome%'";
                $cont=true;
            }else{
                $sql.=" AND nome LIKE '%$nome%'";
            }
        }
    }
    elseif($tabela=='animal') {
        
        $sexo=$_GET["sexo"];
        $id=$_GET["id"];
        $nome=$_GET["nome"];
        $tipo=$_GET["tipo"];
        $status=$_GET["status"];

        if($sexo!=null){
            $sql.=" WHERE sexo LIKE '%$sexo%'";
            $cont=true;
        }
        if($tipo!=null){
            if ($cont==false) {
                $sql.=" WHERE tipo LIKE '%$tipo%'";
                $cont=true;
            }else{
                $sql.=" AND tipo LIKE '%$tipo%'";
            }
            
        }
        if($nome!=null){
            if ($cont==false) {
                $sql.=" WHERE nome LIKE '%$nome%'";
                $cont=true;
            }else{
                $sql.=" AND nome LIKE '%$nome%'";
            }
        }
        if($id!=null){
            if ($cont==false) {
                $sql.=" WHERE id_animal LIKE '%$id%'";
                $cont=true;
            }else{
                $sql.=" AND id_animal LIKE '%$id%'";
            }
        }
         if($status!=null){
            if ($cont==false) {
                $sql.=" WHERE status LIKE '%$status%'";
                $cont=true;
            }else{
                $sql.=" AND status LIKE '%$status%'";
            }
        }
    }
    elseif ($tabela=='resgatado') {
        $tipo=$_GET["tipo"];
        $id=$_GET["id"];

         if($tipo!=null){
            $sql.=" WHERE tipo LIKE '%$tipo%'";
            $cont=true;
        }
        if($id!=null){
            if ($cont==false) {
                $sql.=" WHERE id_animal LIKE $id";
                $cont=true;
            }else{
                $sql.=" AND id_animal LIKE $id";
            }  
        }
        
    }
    elseif($tabela=='desaparecido'){
        $tipo=$_GET["tipo"];
        $sexo=$_GET["sexo"];
        $data=$_GET["data"];
        $nome=$_GET["nome"];

        if($sexo!=null){
            $sql.=" WHERE sexo LIKE '%$sexo%'";
            $cont=true;
        }
        if($tipo!=null){
            if ($cont==false) {
                $sql.=" WHERE tipo LIKE '%$tipo%'";
                $cont=true;
            }else{
                $sql.=" AND tipo LIKE '%$tipo%'";
            }
            
        }
        if($data!=null){
            if ($cont==false) {
                 $sql.=" WHERE data_desaparecido LIKE '%$data%'";
                 $cont=true;
            }else{
                $sql.=" AND data_desaparecido LIKE '%$data%'";
            }
        }
        if($nome!=null){
            if ($cont==false) {
                $sql.=" WHERE nome LIKE '%$nome%'";
                $cont=true;
            }else{
                $sql.=" AND nome LIKE '%$nome%'";
            }
        }
    }
    elseif ($tabela=='abandonado') {
       $tipo=$_GET["tipo"];
        $id=$_GET["id"];
        $endereco=$_GET["endereco"];

         if($id!=null){
            $sql.=" WHERE id_animal LIKE '%$id%'";
            $cont=true;
        }
        if($tipo!=null){
            if ($cont==false) {
                $sql.=" WHERE tipo LIKE '%$tipo%'";
                $cont=true;
            }else{
                $sql.=" AND tipo LIKE '%$tipo%'";
            }
            
        }
        if($endereco!=null){
            if ($cont==false) {
                 $sql.=" WHERE endereco_abandonado LIKE '%$endereco%'";
                 $cont=true;
            }else{
                $sql.=" AND endereco_abandonado LIKE '%$endereco%'";
            }
        }
    }
    elseif ($tabela=='usuario') {
        $endereco=$_GET["endereco"];
        $sexo=$_GET["sexo"];
        $id=$_GET["id"];
        $nome=$_GET["nome"];
        $telefone=$_GET["telefone"];

         if($sexo!=null){
            $sql.=" WHERE sexo LIKE '%$sexo%'";
            $cont=true;
        }
        if($endereco!=null){
            if ($cont==false) {
                $sql.=" WHERE endereco LIKE '%$endereco%'";
                $cont=true;
            }else{
                $sql.=" AND endereco LIKE '%$endereco%'";
            }
            
        }
        if($telefone!=null){
            if ($cont==false) {
                 $sql.=" WHERE telefone LIKE '%$telefone%'";
                 $cont=true;
            }else{
                $sql.=" AND telefone LIKE '%$telefone%'";
            }
        }
        if($nome!=null){
            if ($cont==false) {
                $sql.=" WHERE nome LIKE '%$nome%'";
                $cont=true;
            }else{
                $sql.=" AND nome LIKE '%$nome%'";
            }
        }
        if($id!=null){
            if ($cont==false) {
                $sql.=" WHERE id_usuario LIKE '$id'";
                $cont=true;
            }else{
                $sql.=" AND id_usuario LIKE '$id'";
            }
        }
    }
    elseif ($tabela=='voluntario') {
        $endereco=$_GET["endereco"];
        $sexo=$_GET["sexo"];
        $id=$_GET["id"];
        $nome=$_GET["nome"];
        $telefone=$_GET["telefone"];
        $cpf=$_GET["cpf"];

        if($sexo!=1){
            $sql.=" WHERE sexo LIKE '%$sexo%'";
            $cont=true;
        }
        if($endereco!=null){
            if ($cont==false) {
                $sql.=" WHERE endereco LIKE '%$endereco%'";
                $cont=true;
            }else{
                $sql.=" AND endereco LIKE '%$endereco%'";
            }
            
        }
        if($telefone!=null){
            if ($cont==false) {
                 $sql.=" WHERE telefone LIKE '%$telefone%'";
                 $cont=true;
            }else{
                $sql.=" AND telefone LIKE '%$telefone%'";
            }
        }
        if($nome!=null){
            if ($cont==false) {
                $sql.=" WHERE nome LIKE '%$nome%'";
                $cont=true;
            }else{
                $sql.=" AND nome LIKE '%$nome%'";
            }
        }
        if($id!=null){
            if ($cont==false) {
                $sql.=" WHERE id_voluntario LIKE '$id'";
                $cont=true;
            }else{
                $sql.=" AND id_voluntario LIKE '$id'";
            }
        }
        if($cpf!=null){
            if ($cont==false) {
                $sql.=" WHERE cpf LIKE '%$cpf%'";
                $cont=true;
            }else{
                $sql.=" AND cpf LIKE '%$cpf%'";
            }
        }
        if ($cont==false) {
            $sql.=" WHERE id_voluntario!=1";
        }else{
            $sql.=" AND id_voluntario!=1";
        }

    }
    elseif ($tabela=='meus_animais') {
        $nome=$_GET["nome"];
        $tipo=$_GET["tipo"];
        $sexo=$_GET["sexo"];

        $id=$_SESSION["usuario"]->get_id();

        if($nome!=null){
            $sql.=" WHERE nome LIKE '%$nome%'";
            $cont=true;
        }
        if($tipo!=null){
            if ($cont==false) {
                $sql.=" WHERE tipo LIKE '%$tipo%'";
                $cont=true;
            }else{
                $sql.=" AND tipo LIKE '%$tipo%'";
            }
        }
        if($sexo!=null){
            if ($cont==false) {
                $sql.=" WHERE sexo LIKE '%$sexo%'";
                $cont=true;
            }else{
                $sql.=" AND sexo LIKE '%$sexo%'";
            }
        }
        if($cont==true){
            $sql.=" AND (cod_usuario_anuncia=$id OR cod_usuario_adota=$id OR (cod_usuario_cadastra=$id && status='Adoção'))";
        }else{
             $sql.=" WHERE (cod_usuario_anuncia=$id OR cod_usuario_adota=$id OR (cod_usuario_cadastra=$id && status='Adoção'))";
        }
    }

    if ($tabela!='meus_animais') {
        $sql.=" LIMIT $offset, $linhasPorPagina";
    }
    $result = $conn->query($sql);
    $outp = array();
    $outp = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($outp);
    $conn->close();   
?>