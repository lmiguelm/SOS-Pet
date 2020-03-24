<?php

	include("../VIEW/classeCabecalho.php");
	include("autenticacao/autenticacao.php");
	include("autenticacao/autenticacao_admin.php");
	include("../VIEW/classeForm.php");
	include("../MODEL/classeBancoDeDados.php");
?>
	<br><br><br><br>
	<div class="col-xs-12 col-sm-10 offset-sm-1 col-md-10 offset-md-1">

		<div id="parallax-image336">
            
        <h1 class="text-center" id="listar_animais_adocao">Animais Cadastrados</h1><br><br>

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
                        <td>Status:</td>
                        <td colspan="3">
                            <select name="status" id="status" class="form-control form-control-sm">
                                <option value="">Selecione</option>
                                <option value="Abandonado">Abandonado</option>
                                <option value="Adoção">Adoção</option>
                                <option value="Perdido">Perdido</option>
                                <option value="Achado">Achado</option>
                                <option value="Adotado">Adotado</option>
                            </select>
                        </td>
                    </tr>

    
                    <tr>
                        <td>ID:</td>
                        <td colspan="3"><input type="text" name="id" id="id" class="form-control form-control-sm"></td>
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

    <div class="row exibir_card_animais text-center" id="animais">
        
    </div>
    <br>
    <ul class="pagination justify-content-center"></ul>

   
     
</div>
<?php
	include("../VIEW/classeRodape.php");
?>
<script src="../js/animais.js"></script>
