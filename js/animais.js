$(function () {

	var url = "https://sospet-application-php.herokuapp.com/CONTROLER/"; var linhasPorPagina = 8;
	var paginaAtual = 1;
	var totalPaginas;
	var numeroLinhas;

	function loadAnimais() {
		$("#animais").empty();
		$.getJSON(url + "ajax/listar.php?tabela=animal", { linhasPorPagina: linhasPorPagina, paginaAtual: paginaAtual }).done(function (data) {

			if (data.length == 0) {
				var $animais = $('<p>Nenhum animal cadastrado.</p>')
				$('#comentarios').append($animais)
			} else {

				if (data.length >= 8) {
					gerarPaginacao()
				}

				for (var i = 0; i < data.length; i++) {
					ListarAnimais(data[i].id_animal, data[i].sexo, data[i].foto, data[i].tipo, data[i].nome, data[i].status, data.length);
				}
			}
		})
	}

	function gerarPaginacao() {

		$(".pagination").empty();
		$.get(url + "ajax/contador.php?tabela=animal")
			.done(function (data) {
				numeroLinhas = data[0].contador;
				totalPaginas = Math.ceil(numeroLinhas / linhasPorPagina);
				addPaginacao();
			});
	}

	function addPaginacao() {

		var $anterior = $("<li />")
			.addClass("page-item disabled")
			.attr("id", "anterior")
			.append($("<a />")
				.addClass('page-link')
				.attr("href", "#sla")
				.append("<span />")
				.text('Anterior'));
		$(".pagination").append($anterior);
		$("#anterior").click(onPaginaClick);

		for (var i = 1; i <= totalPaginas; i++) {
			if (paginaAtual == i) {
				var $paginaAtiva = $("<li />")
					.addClass("page-item active")
					.attr("id", "pag" + i)
					.append($("<a />")
						.addClass('page-link')
						.attr("href", "#pag" + i)
						.text(i));
				$(".pagination").append($paginaAtiva);
			}
			else {
				var $pagina = $("<li />")
					.addClass("page-item")
					.attr("id", "pag" + i)
					.append($("<a />")
						.addClass('page-link')
						.attr("href", "#pag" + i)
						.text(i));
				$(".pagination").append($pagina);
			}
			$("#pag" + i).click(onPaginaClick);
		}

		var $posterior;
		if (numeroLinhas > 5) {
			$posterior = $("<li />")
				.addClass("page-item")
				.attr("id", "posterior")
				.append($("<a />")
					.addClass('page-link')
					.attr("href", "#pag2")
					.append("<span />")
					.text("Próximo"));
		}
		else {
			$posterior = $("<li />")
				.addClass("page-item disabled")
				.attr("id", "posterior")
				.append($("<a />")
					.addClass('page-link')
					.attr("href", "#pag1")
					.append("<span />")
					.text("Próximo"));
		}
		$(".pagination").append($posterior);
		$("#posterior").click(onPaginaClick);
	}

	function onPaginaClick() {
		var pagina;
		var paginaAntiga = paginaAtual;
		var id = $(this).prop("id");
		if (id == "anterior" || id == "posterior") {
			var url = $(this).children().prop("href");
			var numero = url.substring(url.length - 1);
			if (numero != '#') {
				pagina = numero;
			} else {
				if (paginaAtual == totalPaginas) {
					pagina = totalPaginas;
				} else {
					pagina = 1;
				}

			}
		} else {
			pagina = id.substring(3);
		}
		paginaAtual = pagina;
		var anterior = paginaAtual - 1;
		var posterior = parseInt(paginaAtual) + 1;
		$("#anterior").children().prop("href", "#pag" + anterior);
		$("#posterior").children().prop("href", "#pag" + posterior);
		$("#pag" + paginaAtual).addClass("active");
		$("#pag" + anterior).removeClass("active");
		if (paginaAntiga != posterior) {
			$("#pag" + paginaAntiga).removeClass("active");
		} else {
			$("#pag" + posterior).removeClass("active");
		}

		if (paginaAtual > 1) {
			$("#anterior").removeClass("disabled");
		} else {
			$("#anterior").addClass("disabled");
			$("#anterior").children().prop("href", "#");
			$("#pag" + 1).addClass("active");
		}
		if (posterior <= totalPaginas) {
			$("#posterior").removeClass("disabled");
		} else {
			$("#posterior").addClass("disabled");
			$("#posterior").children().prop("href", "#");
			$("#pag" + 3).addClass("active");
		}
		loadAnimais();
	}

	var cont = 0
	function ListarAnimais(id_animal, sexo, foto, tipo, nome, status, data) {

		cont++;

		var $usuarios = $('<div class="col-sm-3" style="font-size:15px"><div class="card-group" style="width: 17rem;"><div class="card text-black bg-primary"><a href="" class="zoom"><img class="card-img-top" src="../img/animais/' + foto + '" height="250px"></a><div class="card-body"><h5 class="card-title text-center">' + nome + '</h5></div><ul class="list-group list-group-flush"><li class="list-group-item">ID: ' + id_animal + '</li><li class="list-group-item">Sexo: ' + sexo + '</li><li class="list-group-item">Tipo: ' + tipo + '</li><li class="list-group-item">Status: ' + status + '</li></ul><div class="card-body text-center"><button class="btn btn-danger remover_animal"  value="' + id_animal + '">Remover</button></div></div></div></div>')

		if (cont == 3) {
			$usuarios.append('<br>')
			cont = 0;
		}

		$('.exibir_card_animais').append($usuarios);
		$('.remover_animal').click(remover_animal)
	}

	function remover_animal() {


		var id = $(this).val()
		$.get(url + 'ajax/remover.php?animal', { id: id });

		location.reload()

	}




	function Buscar() {
		var sexo = $('input[name=sexo]:checked').val();
		var tipo = $('input[name=tipo]:checked').val();
		var nome = $('input[name=nome]').val();
		var id = $('input[name=id]').val();
		var status = $('select[name=status]').val();
		var botao = $(this).val()

		if (botao == 'resetar') {
			location.reload();
		}

		if (sexo == undefined) {
			sexo = null;
		}
		if (nome == '') {
			nome = null;
		}
		if (id == '') {
			id = null;
		}
		if (tipo == '') {
			tipo = null;
		}
		if (status == undefined) {
			status = null;
		}


		$.getJSON(url + "ajax/listar.php?tabela=animal", { linhasPorPagina: linhasPorPagina, paginaAtual: paginaAtual, id: id, tipo: tipo, sexo: sexo, nome: nome, status: status }).done(function (data) {
			$("#animais").empty();
			$("#comentarios").empty();
			$('.pagination').empty()
			if (data.length == 0) {
				var $animais = $('<p>Nenhum resultado encontrado.</p>')
				$('#comentarios').append($animais)
			} else {

				var $animais = $('<p>Foram encontrados ' + data.length + ' possíveis resultados.</p>')
				$('#comentarios').append($animais)


				for (var i = 0; i < data.length; i++) {
					ListarAnimais(data[i].id_animal, data[i].sexo, data[i].foto, data[i].tipo, data[i].nome, data[i].status, data.length);
				}
			}
		})

	}



	$("#btn_busca").click(Buscar)
	$("#btn_apagar_busca").click(Buscar)
	loadAnimais();
})