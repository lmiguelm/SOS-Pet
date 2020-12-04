$(function () {

	var url = "https://sospet-application-php.herokuapp.com/CONTROLER/";

	function load_meus_animais() {
		$("#animais").empty();
		$.getJSON(url + "ajax/listar.php?tabela=meus_animais").done(function (data) {
			if (data.length == 0) {
				var $animais = $('<p>Você não possui animais.</p>')
				$('#comentarios').append($animais)
			} else {


				for (var i = 0; i < data.length; i++) {
					listar_meus_animais(data[i].id_animal, data[i].nome, data[i].foto, data[i].status, data.length, data[i].sexo, data[i].tipo);
				}
			}
		})
	}

	var cont = 0
	function listar_meus_animais(id_animal, nome, foto, status, data, sexo, tipo) {

		cont++;

		if (status == 'Perdido') {
			var $animais = $('<div class="col-sm-3" style="font-size:15px"><div class="card-group" style="width: 17rem;"><div class="card text-black bg-primary"><a href="" class="zoom"><img class="card-img-top" height="250px" src="../img/animais/' + foto + '"></a><div class="card-body"><h5 class="card-title text-center">' + nome + '</h5></div><ul class="list-group list-group-flush"><li class="list-group-item">ID: ' + id_animal + '</li><li class="list-group-item">Sexo: ' + sexo + '</li><li class="list-group-item">Tipo: ' + tipo + '</li><li class="list-group-item">Status: ' + status + '</li></ul><div class="card-body text-center"><button class="btn btn-success animal_encontrado"  value="' + id_animal + '">Encontrado</button></div></div></div></div>')
		} else {
			var $animais = $('<div class="col-sm-3" style="font-size:15px"><div class="card-group" style="width: 17rem;"><div class="card text-black bg-primary"><a href="" class="zoom"><img class="card-img-top" height="250px" src="../img/animais/' + foto + '"></a><div class="card-body"><h5 class="card-title text-center">' + nome + '</h5></div><ul class="list-group list-group-flush"><li class="list-group-item">ID: ' + id_animal + '</li><li class="list-group-item">Sexo: ' + sexo + '</li><li class="list-group-item">Tipo: ' + tipo + '</li><li class="list-group-item">Status: ' + status + '</li></ul><div class="card-body text-center"></div></div></div></div>')
		}


		if (cont == 3) {
			$animais.append('<br>')
			cont = 0;
		}

		$('.exibir_animais').append($animais);

		$('.animal_encontrado').click(function () {
			var id = $(this).val()

			$.ajax({
				url: url + "mudar_dados.php",
				method: "post",
				data: { id: id, coluna: "status" },
				success: function () {
					location.reload()
				}
			})
		})
	}

	function Buscar() {
		var sexo = $('input[name=sexo]:checked').val();
		var tipo = $('input[name=tipo]:checked').val();
		var nome = $('input[name=nome]').val();
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

		if (tipo == undefined) {
			tipo = null;
		}


		$.getJSON(url + "ajax/listar.php?tabela=meus_animais", { tipo: tipo, sexo: sexo, nome: nome }).done(function (data) {
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
					listar_meus_animais(data[i].id_animal, data[i].nome, data[i].foto, data[i].status, data.length, data[i].sexo, data[i].tipo);
				}
			}
		})

	}

	load_meus_animais();

	$("#btn_busca").click(Buscar)
	$("#btn_apagar_busca").click(Buscar)
})