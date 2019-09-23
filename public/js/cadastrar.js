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

function abrirModalCadastrarInstituicao()
{
	$('#modalCadastrarInstituicao').modal('show');
}

function abrirModalCadastrarCursos()
{
	$('#modalCadastrarCursos').modal('show');
}

$('#cadastrarAlunos').on('click', function(){

	$.ajax({

		type: 'post',
		url: 'cadastrar-alunos',
		data: $('form').serialize(),
		dataType: 'json',

		success: function(json)
		{
			if(json.erro == 'N')
			{
				toastr["success"](json.alerta);
			} else {
				toastr["error"](json.alerta);
			}
		},

		error: function()
		{

		}
	});
});

$('#cadastrarInstituicao').on('click', function(){
	$.ajax({

		type: 'post',
		url: 'cadastrar-instituicao',
		data: $('#formCadastroInstituicao').serialize(),
		dataType: 'json',

		success: function(json)
		{

			if(json.erro == 'N')
			{
				$('#modalCadastrarInstituicao').modal('hide');
				$('#nomeInstituicao').val('');
				$('#cnpjInstituicao').val('');
				$('#statusInstituicao').val('');
				toastr["success"](json.alerta);

				setTimeout(function(){
					window.location.reload();
				},3000);
			} else {
				toastr["error"](json.alerta);
			}
		},

		error: function()
		{

		}
	});
});

$('#cadastrarCurso').on('click', function(){
	$.ajax({

		type: 'post',
		url: 'cadastrar-curso',
		data: $('#formCadastroCurso').serialize(),
		dataType: 'json',

		success: function(json)
		{
			if(json.erro == 'N')
			{
				$('#modalCadastrarCursos').modal('hide');
				$('#nomeCurso').val('');
				$('#duracaoCurso').val('');
				$('#statusCurso').val('');
				$('#instituicaoId').val('');
				toastr["success"](json.alerta);
			} else {
				toastr["error"](json.alerta);
			}
		},

		error: function()
		{

		}
	});
});

$(document).ready(function(){
	$('.select2').select2();
});