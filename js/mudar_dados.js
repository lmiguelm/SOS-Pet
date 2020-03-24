$(function(){

	var url="http://localhost/TCC/CONTROLER/";
	var tabela=$('#ta').text();

	console.log(tabela)

	$('#btn_mudar_senha').click(function(){

		
		var id=$('input[name=id]').val()


		$.getJSON(url+"ajax/verificar_senha.php?id="+id).done(function(data){

			for(var i=0; i<data.length; i++){

				alterar_senha(data[i].senha);
			}
		})
	})

	function alterar_senha(senha){

		var nova_senha1=$('input[name=nova_senha1]').val()
		var nova_senha2=$('input[name=nova_senha2]').val()
		var senha_atual=$('input[name=senha_atual]').val()

		var senha2=md5(senha_atual)
		var senha_atual_criptografada=sha1(senha2)

		if (senha==senha_atual_criptografada){

			if (nova_senha1.length>=5 && nova_senha2.length>=5){

				if(nova_senha1==nova_senha2){

					var x=confirm("Tem certeza que deseja alterar sua senha ?")

					if (x==true){
						$.ajax({
							url:url+"ajax/mudar_dados.php?tabela="+tabela,
							method:"post",
							data:{senha:nova_senha1},
							success: function(){
								location.reload()
								alert("Senha alterada com sucesso.")
							}
						})
					}

				}else{
					alert("As senhas não são iguais.")
				}
			}else{
				alert("Insira sua senha com no minimo 5 caracteres.")
			}

			
			
		}else{
			alert("Senha atual incorreta.")
		}

	}

	$('#btn_mudar_nome').click(function(){

		var nome=$('input[name=nome]').val()

		if(nome.length>=5){

			var x=confirm("Tem certeza que deseja alterar seu nome?")

			if(x==true){
				$.ajax({

					url: url+"ajax/mudar_dados.php?tabela="+tabela,
					method:"post",
					data:{nome: nome},
					success: function(){
						location.reload()
					}
				})
			}
		}else{
			alert("Nome invalido")
		}
	})

	$('#btn_mudar_endereco').click(function(){

		var endereco= $('input[name=endereco]').val()

		if (endereco.length>=5){

			var x=confirm("Tem certeza que deseja alterar seu endereço?")

			if(x==true){
				$.ajax({

					url: url+"ajax/mudar_dados.php?tabela="+tabela,
					method:"post",
					data:{endereco: endereco},
					success: function(){
						location.reload()
						alert("Endereço alterado com sucesso.")
					}

				})
			}
		}else{
			alert("Insira um endereco valido.")
		}
	})

	$('#btn_mudar_telefone').click(function(){

		var telefone=$('input[name=telefone]').val()

		if(telefone.length>12){

			var x=confirm("Tem certeza que deseja alterar seu telefone?")
		
			if (x==true){

				$.ajax({

					url: url+"ajax/mudar_dados.php?tabela="+tabela,
					method:"post",
					data:{telefone: telefone},
					success: function(){
						location.reload()
						alert("Telefone alterado com sucesso.")
					}
				})
			}

		}else{
			alert("Insira um número de telefone valido.")
		}

	})

	$('#btn_mudar_email').click(function(){

		var email=$('input[name=email]').val()

		if(email.match(/[^@]+@[^@]+\.[^@]+/)){

			var x=confirm("Tem certeza que deseja alterar seu e-mail?")
		
			if (x==true){

				$.ajax({

					url: url+"ajax/mudar_dados.php?tabela="+tabela,
					method:"post",
					data:{email: email},
					success: function(){
						location.reload()
						alert("E-mail alterado com sucesso.")
					}

				})
			}

		}else{
			alert("Digite um e-mail valido.")
		}

		
	})
})