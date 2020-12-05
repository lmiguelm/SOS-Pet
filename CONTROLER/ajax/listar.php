<?php

    include("../../MODEL/classeUsuario.php");
    session_start();
    header('Access-Control-Allow-Origin: *');
    header("Content-Type: application/json; charset=UTF-8");

    //paginação...
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


    //conectando ao bd.
    $host = "localhost";
    $db   = "sospet";
    $user = "root";
    $pass = "";
    $conn = new mysqli($host, $user, $pass, $db); 
    $conn->set_charset("utf8");

    
    //recendo a tabela para fazer o select.
    $tabela=$_GET["tabela"];
    $id_usuario=$_SESSION["usuario"]->get_id();

    
    if ($tabela=='meus_animais') {
        $sql="SELECT * FROM animal";
    }else{
        $sql="SELECT * FROM $tabela";
    }

    $cont=false;

    if(($tabela=="adocao") && (isset($_GET["tipo"]) || isset($_GET["sexo"]) || isset($_GET["porte"]) || isset($_GET["nome"]))){
       
        $tipo=$_GET["tipo"];
        $sexo=$_GET["sexo"];
        $porte=$_GET["porte"];
        $nome=$_GET["nome"];
        $id_usuario=$_SESSION["usuario"]->get_id();

        
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
    elseif(($tabela=="animal") && (isset($_GET["sexo"]) || isset($_GET["id"]) || isset($_GET["tipo"]) || isset($_GET["nome"]) ||  isset($_GET["status"]))){
        
        $sexo=$_GET["sexo"];
        $id=$_GET["id"];
        $tipo=$_GET["tipo"];
        $nome=$_GET["nome"];
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
    elseif(($tabela=="resgatado") && (isset($_GET["id"]) || isset($_GET["tipo"]))){

        $id=$_GET["id"];
        $tipo=$_GET["tipo"];
      
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
    elseif(($tabela=="desaparecido") && (isset($_GET["sexo"]) || isset($_GET["data"]) || isset($_GET["tipo"]) || isset($_GET["nome"]))){

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
    elseif(($tabela=="abandonado") && (isset($_GET["id"]) || isset($_GET["tipo"]) || isset($_GET["endereco"]))){

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
    elseif(($tabela=='usuario') && isset($_GET["endereco"]) || isset($_GET["sexo"]) || isset($_GET["id"]) || isset($_GET["nome"]) || isset($_GET["telefone"])) {
        
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
    elseif(($tabela=='voluntario') && (isset($_GET["endereco"]) || isset($_GET["sexo"]) || isset($_GET["id"]) || isset($_GET["nome"]) || isset($_GET["telefone"]) || isset($_GET["cpf"]))) {

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
    elseif(($tabela=="meus_animais") && (isset($_GET["nome"]) || isset($_GET["tipo"]) || isset($_GET["sexo"]))){

        $nome=$_GET["nome"];
        $tipo=$_GET["tipo"];
        $sexo=$_GET["sexo"];
       
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
            $sql.=" AND (cod_usuario_anuncia=$id_usuario OR cod_usuario_adota=$id_usuario OR (cod_usuario_cadastra=$id_usuario && status='Adoção'))";
        }else{
             $sql.=" WHERE (cod_usuario_anuncia=$id_usuario OR cod_usuario_adota=$id_usuario OR (cod_usuario_cadastra=$id_usuario && status='Adoção'))";
        }
    }
    if ($cont==false && $tabela=='adocao') {
        $sql.=" WHERE cod_usuario_cadastra!=$id_usuario";
        $cont=true;
    }
    // }elseif($cont==true && $tabela='adocao'){
    //     $sql.=" AND  cod_usuario_cadastra!=$id_usuario";
    // }
    if($tabela!='meus_animais') {
        $sql.=" LIMIT $offset, $linhasPorPagina";
    }else{
        
        if ($cont==false) {
            $sql.=" WHERE (cod_usuario_anuncia=$id_usuario OR cod_usuario_adota=$id_usuario OR (cod_usuario_cadastra=$id_usuario && status='Adoção'))";
            $cont=true;
        }else{
            $sql.=" AND (cod_usuario_anuncia=$id_usuario OR cod_usuario_adota=$id_usuario OR (cod_usuario_cadastra=$id_usuario && status='Adoção'))";
        }
    }
    // print $sql;
    $result = $conn->query($sql);
    $outp = array();
    $outp = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($outp);
    $conn->close();   
?>