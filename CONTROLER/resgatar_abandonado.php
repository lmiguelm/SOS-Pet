<?php

	include("../VIEW/classeCabecalho.php");
	include("autenticacao/autenticacao.php");
	include("autenticacao/autenticacao_voluntario.php");
	include("../VIEW/classeForm.php");
	include("../MODEL/classeBancoDeDados.php");
?>
<br><br><br><br><br>

<div class="col-xs-12 col-sm-10 offset-sm-1 col-md-10 offset-md-1">

	<div id="parallax-image312">
		<h1 class="text-center">Animais a abandonados</h1><br><br>

		<form>
            
            <table class="table table-hover">
                
                <tr>
                    <td>Tipo:</td>
                    <td>
                        <input class="form-check-input" name="tipo_abandonado" type="radio" id="Cachorro" value="Cachorro"> 
                        <label class="form-check-label" for="Cachorro">Cachorro</label>
                    </td>
                    <td>
                        <input class="form-check-input" name="tipo_abandonado" type="radio" id="Gato" value="Gato">
                        <label class="form-check-label" for="Gato">Gato</label>
                    </td>

                    <td></td>    
                </tr>

                <tr>
                    <td>ID:</td>
                    <td colspan="3"><input type="text" name="id_abandonado" id="id_abandonado" class="form-control form-control-sm"></td>
                </tr>

                <tr>
                    <td>Endereço:</td>
                    <td colspan="3"><input type="text" name="endereco_abanadonado" id="endereco_abanadonado" class="form-control form-control-sm data"></td>
                </tr>

                <tr>
                   <td colspan="4" class="text-center"><br>
                        <button type="reset" id="btn_apagar_busca" value="resetar"  class="btn btn-danger">Apagar</button>
                        <button type="button" id="btn_busca" value="buscar" class="btn btn-success">Buscar</button>
                    </td> 
                </tr>
            </table>

        </form>
		 <span id="comentarios" class="text-center"></span>
	</div>

	<div id="parallax-image3333">
        <table class="table table-hover text-center ">

            <thead>
                <tr>
                    <th>Foto</th>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Endereço</th>
                    <th>Observação</th>
                    <th>Ação</th>
                </tr>
            </thead>
            
            <tbody id="animais" class="exibir_card_cachorros">
               
            </tbody>
        </table>

        <br>
        <ul class="pagination justify-content-center"></ul>

    </div>
    
    

</div>
<?php
	echo'<p hidden id="id_voluntario">'.$_SESSION["usuario"]->get_id().'</p>';
    include("../VIEW/classeRodape.php");
?>
<script src="../js/resgatar_animais.js"></script>

