<?php
    include("../VIEW/classeCabecalho.php");
    include("../VIEW/classeCard.php");
    include("../VIEW/classeForm.php");
    include("../MODEL/classeBancoDeDados.php");
?>
<br><br><br><br><br>
<div class="col-xs-12 col-sm-10 offset-sm-1 col-md-10 offset-md-1">

    <div id="parallax-image10">
        <div class="col-sm-5">
            <h1 class='text-center'id="desaparecido" ><b>Seu animal desapareceu?</b></h1><br>
            <p>Estamos ajudando pessoas a encontrarem seus animais de estimação que desapareceram. É um serviço totalmente gratuito que tem o objetivo de acabar com o sofrimento das pessoas que perderam uma parte de sua família.</p>
            

             <?php
                    if (!isset($_SESSION["usuario"])) {
                       echo "<p><a class='red' href='index.php#conta'>Faça login para Anunciar um animal</a></p>";
                    }
                    if(isset($_SESSION["usuario"]) && $_SESSION["usuario"]->get_permissao()==0){
                    
                        $parametros=null;
                        $parametros["action"]="insere.php?tabela=animal&perdido";
                        $parametros["method"]="POST";
                        $parametros["modal"]=true;
                        $parametros["reset"]=true;
                        $parametros["enctype"]=true;
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
                        $parametros["id"] = "sexo";
                        $f->add_select($parametros,$vetor);

                        $parametros=null;
                        $vetor=null;
                        $vetor[] = array("value"=>"Macho","label"=>"Macho");
                        $vetor[] = array("value"=>"Fêmea","label"=>"Fêmea");
                        $parametros["name"] = "sexo";
                        $parametros["class"] = "form-control";
                        $parametros["id"] = "sexo";
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
                        $parametros["name"]="bairro_desaparecido";
                        $parametros["type"]="text";
                        $parametros["id"]="bairro_desaparecido";
                        $parametros["class"]="form-control";
                        $parametros["placeholder"]="Local em que desapareceu";
                        $parametros["required"]="required";
                        $f->add_input($parametros);

                        $parametros=null;
                        $parametros["name"]="data_desaparecido";
                        $parametros["type"]="text";
                        $parametros["id"]="data";
                        $parametros["class"]="form-control data";
                        $parametros["required"]="required";
                        $f->add_input($parametros);

                        $parametros = null;
                        $parametros["name"] = "observacao_abandonado";
                        $parametros["class"]="form-control";
                        $parametros["placeholder"] = "Observações(Opcional)";
                        $f->add_textarea($parametros);

                        $parametros=null;
                        $parametros["name"]="cod_usuario_anuncia";
                        $parametros["type"]="hidden";
                        $parametros["id"]="cod_usuario_anuncia";
                        $parametros["value"]=$_SESSION["usuario"]->get_id();
                        $f->add_input($parametros);
                        

                        $parametros=null;
                        $parametros["name"]="status";
                        $parametros["type"]="hidden";
                        $parametros["id"]="status";
                        $parametros["value"]="Perdido";
                        $f->add_input($parametros);

                        $parametros["modal_title"]="Formulário de animal abandonado";
                        $parametros["btn_title"]="Anunciar um animal";
                        $m=new Modal($f, $parametros);

                        $m->exibe();
                    }
                ?>
        </div>

        <div class="col-sm-7" >

        </div>
    </div>

    <br>

   
    <div id="parallax-image333">
        <h1 class="text-center" id="listar_animais_desaparecidos">Animais Desaparecidos</h1><br><br>

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
                        <td >
                            <input class="form-check-input" name="sexo" type="radio" id="Fêmea" value="Fêmea">
                            <label class="form-check-label" for="Fêmea">Fêmea</label>
                        </td>

                        <td></td>    
                    </tr>

                    <tr>
                        <td colspan="4" class="text-center">Busca Rápida: (caso não saiba, deixe em branco)</td>
                    </tr>

                    <tr>
                        <td>Nome:</td>
                        <td colspan="3"><input type="text" name="nome_d" id="nome" class="form-control form-control-sm"></td>
                    </tr>

                    <tr>
                        <td>Data:</td>
                        <td colspan="3"><input type="text" name="data_d" id="data_desaparecido" class="form-control form-control-sm data"></td>
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

    <div class="row exibir_card_desaparecidos text-center" id="animais_desaparecidos">
        
    </div>
    <br>
    <ul class="pagination justify-content-center"></ul>

    <br><br><br><br>
</div>
<?php
    if (isset($_GET["id"])) {
       include("detalhes_desaparecido.php");
    }
?>

<?php
    include("../VIEW/classeRodape.php");

    if (isset($_GET["sucesso_anuncio"])) {
        echo
        "
            <script>
                $(document).ready(function(){
                     alert('Anuncio realizado com sucesso!')
                })
            </script>
        ";

    }
?>

<script src="../js/animais_desaparecidos.js"></script>
