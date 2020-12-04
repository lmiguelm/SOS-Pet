$(function () {

	var url = "https://sospet-application-php.herokuapp.com/CONTROLER/"; var linhasPorPagina = 4;
	var paginaAtual = 1;
	var totalPaginas;
	var numeroLinhas;

	function loadUsuarios() {
		$("#usuarios").empty();
		$.getJSON(url + "ajax/listar.php?tabela=usuario", { linhasPorPagina: linhasPorPagina, paginaAtual: paginaAtual }).done(function (data) {

			if (data.length == 0) {
				var $animais = $('<p>Nenhum usuário cadastrado.</p>')
				$('#comentarios').append($animais)
			} else {

				if (data.length >= 4) {
					gerarPaginacao()
				}

				for (var i = 0; i < data.length; i++) {
					listarUsuarios(data[i].id_usuario, data[i].nome, data[i].foto, data[i].endereco, data[i].email, data[i].telefone, data.length, data[i].sexo);
				}
			}
		})
	}

	function gerarPaginacao() {

		$(".pagination").empty();
		$.get(url + "ajax/contador.php?tabela=usuario")
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
		loadUsuarios();
	}

	var cont = 0
	function listarUsuarios(id_usuario, nome, foto, endereco, email, telefone, data, sexo) {

		cont++;

		var $usuarios = $('<div class="col-sm-3" style="font-size:15px"><div class="card-group" style="width: 17rem;"><div class="card text-black bg-primary"><a href="" class="zoom"><img class="card-img-top" src="../img/usuarios/' + foto + '" height="300px"></a><div class="card-body"><h5 class="card-title text-center">' + nome + '</h5></div><ul class="list-group list-group-flush"><li class="list-group-item">ID: ' + id_usuario + '</li><li class="list-group-item">Sexo: ' + sexo + '</li><li class="list-group-item">Telefone: ' + telefone + '</li><li class="list-group-item">' + endereco + '</li><li class="list-group-item">' + email + '</li></ul><div class="card-body text-center"><button class="btn btn-danger remover_usuario"  value="' + id_usuario + '">Remover</button></div></div></div></div>')

		if (cont == 3) {
			$usuarios.append('<br>')
			cont = 0;
		}

		$('.exibir_card_usuarios').append($usuarios);
		$('.remover_usuario').click(remover_usuario)
	}

	function remover_usuario() {

		var id = $(this).val()
		$.get(url + 'ajax/remover.php?usuario', { id: id });
		location.reload()

	}


	function Buscar() {
		var sexo = $('input[name=sexo]:checked').val();
		var nome = $('input[name=nome_b]').val();
		var id = $('input[name=id_b]').val();
		var endereco = $('input[name=endereco_b]').val();
		var telefone = $('input[name=telefone_b]').val();
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
		if (endereco == '') {
			endereco = null;
		}
		if (telefone == '') {
			telefone = null;
		}


		$.getJSON(url + "ajax/listar.php?tabela=usuario", { linhasPorPagina: linhasPorPagina, paginaAtual: paginaAtual, id: id, endereco: endereco, sexo: sexo, nome: nome, telefone: telefone }).done(function (data) {
			$("#usuarios").empty();
			$("#comentarios").empty();
			$('.pagination').empty()
			if (data.length == 0) {
				var $animais = $('<p>Nenhum resultado encontrado.</p>')
				$('#comentarios').append($animais)
			} else {

				var $animais = $('<p>Foram encontrados ' + data.length + ' possíveis resultados.</p>')
				$('#comentarios').append($animais)

				for (var i = 0; i < data.length; i++) {
					listarUsuarios(data[i].id_usuario, data[i].nome, data[i].foto, data[i].endereco, data[i].email, data[i].telefone, data.length, data[i].sexo);
				}
			}
		})

	}



	$("#btn_busca").click(Buscar)
	$("#btn_apagar_busca").click(Buscar)
	loadUsuarios();
})