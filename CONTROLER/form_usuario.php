<?php

	include("../VIEW/classeCabecalho.php");
	include("autenticacao/autenticacao.php");
	include("autenticacao/autenticacao_admin.php");
	include("../VIEW/classeForm.php");
	include("../MODEL/classeBancoDeDados.php");


    $parametros=null;
    $parametros["action"]="insere.php?tabela=usuario&admin";
    $parametros["method"]="POST";
    $parametros["modal"]=true;
    $parametros["reset"]=true;
    $f=new Form($parametros);

    $parametros=null;
    $parametros["name"]="nome";
    $parametros["type"]="text";
    $parametros["class"]="form-control";
    $parametros["required"]="required";
    $parametros["placeholder"]="Nome";
    $f->add_input($parametros);

    $parametros=null;
    $vetor=null;
    $vetor[] = array("value"=>"Masculino","label"=>"Masculino");
    $vetor[] = array("value"=>"Feminino","label"=>"Feminino");
    $parametros["name"] = "sexo";
    $parametros["class"] = "form-control";
    $f->add_select($parametros,$vetor);

    $parametros=null;
    $parametros["name"]="telefone";
    $parametros["type"]="text";
    $parametros["class"]="form-control telefone";
    $parametros["required"]="required";
    $parametros["placeholder"]="Telefone";
    $f->add_input($parametros);

    $parametros=null;
    $parametros["name"]="endereco";
    $parametros["type"]="text";
    $parametros["class"]="form-control";
    $parametros["required"]="required";
    $parametros["placeholder"]="Endereço";
    $f->add_input($parametros);

    $parametros=null;
    $parametros["name"]="email";
    $parametros["type"]="text";
    $parametros["class"]="form-control";
    $parametros["required"]="required";
    $parametros["placeholder"]="E-mail";
    $f->add_input($parametros);

    $parametros=null;
    $parametros["name"]="senha";
    $parametros["type"]="password";
    $parametros["class"]="form-control";
    $parametros["data_cript"]="md5, sha1";
    $parametros["required"]="required";
    $parametros["placeholder"]="Senha";
    $f->add_input($parametros);

    $parametros["modal_title"]="Novo usuário";
    $parametros["btn_title"]="Cadastrar Usuário";
    $parametros["btn"]="btn btn-danger";
    $m=new Modal($f, $parametros);

?>
	<br><br><br><br>
	<div class="col-xs-12 col-sm-10 offset-sm-1 col-md-10 offset-md-1">

		<div id="parallax-image333">
             <?php
                 $m->exibe();
            ?><br>
        <h1 class="text-center" id="listar_animais_adocao">Usuários Cadastrados</h1><br><br>

        <div class="col-xs-12 col-sm-10 offset-sm-1 col-md-10 offset-md-1">
            <form>
                
                <table class="table table-hover">
                    <tr>
                        <td>Sexo:</td>
                        <td>
                            <input class="form-check-input" name="sexo" type="radio" id="Masculino" value="Masculino"> 
                            <label class="form-check-label" for="Masculino">Masculino</label>
                        </td>
                        <td>
                            <input class="form-check-input" name="sexo" type="radio" id="Feminino" value="Feminino">
                            <label class="form-check-label" for="Feminino">Feminino</label>
                        </td>

                        <td></td>    
                    </tr>

                    <tr>
                        <td for="id_b">ID:</td>
                        <td colspan="3"><input type="text" name="id_b" id="id_b" class="form-control form-control-sm"></td>
                    </tr>

                    <tr>
                        <td for="nome_b">Nome:</td>
                        <td colspan="3"><input type="text" name="nome_b" id="nome_b" class="form-control form-control-sm"></td>
                    </tr>

                    <tr>
                        <td for="telefone_b">Telefone:</td>
                        <td colspan="3"><input type="text" name="telefone_b" id="telefone_b" class="form-control form-control-sm telefone"></td>
                    </tr>

                    <tr>
                        <td for="endereco_b">Endereco:</td>
                        <td colspan="3"><input type="text" name="endereco_b" id="endereco_b" class="form-control form-control-sm"></td>
                    </tr>

                    <tr>
                       <td colspan="4" class="text-center"><br>
                            <button type="reset" id="btn_apagar_busca" value="resetar"  class="btn btn-danger">Apagar</button>
                            <button type="button" id="btn_busca" value="buscar" class="btn btn-success">Buscar</button>
                        </td> 
                    </tr>
                </table>

            </form>
        </div>
        <span id="comentarios" class="text-center"></span>
    </div>

    <div class="row exibir_card_usuarios text-center" id="usuarios">
        
    </div>
    <br>
    <ul class="pagination justify-content-center"></ul>


     
</div>
<?php
	include("../VIEW/classeRodape.php");

    if (isset($_GET["sucesso_usuario"])) {
        echo 
        "
            <script>
                 $(document).ready(function(){
                     alert('Usuário cadastrado com sucesso!')
                })
            </script>
        ";
    }
?>
<script src="../js/usuarios.js"></script>
