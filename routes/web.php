<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('index', 'Sigie\CrudController@index');
route::get('buscar-tela-cadastro-alunos', 'Sigie\CrudController@buscarTelaCadastroAlunos')->name('telaAlunos');
route::post('cadastrar-alunos', 'Sigie\CrudController@cadastrarAlunos');
route::post('cadastrar-instituicao', 'Sigie\CrudController@cadastrarInstituicao');
route::post('cadastrar-curso', 'Sigie\CrudController@cadastrarCurso');
route::post('editar-aluno', 'Sigie\CrudController@editarAluno');
route::post('salvar-dados-atualizados-alunos', 'Sigie\CrudController@salvarDadosAtualizadosAlunos');
route::post('deletar-registro-aluno', 'Sigie\CrudController@deletarRegistroAluno');

route::get('calculo', 'CalculoController@chamarTelaLogicaUm');
route::post('calcular-produtos', 'CalculoController@testeLogicaUm');

route::post('tempo-usina-angra-reis', 'CalculoController@calculoUsinaAngraReis');