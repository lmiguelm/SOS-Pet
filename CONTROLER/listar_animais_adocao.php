<?php
	include("../VIEW/classeCabecalho.php");
	include("../VIEW/classeCard.php");
	include("../VIEW/classeForm.php");
	include("../MODEL/classeBancoDeDados.php");
?>
<br><br><br><br><br>
<div class="col-xs-12 col-sm-10 offset-sm-1 col-md-10 offset-md-1">

    <div id="parallax-image9">
        <div class="col-sm-5">
            <h1 class='text-center' id="adocao">Adoção</h1><br/>
            <p>Clique no botão abaixo, cadastre seu animal para que seja divulgado em nosso site.</p>
             <?php
                    if (!isset($_SESSION["usuario"])) {
                       echo "<p><a class='red' href='index.php#conta'>Faça login para cadastrar um animal na adoção</a></p>";
                    }
                    else{

                           if(isset($_SESSION["usuario"]) && $_SESSION["usuario"]->get_permissao()==0){
                            
                                $parametros=null;
                                $parametros["action"]="insere.php?tabela=animal&adocao";
                                $parametros["enctype"]=true;
                                $parametros["method"]="POST";
                                $parametros["modal"]=true;
                                $parametros["reset"]=true;
                                $f=new Form($parametros);

                                $parametros=null;
                                $parametros["name"]="foto";
                                $parametros["type"]="file";
                                $parametros["label"] = "Foto do animal";
                                $parametros["id"]="foto";
                                $parametros["class"]="form-control";
                                $parametros["required"]="required";
                                $f->add_input($parametros);

                                $parametros=null;
                                $vetor=null;
                                $vetor[] = array("value"=>"Cachorro","label"=>"Cachorro");
                                $vetor[] = array("value"=>"Gato","label"=>"Gato");
                                $parametros["name"] = "tipo";
                                $parametros["class"] = "form-control";
                                $parametros["id"] = "tipo";
                                $f->add_select($parametros,$vetor);

                                $parametros=null;
                                $parametros["name"]="nome";
                                $parametros["type"]="text";
                                $parametros["id"]="nome_cao";
                                $parametros["class"]="form-control";
                                $parametros["placeholder"]="Nome do animal";
                                $parametros["required"]="required";
                                $f->add_input($parametros);

                                $parametros=null;
                                $parametros["name"]="raca";
                                $parametros["type"]="text";
                                $parametros["id"]="raca";
                                $parametros["class"]="form-control";
                                $parametros["placeholder"]="Raça";
                                $parametros["required"]="required";
                                $f->add_input($parametros);

                                
                                $parametros=null;
                                $vetor=null;
                                $vetor[] = array("value"=>"Macho","label"=>"Macho");
                                $vetor[] = array("value"=>"Femêa","label"=>"Femêa");
                                $parametros["name"] = "sexo";
                                $parametros["class"] = "form-control";
                                $parametros["id"] = "sexo";
                                $f->add_select($parametros,$vetor);

                                $parametros=null;
                                $vetor=null;
                                $vetor[] = array("value"=>"Pequeno","label"=>"Pequeno");
                                $vetor[] = array("value"=>"Médio","label"=>"Médio");
                                $vetor[] = array("value"=>"Grande","label"=>"Grande");
                                $parametros["name"] = "porte";
                                $parametros["class"] = "form-control";
                                $parametros["id"] = "porte";
                                $f->add_select($parametros,$vetor);

                                $parametros=null;
                                $parametros["name"]="descricao_adocao";
                                $parametros["type"]="text";
                                $parametros["id"]="descricao_adocao";
                                $parametros["class"]="form-control";
                                $parametros["placeholder"]="Descrição sobre o animal...(Opcional)";
                                $f->add_textarea($parametros);

                                
                                $parametros=null;
                                $parametros["name"]="status";
                                $parametros["type"]="hidden";
                                $parametros["id"]="status";
                                $parametros["value"]="Adocao";
                                $f->add_input($parametros);

                                $parametros=null;
                                $parametros["name"]="cod_usuario_cadastra";
                                $parametros["type"]="hidden";
                                $parametros["id"]="cod_usuario_cadastra";
                                $parametros["value"]=$_SESSION["usuario"]->get_id();
                                $f->add_input($parametros);

                                $parametros["modal_title"]="Cadastrar um animal para adoção";
                                $parametros["btn_title"]="Colocar um animal para adoção";
                                $m=new Modal($f, $parametros);

                                $m->exibe();
                            }
                    }
                ?>
        </div>

        <div class="col-sm-7" >

        </div>
    </div>

    <br>

   
    <div id="parallax-image333">
        <h1 class="text-center" id="listar_animais_adocao">Animais para Adoção</h1><br><br>

        <div class="col-xs-12 col-sm-10 offset-sm-1 col-md-10 offset-md-1">
            <form>
                
                <table class="table table-hover">
                    
                    <tr>
                        <td>Tipo:</td>
                        <td>
                            <input class="form-check-input" name="tipo" type="radio" id="Cachorro" value="Cachorro"> 
                            <label class="form-check-label" for="Cachorro">Cachorro</label>
                        </td>
                        <td>
                            <input class="form-check-input" name="tipo" type="radio" id="Gato" value="Gato">
                            <label class="form-check-label" for="Gato">Gato</label>
                        </td>

                        <td></td>    
                    </tr>

                    <tr>
                        <td>Sexo:</td>
                        <td>
                            <input class="form-check-input" name="sexo" type="radio" id="Macho" value="Macho"> 
                            <label class="form-check-label" for="Macho">Macho</label>
                        </td>
                        <td>
                            <input class="form-check-input" name="sexo" type="radio" id="Fêmea" value="Fêmea">
                            <label class="form-check-label" for="Fêmea">Fêmea</label>
                        </td>

                        <td></td>    
                    </tr>

                     <tr>
                        <td>Porte:</td>
                        <td>
                            <input class="form-check-input" name="porte" type="radio" id="Pequeno" value="Pequeno"> 
                            <label class="form-check-label" for="Pequeno">Pequeno</label>
                        </td>
                        <td>
                            <input class="form-check-input" name="porte" type="radio" id="Médio" value="Médio">
                            <label class="form-check-label" for="Médio">Médio</label>
                        </td>

                        <td>
                            <input class="form-check-input" name="porte" type="radio" id="Grande" value="Grande">
                            <label class="form-check-label" for="Grande">Grande</label>
                        </td>  
                    </tr>

                    <tr>
                        <td colspan="4" class="text-center">Busca Rápida: (nome do animal, caso não saiba, deixe em branco :)</td>
                    </tr>

                    <tr>
                        <td>Nome:</td>
                        <td colspan="3"><input type="text" name="nome" id="nome" class="form-control form-control-sm"></td>
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


    <div class="row exibir_card_cachorros text-center" id="animais">
        
    </div>
    <br>
    <ul class="pagination justify-content-center"></ul>
     
    <br  id="form_adocao"><br><br><br>

<?php
  
  if (isset($_GET["id"])) {
    include("form_adocao.php");
  }

?>
</div>
<?php
	include("../VIEW/classeRodape.php");

    if(isset($_GET['sucesso_cadastra_adocao'])){
        echo
        "
            <script>
                $(document).ready(function(){
                     alert('Animal cadastrado com sucesso!')
                })
            </script>
        ";
    }
?>

<script src="../js/animais_adocao.js"></script>
