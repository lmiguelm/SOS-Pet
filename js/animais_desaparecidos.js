$(function(){

	var url="http://localhost/TCC/CONTROLER/";
	var linhasPorPagina=8;
	var paginaAtual=1;
	var totalPaginas;
	var numeroLinhas;

	function loadAnimais(){
		$("#animais_desaparecidos").empty();
		 $.getJSON(url + "ajax/listar.php?tabela=desaparecido", {linhasPorPagina: linhasPorPagina, paginaAtual: paginaAtual}).done(function(data){

		 	if (data.length==0){
					var $animais=$('<div class="col-xs-10 offset-xs-1 col-sm-6 offset-sm-3 col-md-4 offset-md-4"><p><b>Atualmente não há nenhum animal desaparecido</b></p></div>')
					$('.exibir_card_desaparecidos').append($animais)
			}else{
				if (data.length>=8){
			 		gerarPaginacao()
			 	}

				for(var i=0; i<data.length; i++){
					listarAnimais(data[i].id_animal, data[i].nome, data[i].foto, data[i].data_desaparecido, data.length);
				}
			}
		})

	}

	function gerarPaginacao(){

	    $(".pagination").empty();
	    $.get(url + "ajax/contador.php?tabela=desaparecido")
	      .done(function(data){
	        numeroLinhas = data[0].contador;
	        totalPaginas = Math.ceil(numeroLinhas / linhasPorPagina);
	        addPaginacao();
      });
	}

	function addPaginacao(){
    
	    var $anterior = $("<li />")
	                    .addClass("page-item disabled")
	                    .attr("id", "anterior")               
	                    .append($("<a />")
	                              .addClass('page-link')
	                              .attr("href","#sla")
	                              .append("<span />")
	                                        .text('Anterior'));
	    $(".pagination").append($anterior);
	    $("#anterior").click(onPaginaClick);
	    
	    for(var i = 1; i <= totalPaginas; i++){
	      if(paginaAtual == i){
	        var $paginaAtiva = $("<li />")
	                    .addClass("page-item active")
	                    .attr("id", "pag" + i)                
	                    .append($("<a />")
	                              .addClass('page-link')
	                              .attr("href","#pag" + i)
	                              .text(i));
	        $(".pagination").append($paginaAtiva);
	      }
	      else{
	        var $pagina = $("<li />")
	                    .addClass("page-item")
	                    .attr("id", "pag" + i)                
	                    .append($("<a />")
	                              .addClass('page-link')
	                              .attr("href","#pag" + i)
	                              .text(i));
	        $(".pagination").append($pagina);
	      }
	      $("#pag" + i).click(onPaginaClick);
	    }
	    
	    var $posterior;
	    if(numeroLinhas > 5){
	      $posterior = $("<li />")
	                    .addClass("page-item")
	                    .attr("id", "posterior")                
	                    .append($("<a />")
	                              .addClass('page-link')
	                              .attr("href","#pag2")
	                              .append("<span />")
	                                        .text("Próximo"));
	    }
	    else{
	      $posterior = $("<li />")
	                    .addClass("page-item disabled")
	                    .attr("id", "posterior")                
	                    .append($("<a />")
	                              .addClass('page-link')
	                              .attr("href","#pag1")
	                              .append("<span />")
	                                        .text("Próximo"));
	    }
	    $(".pagination").append($posterior);
	    $("#posterior").click(onPaginaClick);
	}

	function onPaginaClick(){
	    var pagina;
	    var paginaAntiga = paginaAtual;
	    var id = $(this).prop("id");
	    if(id == "anterior" || id == "posterior"){
	      var url = $(this).children().prop("href");
	      var numero = url.substring(url.length -1);
	      if(numero != '#'){
	        pagina = numero;
	      }else{
	        if(paginaAtual == totalPaginas){
	          pagina = totalPaginas;
	        }else{
	          pagina = 1;
	        }
	        
	      }
	    }else{
	      pagina = id.substring(3);
	    }
	    paginaAtual = pagina;
	    var anterior = paginaAtual - 1;
	    var posterior = parseInt(paginaAtual) + 1;
	    $("#anterior").children().prop("href", "#pag" + anterior);
	    $("#posterior").children().prop("href", "#pag" + posterior);
	    $("#pag" + paginaAtual).addClass("active");
	    $("#pag" + anterior).removeClass("active");
	    if(paginaAntiga != posterior){
	      $("#pag" + paginaAntiga).removeClass("active");
	    }else{
	      $("#pag" + posterior).removeClass("active");
	    }
	    
	    if(paginaAtual > 1){
	      $("#anterior").removeClass("disabled");
	    }else{
	      $("#anterior").addClass("disabled");
	      $("#anterior").children().prop("href", "#");
	      $("#pag" + 1).addClass("active");
	    }
	    if(posterior <= totalPaginas){
	      $("#posterior").removeClass("disabled");
	    }else{
	      $("#posterior").addClass("disabled");
	      $("#posterior").children().prop("href", "#");
	      $("#pag" + 3).addClass("active");
	    }
	    loadAnimais();
	  }

	var cont=0
	function listarAnimais(id_animal, nome, foto, data_desaparecido, data){

		cont++;

		var $animais=$('<div class="col-sm-3"><div class="card-group"><div class="card text-white bg-primary"><div class="zoom"><a href="listar_desaparecidos.php?id='+id_animal+'#form_desaparecido"><img class="card-img-top small_img" src="../img/animais/'+foto+'" height="200px"  width="250"></a></div><div class="card-body"><h5 class="card-title text-center">'+nome+'</h5><p class="card-text"><small style="color:white">Visto pela ultima vez em '+data_desaparecido+'</small></p></div></div></div></div>');

		if (cont==4){
			$animais.append('<br>')
			cont=0;
		}	

		

        $('.exibir_card_desaparecidos').append($animais);
	}
	

	function Buscar(){
		var tipo=$('input[name=tipo]:checked').val();
		var sexo=$('input[name=sexo]:checked').val();
		var nome=$('input[name=nome_d]').val();
		var data=$('input[name=data_d]').val();
		var botao=$(this).val()

		if (botao=='resetar'){
			location.reload();
		}

		if(tipo==undefined){
			tipo=null;
		}
		if(sexo==undefined){
			sexo=null;
		}
		if (nome==''){
			nome=null;
		}
		if (data==''){
			data=null;
		}

		$.getJSON(url + "ajax/listar.php?tabela=desaparecido", {linhasPorPagina: linhasPorPagina, paginaAtual: paginaAtual, tipo: tipo, data: data, sexo: sexo, nome: nome}).done(function(data){
			$("#animais_desaparecidos").empty();
			$("#comentarios").empty();
			$('.pagination').empty()
			if (data.length==0){
					var $animais=$('<p>Nenhum resultado encontrado.</p>')
					$('#comentarios').append($animais)
			}else{

				var $animais=$('<p>Foram encontrados '+data.length+' possíveis resultados.</p>')
					$('#comentarios').append($animais)

				
				for(var i=0; i<data.length; i++){
					listarAnimais(data[i].id_animal, data[i].nome, data[i].foto, data[i].data_desaparecido, data.length);
				}
			}
		})
	}

	$('#btn_busca').click(Buscar);
	$('#btn_apagar_busca').click(Buscar)
	

	loadAnimais()
})