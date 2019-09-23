
$(document).ready( function () {
    $('#tabelaListagemAlunos').DataTable({
		"language": {
    		"url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese.json"
		},

		"pageLength": 5

	});

	$('.select2').select2();
} );

