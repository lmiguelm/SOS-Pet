$(function () {

	var url = "http://localhost/SOS-PET/CONTROLER/";
	var controleNav = false;
	$(document).scroll(function (e) {

		var scrollTop = $(document).scrollTop();

		if (scrollTop > $('.navbar').height()) {
			if (controleNav == false) {
				$('.navbar').removeClass('navbar-static-top').addClass('navbar-fixed-top');
				$('.navbar').hide();
				$('.navbar').fadeIn('slow');
				controleNav = true;
			}
		} else {

		}

	})

	$('.scroll2').click(function (event) {
		event.preventDefault();
		$('html, body').animate({ scrollTop: $(this.hash).offset().top }, 800)
	})


	function envir_mensagem_contato() {

		var nomee = $("#nome_contato").val()
		var mensagemm = $("#mensagem_contato").val()
		var emaill = $("#email_contato").val()
		var assuntoo = $("#assunto_contato").val()

		if (nomee != 'Nome' && mensagemm != "Mensagem" && emaill != "E-mail" && assuntoo != "Assunto") {

			if (nomee.length >= 5) {

				if (emaill.match(/[^@]+@[^@]+\.[^@]+/)) {

					$.ajax({
						url: url + "contato.php",
						method: "post",
						data: { nome: nomee, mensagem: mensagemm, email: emaill, assunto: assuntoo },
						success: function () {
							alert("Mensagem enviada com sucesso. :)")

							location.reload()
						}
					})

				} else {
					alert("Forneça um e-mail valido!")
				}

			} else {
				alert("Forneça um nome com no minimo 5 caracteres")
			}

		} else {
			alert("Todos os campos são obrigatorios!")
		}
	}

	$('#btn_contato').click(envir_mensagem_contato);


	//Mascara dos formulários
	$('.dinheiro').mask('#.##0,00', { reverse: true });
	$('.horas').mask('00:00');
	$('.cartao').mask('0000 0000 0000 0000');
	$('.telefone').mask('(00) 000000000');
	$('.data').mask("00/00/0000");


	var containerBtn = $('.jbtn_voltar');
	var btnLink = $('.jbtn_voltar_link');

	//Mostra o botão voltar ao topo
	$(window).scroll(function () {

		if ($(this).scrollTop() > 70) {
			containerBtn.fadeIn(500);
		}
		else {
			containerBtn.fadeOut(500);
		}
	})

	//clique e volte ao topo
	containerBtn.click(function () {

		$("html, body").animate({ scrollTop: 0 }, 800);

		return false;
	})

	$("#form_cadastro").validate({

		rules: {
			nome: {
				required: true,
				maxlength: 100,
				minlength: 5
			},
			email: {
				required: true,
				email: true
			},
			sexo: {
				required: true
			},
			senha: {
				required: true,
				maxlength: 100,
				minlength: 5
			},
			telefone: {
				required: true,
			}
		}
	})

	$("#form_login").validate({

		rules: {

			email: {
				required: true,
				email: true
			},
			senha: {
				required: true,
			}
		}
	})

	$("#form_contato").validate({

		rules: {

			email: {
				required: true,
				email: true
			},
			nome: {
				required: true,
				maxlength: 100,
				minlength: 5
			},
			mensagem: {
				required: true,
				maxlength: 500,
				minlength: 5
			}
		}
	})

	$('#form_recuperar_senha').validate({
		rules: {
			email: {
				required: true,
				email: true
			}
		}
	})

	$("#button_reload").click(function () {
		window.location.href = url + "index.php#conta";
	})


});
