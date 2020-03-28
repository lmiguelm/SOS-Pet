$(function(){
    
   var url="http://localhost:8080/SOS-PET/CONTROLER/";


   //BUSCAR OS DADOS DAS SEÇÕES NO BANCO 
   function loadSecao(){

      var secao=0

      $.getJSON(url + "ajax/listar_secao.php?secao=secao1").done(function(data){
         secao=1
         listarDadosSecao(data[0].titulo, data[0].conteudo, secao);
      })
      $.getJSON(url + "ajax/listar_secao.php?secao=secao2").done(function(data){
         secao=2
         listarDadosSecao(data[0].titulo, data[0].conteudo, secao);     
      })
      $.getJSON(url + "ajax/listar_secao.php?secao=secao3").done(function(data){
         secao=3
         listarDadosSecao(data[0].titulo, data[0].conteudo, secao);
      })
      $.getJSON(url + "ajax/listar_secao.php?secao=secao4").done(function(data){
         secao=4
         listarDadosSecao(data[0].titulo, data[0].conteudo, secao);
      })
      $.getJSON(url + "ajax/listar_secao.php?secao=secao5").done(function(data){
         secao=5
         listarDadosSecao(data[0].titulo, data[0].conteudo, secao);
      })
      $.getJSON(url + "ajax/listar_secao.php?secao=secao6").done(function(data){
         secao=6
         listarDadosSecao(data[0].titulo, data[0].conteudo, secao);
      })
      $.getJSON(url + "ajax/listar_secao.php?secao=secao7").done(function(data){
         secao=7
         listarDadosSecao(data[0].titulo, data[0].conteudo, secao);
      })
      $.getJSON(url + "ajax/listar_secao.php?secao=secao8").done(function(data){
         secao=8
         listarDadosSecao(data[0].titulo, data[0].conteudo, secao);
      })
      $.getJSON(url + "ajax/listar_secao.php?secao=secao9").done(function(data){
         secao=9
         listarDadosSecao(data[0].titulo, data[0].conteudo, secao);
      })
      
   }

   //LISTAR DOS DADOS DAS SEÇÕES
   function listarDadosSecao(titulo, conteudo, secao){

      switch(secao){

         case 1:  $('#dados_secao1_titulo').empty();
                  $('#dados_secao1_titulo').append(titulo);
                  $('#dados_secao1_conteudo').empty();
                  $('#dados_secao1_conteudo').append(conteudo);
                  break
         case 2:  $('#dados_secao2_titulo').empty();
                  $('#dados_secao2_titulo').append(titulo);
                  $('#dados_secao2_conteudo').empty();
                  $('#dados_secao2_conteudo').append(conteudo);
                  break
         case 3:  $('#dados_secao3_titulo').empty();
                  $('#dados_secao3_titulo').append(titulo);
                  $('#dados_secao3_conteudo').empty();
                  $('#dados_secao3_conteudo').append(conteudo);
                  break
         case 4:  $('#dados_secao4_titulo').empty();
                  $('#dados_secao4_titulo').append(titulo);
                  $('#dados_secao4_conteudo').empty();
                  $('#dados_secao4_conteudo').append(conteudo);
                  break
         case 5:  $('#dados_secao5_titulo').empty();
                  $('#dados_secao5_titulo').append(titulo);
                  $('#dados_secao5_conteudo').empty();
                  $('#dados_secao5_conteudo').append(conteudo);
                  break
         case 6:  $('#dados_secao6_titulo').empty();
                  $('#dados_secao6_titulo').append(titulo);
                  $('#dados_secao6_conteudo').empty();
                  $('#dados_secao6_conteudo').append(conteudo);
                  break
         case 7:  $('#dados_secao7_titulo').empty();
                  $('#dados_secao7_titulo').append(titulo);
                  $('#dados_secao7_conteudo').empty();
                  $('#dados_secao7_conteudo').append(conteudo);
                  break
         case 8:  $('#dados_secao8_titulo').empty();
                  $('#dados_secao8_titulo').append(titulo);
                  $('#dados_secao8_conteudo').empty();
                  $('#dados_secao8_conteudo').append(conteudo);
                  break
         case 9:  $('#dados_secao9_titulo').empty();
                  $('#dados_secao9_titulo').append(titulo);
                  $('#dados_secao9_conteudo').empty();
                  $('#dados_secao9_conteudo').append(conteudo);
                  break
      }
   }


   //ALTERAR DADOS DAS SEÇÕES
   $('.alterarSecao').click(function(){ 
      var secao=$(this).val();
      var novoTitulo=$('#tituloSecao'+secao).val()
      var novoConteudo=$('#conteudoSecao'+secao).val()
 
      if((novoTitulo!='Insira o novo titulo' && novoTitulo!='') || (novoConteudo!='Informe o novo conteudo' && novoConteudo!='')){

         if(novoTitulo!='Insira o novo titulo' && novoConteudo!='Informe o novo conteudo'){
            $.ajax({
               url: url+"ajax/listar_secao.php?secao=secao"+secao+"&update",
               method: "get",
               data: {novoTitulo:novoTitulo, novoConteudo:novoConteudo},
               success: function(){
                  loadSecao();
                  $('#muda_dados_secao'+secao).modal('hide')
                  alert("Dados alterados com sucesso!")
               }
            })
         }
         else if(novoTitulo!='Insira o novo titulo'){
            $.ajax({
               url: url+"ajax/listar_secao.php?secao=secao"+secao+"&update",
               method: "get",
               data: {novoTitulo:novoTitulo},
               success: function(){
                  loadSecao();
                  $('#muda_dados_secao'+secao).modal('hide')
                  alert("Dado alterado com sucesso!")
               }
            })
         }
         else{
            $.ajax({
               url: url+"ajax/listar_secao.php?secao=secao"+secao+"&update",
               method: "get",
               data: {novoConteudo:novoConteudo},
               success: function(){
                  loadSecao();
                  $('#muda_dados_secao'+secao).modal('hide')
                  alert("Dado alterado com sucesso!")
               }
            })
         }
      }
      else{
         alert("Erro. Nenhum texto foi digitado.")
      }
   })


   loadSecao();
})