$(document).ready(function(){

	$('#cadastrarGrupo,#cadastrar').on('click', function() {

		$.ajax({

			type: 'post',
			url : '../class/UsuarioClass.php',
			data: {
				cadastro:'cadastro',
				nome: $('#nome').val(),
 				cpf: $('#cpf').val(),
 				email: $('#email').val(),
 				endereco: $('#endereco').val(),
 				cidade: $('#cidade').val(),
 				estado: $('#estado').val(),
 				vip: $('#vip').val()
			},

			success: function( json )
			{

				if(json == 'ok')
				{

					/*mostra mensagem de cadastro efetuado*/
					$('.cadastro').css('display','block')
					setTimeout(function(){
						$('.cadastro').css('display','none');
					}, 8000);


					$('#nome').val('');
	 				$('#cpf').val('');
	 				$('#email').val('');
	 				$('#endereco').val('');
	 				$('#cidade').val('');
	 				$('#estado').val('');

				} else {

					$('.cadastroErro').css('display','block')
					setTimeout(function(){
						$('.cadastroErro').css('display','none');
					}, 8000);

				}
			},

			error: function( json )
			{

			}
		});
	});

});
