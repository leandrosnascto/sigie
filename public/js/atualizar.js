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


function editarAluno( idAluno )
{
	$.ajax({
		type: 'post',
		url: 'editar-aluno',
		data: {idAluno:idAluno},
		dataType: 'json',

		success: function(json)
		{
			var option = '<option value="">Selecione um curso</option>';
			$.each(json.cursos, function(index,value){
				option += '<option value="'+value.id_cursos+'">'+value.nome_cursos+'</option>';
			});

			$('#idAlunosEditar').val(json.dadosAlunosEditar.id_alunos)

			$('#nomeEditar').val(json.dadosAlunosEditar.nome_alunos);
			$('#cpfEditar').val(json.dadosAlunosEditar.cpf_alunos);
			$('#dataNascimentoEditar').val(json.dadosAlunosEditar.data_nascimento_alunos);
			$('#emailEditar').val(json.dadosAlunosEditar.email_alunos);
			$('#celularEditar').val(json.dadosAlunosEditar.celular_alunos);
			$('#enderecoEditar').val(json.dadosAlunosEditar.endereco_alunos);
			$('#numeroEditar').val(json.dadosAlunosEditar.numero_endereco_alunos);
			$('#bairroEditar').val(json.dadosAlunosEditar.bairro_alunos);
			$('#cidadeEditar').val(json.dadosAlunosEditar.cidade_alunos);
			$('#ufEditar').val(json.dadosAlunosEditar.uf_alunos);

			if(json.dadosAlunosEditar.status_alunos == 'A')
			{
				$('#statusEditar').prop('checked',true);
			} else {
				$('#statusEditar').prop('checked',false);
			}
			$('#cursoIdAtualizar').html(option);
			$('#cursoIdAtualizar').val( json.dadosAlunosEditar.id_cursos );


			$('#modalAtualizarAluno').modal('show');
		},

		error: function()
		{

		}

	});
}

$('#editarSalvarAlunos').on('click', function(){
	$.ajax({
		type: 'post',
		url: 'salvar-dados-atualizados-alunos',
		data: $('#formAtualizarAlunos').serialize(),
		dataType: 'json',

		success: function(json)
		{

			if(json.erro == 'N')
			{
				toastr["success"](json.alerta);
				$('#idAlunosEditar').val('')
				$('#nomeEditar').val('');
				$('#cpfEditar').val('');
				$('#dataNascimentoEditar').val('');
				$('#emailEditar').val('');
				$('#celularEditar').val('');
				$('#enderecoEditar').val('');
				$('#numeroEditar').val('');
				$('#bairroEditar').val('');
				$('#cidadeEditar').val('');
				$('#ufEditar').val('');
				$('#statusEditar').prop('checked', false);
				$('#cursoIdAtualizar').val('');
				$('#modalAtualizarAluno').modal('hide');
			} else {
				toastr["error"](json.alerta);
			}
		}

	});
});