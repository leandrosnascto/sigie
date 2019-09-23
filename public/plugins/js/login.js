
$(document).ready(function() {

	$('#logar').on('click', function() {

		$.ajax({
			type: 'post',
			url : '../class/LoginClass.php',
			data: {
				email:$('#email').val(),
				senha:$('#senha').val(), 
				validar:'validar'
			},

			success: function(json) 
			{
				if(json == 'logado')
				{
					window.location.href='http://localhost/projeto/content/index.php';
				} else {

					$('.mostraErro').css('display', 'block');
				}
			},

			error: function(json) 
			{

			}
		});
	});


	//abrir modal
	$('#esqueciSenha').click(function(){
		$('#modalLogin').modal('show');
	});

	$('#salvarSenha').on('click', function() {

		$('#modalLogin').modal('hide');

		$.ajax({
			type: 'post',
			url: '../class/LoginClass.php',
			data: {
				nome: $('#nomeModal').val(),
				email: $('#emailModal').val(),
				senha: $('#senhaModal').val(),
				cadastrarSenha: 'cadastrarSenha'
			},

			success: function(json) 
			{
				if(json == 'jaTemEmail')
				{
					$('.jaTemEmailCadastro').css('display', 'block');
					return false;
				}

				if(json)
				{
					$('.mostraMensagem').css('display', 'block');

					$('#nomeModal').val('');
					$('#emailModal').val('');
					$('#senhaModal').val('');
					
				} else {
					$('.mostraErroCadastro').css('display', 'block');
				}
			},

			error: function(json) 
			{

			}
		});
	});

});