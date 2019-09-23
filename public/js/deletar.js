$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

function excluiLinhaAluno( id )
{
	$('.modalExclusao').modal('show');
	$('#guardaIdParaExcluir').val(id);
}

function excluirMesmo( a )
{
	$('.modalExclusao').modal('hide');

	if( a == 1 )
	{
		excluiAluno( $('#guardaIdParaExcluir').val() );
	} 
}

function excluiAluno( id )
{
	$.ajax({
		type: 'post',
		url :'deletar-registro-aluno',
		data: {
			id:id
		},
		dataType: 'json',

		success: function(json)
		{	
			if(json.erro == 'N') {
				/*poderia usar o closest para pega informação e remover*/
				$('#'+id).fadeOut(2000,function() {
					$('#'+id).remove('tr');
				});

			    toastr["success"](json.alerta);
			} else {
				toastr["error"](json.alerta);
			}	
		},
	});
}