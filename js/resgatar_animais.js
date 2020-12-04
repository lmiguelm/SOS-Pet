$(function () {

	var url = "https://sospet-application-php.herokuapp.com/CONTROLER/"; var linhasPorPagina = 8;
	var paginaAtual = 1;
	var totalPaginas;
	var numeroLinhas;

	function loadAnimais() {
		$("#animais").empty();
		$.getJSON(url + "ajax/listar.php?tabela=abandonado", { linhasPorPagina: linhasPorPagina, paginaAtual: paginaAtual }).done(function (data) {

			if (data.length == 0) {
				var $animais = $('<p>Atualmente não há animais para adoção</p>')
				$('#comentarios').append($animais)
			} else {

				if (data.length >= 8) {
					gerarPaginacao()
				}

				for (var i = 0; i < data.length; i++) {
					listarAnimais(data[i].id_animal, data[i].tipo, data[i].endereco_abandonado, data[i].observacao_abandonado, data[i].foto, data.length);
				}
			}
		})
	}

	function gerarPaginacao() {

		$(".pagination").empty();
		$.get(url + "ajax/contador.php?tabela=abandonado")
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
	function listarAnimais(id_animal, tipo, endereco_abandonado, observacao_abandonado, foto, data) {

		cont++;

		var $animais = $('<tr class="animal"><td class="animal-foto"><img src="../img/animais/' + foto + '" height="80px"></td><td class="animal-id">' + id_animal + '</td><td class="animal-tipo">' + tipo + '</td><td class="animal-endereco">' + endereco_abandonado + '</td><td class="animal-observacao">' + observacao_abandonado + '</td><td><button type="button" class="btn btn-danger resgatar_animal">Resgatar</button></td></tr>')



		$('.exibir_card_cachorros').append($animais);
		$('.resgatar_animal').click(function () {



			var linha = $(this).closest('.animal');

			linha.hide('slow', function () {
				var id = linha.children('.animal-id').text();

				$.ajax({
					url: url + "ajax/alterar_status_animal.php?resgatado",
					method: "post",
					data: { id: id }
				})
			})
		})
	}

	function Buscar() {
		var tipo = $('input[name=tipo_abandonado]:checked').val();
		var endereco = $('input[name=endereco_abandonado]').val();
		var id = $('input[name=i_abandonado]').val();

		var botao = $(this).val()

		if (botao == 'resetar') {
			location.reload();
		}


		if (tipo == undefined) {
			tipo = null;
		}
		if (endereco == '') {
			endereco = null;
		}
		if (id == '') {
			id = null;
		}


		$.getJSON(url + "ajax/listar.php?tabela=abandonado", { linhasPorPagina: linhasPorPagina, paginaAtual: paginaAtual, tipo: tipo, endereco: endereco, id: id }).done(function (data) {
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
					listarAnimais(data[i].id_animal, data[i].tipo, data[i].endereco_abandonado, data[i].observacao_abandonado, data[i].foto, data.length);
				}
			}
		})

	}


	$("#btn_busca").click(Buscar)
	$("#btn_apagar_busca").click(Buscar)

	loadAnimais()

})