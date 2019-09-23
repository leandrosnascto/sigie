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

$('#calcularValor').on('click', function(){

	toastr["info"]('Realizando o cálculo!');
	$.ajax({
		type: 'post',
		url: 'calcular-produtos',
		data: {
			nomeDescricao: $('#nomeDescricao').val(),
			qtdProduto   : $('#qtdProduto').val(),
			precoUnitario: $('#precoUnitario').val(),
			customSwitch3: $('#customSwitch3').val()
		},
		dataType: 'json',

		success: function( json )
		{
        $('#valor').val(json.totalParaPagar);
		}

	});
});

$('#tempoUsinaAgra').on('click', function(){

    $.ajax({
      type: 'post',
      url: 'tempo-usina-angra-reis',
      data: {massa:$('#massa').val()},
      dataType: 'json',

      success: function(json)
      {

        $('#tempo').html( 'Segundos : ' +json.tempo );
        $('.modalTempoAgra').modal('show');
      }
    });
});

$('#fechaModelTempoAngra').on('click', function(){
  $('.modalTempoAgra').modal('hide')
});