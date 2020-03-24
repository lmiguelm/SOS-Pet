$(function(){

	var url="http://localhost/TCC/CONTROLER/";
	var linhasPorPagina=8;
	var paginaAtual=1;
	var totalPaginas;
	var numeroLinhas;

	function loadAnimais(){
		$("#animais").empty();
		 $.getJSON(url + "ajax/listar.php?tabela=resgatado", {linhasPorPagina: linhasPorPagina, paginaAtual: paginaAtual}).done(function(data){

		 	if (data.length==0){
					var $animais=$('<p>Atualmente não há animais para adoção</p>')
					$('#comentarios').append($animais)
			}else{

				if (data.length>=8){
			 		gerarPaginacao()
			 	}

				for(var i=0; i<data.length; i++){
					listarAnimais(data[i].id_animal, data[i].tipo, data[i].foto, data.length);
				}
			}
		})
	}	

	function gerarPaginacao(){

	    $(".pagination").empty();
	    $.get(url + "ajax/contador.php?tabela=resgatado")
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
	function listarAnimais(id_animal, tipo, foto, data){

		cont++;

		var $animais=$('<tr class="animal"><td class="animal-foto"><img src="../img/animais/'+foto+'" height="80px"></td><td class="animal-id">'+id_animal+'</td><td class="animal-tipo">'+tipo+'</td><td><button type="button" class="btn btn-success colocar_adocao">Colocar para adoção</button></td></tr>')
		


        $('.exibir_card_cachorros').append($animais);
		$('.colocar_adocao').click(function(){

			var linha=$(this).closest('.animal');
			var id=linha.children('.animal-id').text();


			$('#id_animal_form').val(id)
			$('#colocar_animal_adocao').modal();
		})
	}

	function Buscar(){
		var tipo=$('input[name=tipo_abandonado]:checked').val();
		var id=$('input[name=id_abandonado]').val();
		
		var botao=$(this).val()

		if (botao=='resetar'){
			location.reload();
		}

		if(tipo==undefined){
			tipo=null;
		}
		
		if(id==''){
			id=null;
		}
		

		$.getJSON(url + "ajax/listar.php?tabela=resgatado", {linhasPorPagina: linhasPorPagina, paginaAtual: paginaAtual, tipo: tipo, id: id}).done(function(data){
			$("#animais").empty();
			$("#comentarios").empty();
			$('.pagination').empty()
			if (data.length==0){
					var $animais=$('<p>Nenhum resultado encontrado.</p>')
					$('#comentarios').append($animais)
			}else{

				var $animais=$('<p>Foram encontrados '+data.length+' possíveis resultados.</p>')
					$('#comentarios').append($animais)

		
				for(var i=0; i<data.length; i++){
					listarAnimais(data[i].id_animal, data[i].tipo, data[i].foto, data.length);
				}
			}
		})
		
	}

	function colocar_adocao(){

		var nome=$('input[name=nome]').val()
		var sexo=$('select[name=sexo]').val()
		var porte=$('select[name=porte]').val()
		var raca=$('input[name=raca]').val()
		var id_animal_form=$('input[name=id_animal_form]').val()
		var descricao=$('textarea[name=descricao_adocao]').val()
	

		if(nome=='Insira o nome' || sexo =='Selecione o sexo' || porte=='Selecione o porte' || raca=='Insira a raça' || descricao=='Descrição...'){
			alert("Preencha todos os campos!")
		}else{

			$.ajax({
				url:url+"ajax/colocar_animal_adocao.php",
				method:"post",
				data:{nome:nome, sexo:sexo, porte:porte, raca:raca, id_animal_form:id_animal_form, descricao:descricao},
				success: function(){
					location.reload()
					alert("Animal colocado para adoção com sucesso.")
				}
			})

		}
	}

	$("#colocar_adocao").click(colocar_adocao)
	$("#btn_busca").click(Buscar)
	$("#btn_apagar_busca").click(Buscar)
	
	loadAnimais()

})