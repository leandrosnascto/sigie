$(document).ready( function () {
    $('#example2, #example1').DataTable({
		"language": {
    		"url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese.json"
		},

		"pageLength": 5

	});
} );

function excluiLinhaUsuario( id )
{
	$('.modalExclusao').modal('show');
	$('#guardaIdParaExcluir').val(id);
}

function excluiLinhaUsuarioGrupo( id )
{
	$('.modalExclusao').modal('show');
	$('#guardaIdParaExcluir').val(id);
}

function excluirMesmo( a)
{

	$('.modalExclusao').modal('hide');

	if( a == 1 )
	{
		exclui( $('#guardaIdParaExcluir').val() );
	} 
}

function exclui( id )
{
	$.ajax({
		type: 'post',
		url :'../class/UsuarioClass.php',
		data: {
			id:id,
			excluir: 'excluir',
		},

		success: function(json)
		{	
			if(json) {
				/*poderia usar o closest para remover também*/
				$('#'+id).fadeOut(2000,function() {
					$('#'+id).remove('tr');
				});

				$('.exclusao').css('display','block')
					setTimeout(function(){
						$('.exclusao').css('display','none');
				}, 8000);

			} else {

				$('.excluirErro').css('display','block')
					setTimeout(function(){
						$('.excluirErro').css('display','none');
				}, 8000);
			}
			
		},

		error: function(json)
		{

		}
	});
}

function editarUsuario(id) 
{
	buscarDadosUsuario( id );
}

function editarGrupoUsuario( id ) 
{
	buscarDadosUsuario( id );
}

function buscarDadosUsuario( id )
{
    /*busca dados do usuario para ser editado*/
	$.ajax({
		type: 'post',
		url : '../class/UsuarioClass.php',
		data: {id:id, buscarEditar:'buscarEditar'},
		dataType: 'json',
		success: function( json )
		{
			if(json != null)
			{
				$('#idParaEditar').val(json.id);
				$('#nomeEditar').val(json.nome);
				$('#cpfEditar').val(json.cpf);
				$('#emailEditar').val(json.email);
				$('#enderecoEditar').val(json.endereco);
				$('#cidadeEditar').val(json.cidade);
				$('#estadoEditar').val(json.estado);
				$('#modalParaEditar').modal('show');
			} else {
				
				$('.editarErro').css('display','block');
				setTimeout(function(){
					$('.editarErro').css('display','none');
				}, 8000);
			}
		}
	});
}

function editando()
{
	$.ajax({

		type: 'post',
		url: '../class/UsuarioClass.php',
		data: {

			editando:'editando',
			nome: $('#nomeEditar').val(),
			cpf: $('#cpfEditar').val(),
			email: $('#emailEditar').val(),
			endereco: $('#enderecoEditar').val(),
			cidade: $('#cidadeEditar').val(),
			estado: $('#estadoEditar').val(),
			idParaEditar: $('#idParaEditar').val()
		},	

		success: function(json)
		{

			$('#nomeEditar').val(''),
			$('#cpfEditar').val(''),
			$('#emailEditar').val(''),
			$('#enderecoEditar').val(''),
			$('#cidadeEditar').val(''),
			$('#estadoEditar').val(''),
			$('#idParaEditar').val('')
			$('#modalParaEditar').modal('hide');

			if(json) 
			{
				$('.editar').css('display','block');
				setTimeout(function(){
					location.reload()
					$('.editar').css('display','none');
				}, 5000);
			} else {

				$('.editarErro').css('display','block');
				setTimeout(function(){
					$('.editarErro').css('display','none');
				}, 5000);
			}

		},

		error: function( json )
		{
			console.log('Problemas no sistema!');
		},
	});
}