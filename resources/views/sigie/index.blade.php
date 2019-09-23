@extends('layouts.app')

@section('content')


	<div class="modal fade" id="modalCadastrarInstituicao">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Cadastrar Instituições</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 	<span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="#" method="post" id="formCadastroInstituicao" accept-charset="utf8">
				{{ csrf_field() }}
				<div class="row">
	                <div class="form-group col-md-6">
	                  <label>Nome Instituição:</label>

	                  <div class="input-group">
	                    <div class="input-group-prepend">
	                      <span class="input-group-text"><i class=""></i></span>
	                    </div>
	                    <input type="text" class="form-control float-right" id="nomeInstituicao" name="nomeInstituicao" maxlength="100" value="" required>
	                  </div>
	                  
	                </div>

	                <div class="form-group col-md-3">
	                  <label>Cnpj Instituição:</label>

	                  <div class="input-group">
	                    <div class="input-group-prepend">
	                      <span class="input-group-text"><i class=""></i></span>
	                    </div>
	                    <input type="text" class="form-control float-right" id="cnpjInstituicao" name="cnpjInstituicao" maxlength="14" value="" required>
	                  </div>
	                  
	                </div>

	                <div class="form-group col-md-3">
	                    <label>Status Instituição:</label>

	                    <div class="form-group clearfix">
		                  
		                    <input type="checkbox" id="statusInstituicao" name="statusInstituicao" value="1" required>
		                    <label>
		                    	obs: ativo clicado.
		                    </label>
		                  
		                </div>
	                  
	                </div>
	            </div>
               
	            </div>
		            <div class="modal-footer justify-content-between">
		              <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
		              <button type="button" class="btn btn-primary" id="cadastrarInstituicao" >Salvar</button>
		            </div>
	            </div>
	        </form>
     
        </div>
    </div>
   
   	<div class="modal fade" id="modalCadastrarCursos">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Cadastrar Cursos</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 	<span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="#" method="post" accept-charset="utf8" id="formCadastroCurso">
				{{ csrf_field() }}
				<div class="row">
	                <div class="form-group col-md-6">
	                  <label>Nome Curso:</label>

	                  <div class="input-group">
	                    <div class="input-group-prepend">
	                      <span class="input-group-text"><i class=""></i></span>
	                    </div>
	                    <input type="text" class="form-control float-right" id="nomeCurso" name="nomeCurso" maxlength="100" value="" required>
	                  </div>
	                  
	                </div>

	                <div class="form-group col-md-4">
	                  <label>Duração Curso:</label>

	                  <div class="input-group">
	                    <div class="input-group-prepend">
	                      <span class="input-group-text"><i class=""></i></span>
	                    </div>
	                    <input type="number" class="form-control float-right" id="duracaoCurso" name="duracaoCurso" maxlength="2" value="" required>
	                  </div>
	                  
	                </div>

	                <div class="form-group col-md-2">
	                    <label>Status Curso:</label>

	                    <div class="form-group clearfix">
		                  
		                    <input type="checkbox" name="statusCurso" id="statusCurso" value="1" required>
		                    <label>
		                    	obs: ativo clicado.
		                    </label>
		                  
		                </div>
	                  
	                </div>
	            </div>

	            <div class="row">

	            	<div class="form-group col-md-4">
	                    <label>Nome Instituição:</label>

	                  	<select class="form-control select2" name="instituicaoId" id="instituicaoId" style="width: 100%;" required>
	                  		<option value="">Selecione uma instituição</option>
	                  		@foreach( $instituicoes as $valor )
	                  			<option value="{{ $valor->id_instituicao }}">{{ $valor->nome_instituicao }}</option>
	                  		@endforeach
	                  	</select> 
	                </div>

	            </div>
               
	            </div>
		            <div class="modal-footer justify-content-between">
		              <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
		              <button type="button" class="btn btn-primary" id="cadastrarCurso">Salvar</button>
		            </div>
	            </div>

	        </form>
     
        </div>
   	</div>

   	<div class="modal fade" id="modalAtualizarAluno">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Atualizar Alunos</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 	<span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
            <form action="#" method="post" accept-charset="utf8" id="formAtualizarAlunos">
		
				{{ csrf_field() }}

				<input type="hidden" name="idAlunosEditar" id="idAlunosEditar" value="">

				<div class="card card-default">
		        <div class="card-header">
		            <h3 class="card-title">Cadastro Alunos</h3>
		        </div>
		        <div class="card-body">

		        	<div class="row">
		            <!-- Date range -->
			            <div class="form-group col-md-4">
			              <label>Nome:</label>

			              <div class="input-group">
			                <div class="input-group-prepend">
			                  <span class="input-group-text">
			                    <i class=""></i>
			                  </span>
			                </div>
			                <input type="text" class="form-control float-right" id="nomeEditar" name="nomeEditar" maxlength="100" value="" required>
			              </div>
			              <!-- /.input group -->
			            </div>
			            
			            <div class="form-group col-md-4">
			              <label>Cpf:</label>

			              <div class="input-group">
			                <div class="input-group-prepend">
			                  <span class="input-group-text"><i class=""></i></span>
			                </div>
			                <input type="text" class="form-control float-right" id="cpfEditar" name="cpfEditar" maxlength="11"  value="" required>
			              </div>
			              <!-- /.input group -->
			            </div>
			            
			            <div class="form-group col-md-4">
			              <label>Data Nascimento:</label>

			              <div class="input-group">
			                <div class="input-group-prepend">
			                  <span class="input-group-text"><i class=""></i></span>
			                </div>
			                <input type="date" class="form-control float-right" id="dataNascimentoEditar" name="dataNascimentoEditar" value="" required>
			              </div>
			              <!-- /.input group -->
			            </div>
			        </div>

			        <div class="row">
		            <!-- Date range -->
			            <div class="form-group col-md-4">
			              <label>E-mail:</label>

			              <div class="input-group">
			                <div class="input-group-prepend">
			                  <span class="input-group-text">
			                    <i class=""></i>
			                  </span>
			                </div>
			                <input type="text" class="form-control float-right" id="emailEditar" name="emailEditar" maxlength="100" value="" required>
			              </div>
			              <!-- /.input group -->
			            </div>
			            
			            <div class="form-group col-md-4">
			              <label>Celular:</label>

			              <div class="input-group">
			                <div class="input-group-prepend">
			                  <span class="input-group-text"><i class=""></i></span>
			                </div>
			                <input type="text" class="form-control float-right" id="celularEditar" name="celularEditar" value="" required>
			              </div>
			              <!-- /.input group -->
			            </div>
			            
			            <div class="form-group col-md-4">
			              <label>Endereco:</label>

			              <div class="input-group">
			                <div class="input-group-prepend">
			                  <span class="input-group-text"><i class=""></i></span>
			                </div>
			                <input type="text" class="form-control float-right" id="enderecoEditar" name="enderecoEditar" maxlength="100" value="" required>
			              </div>
			              <!-- /.input group -->
			            </div>
			        </div>

			        <div class="row">
		            <!-- Date range -->
			            <div class="form-group col-md-4">
			              <label>Número:</label>

			              <div class="input-group">
			                <div class="input-group-prepend">
			                  <span class="input-group-text">
			                    <i class=""></i>
			                  </span>
			                </div>
			                <input type="number" class="form-control float-right" id="numeroEditar" name="numeroEditar" maxlength="7" value="" required>
			              </div>
			              <!-- /.input group -->
			            </div>
			            
			            <div class="form-group col-md-4">
			              <label>Bairro:</label>

			              <div class="input-group">
			                <div class="input-group-prepend">
			                  <span class="input-group-text"><i class=""></i></span>
			                </div>
			                <input type="text" class="form-control float-right" id="bairroEditar" name="bairroEditar" maxlength="50" value="" required>
			              </div>
			              <!-- /.input group -->
			            </div>
			            
			            <div class="form-group col-md-4">
			              <label>Cidade:</label>

			              <div class="input-group">
			                <div class="input-group-prepend">
			                  <span class="input-group-text"><i class=""></i></span>
			                </div>
			                <input type="text" class="form-control float-right" id="cidadeEditar" name="cidadeEditar" maxlength="50" value="" required>
			              </div>
			              <!-- /.input group -->
			            </div>
			        </div>

			        <div class="row">
		            <!-- Date range -->
			            <div class="form-group col-md-4">
			              <label>Uf:</label>

			              <div class="input-group">
			                <div class="input-group-prepend">
			                  <span class="input-group-text">
			                    <i class=""></i>
			                  </span>
			                </div>
			                <input type="text" class="form-control float-right" id="ufEditar" name="ufEditar" maxlength="2" value="" required>
			              </div>
			              <!-- /.input group -->
			            </div>
			            
			            <div class="form-group col-md-4">
			              <label>Status:</label>

			                <div class="form-group clearfix">
		                  
			                    <input type="checkbox" id="statusEditar" name="statusEditar" value="1" required>
			                    <label>
			                    	obs: ativo clicado.
			                    </label>
		                  
		                	</div>
			              <!-- /.input group -->
			            </div>
			            
			            <div class="form-group col-md-4">
			              <label>Curso:</label>

			              <select name="cursoIdAtualizar" class="form-control select2" id="cursoIdAtualizar" required style="width: 100%;">
			              	

			              </select>
			            </div>
			        </div>
		           
		        </div>

		        </div>
		            <div class="justify-content-between">
		              <button style="float: right;" type="button" id="editarSalvarAlunos" class="btn btn-primary">Salvar</button>
		            </div>
		        </div>
		    	</div>
		    </form>
     
        </div>
   	</div>

   	<section class="content">

        <div class="row">
	        <div class="col-12">
	          <div class="card">
	            <div class="card-header">
	              <h3 class="card-title">Listagem de alunos ativos</h3>
	            </div>
	           
	            <div class="card-body">
	              <table id="tabelaListagemAlunos" class="table table-bordered table-hover">
	                <thead>
		                <tr>
		                  <th>#</th>
		                  <th>Instituição</th>
		                  <th>Curso</th>
		                  <th>Nome Aluno</th>
		                  <th>E-mail</th>
		                  <th>Ativo/Inativo</th>
		                  <th>Editar</th>
		                  <th>Excluir</th>
		                </tr>
	                </thead>
	                <tbody>
						@foreach( $listagemAlunos as $listagem )
			                <tr id="{{ $listagem->id_alunos }}">
			                  <td>{{ $listagem->id_alunos }}</td>
			                  <td>{{ $listagem->nome_instituicao }}</td>
			                  <td>{{ $listagem->nome_cursos }}</td>
			                  <td>{{ $listagem->nome_alunos }}</td>
			                  <td>{{ $listagem->email_alunos }}</td>
			                  <td>{{ ($listagem->status_alunos == 'A') ? 'ATIVO' : 'INATIVO' }}</td>
			                  <td><button class='btn btn-primary' type='button' onclick="editarAluno('{{ $listagem->id_alunos }}')" value="{{ $listagem->id_alunos }}" id="editarUsuario">Editar</button></td>
			                  <td><button class='btn btn-danger' type='button' onclick="excluiLinhaAluno('{{ $listagem->id_alunos }}')">Excluir</button></td>
			                </tr>
		                @endforeach
	                </tfoot>
	              </table>
	            </div>
	          </div>
	        </div>
        </div>
      
    </section>

    <div class="modal fade modalExclusao" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="TituloModalCentralizado">EXCLUIR</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="text-align: center;">
            VOCÊ REALMENTE DESEJA EXCLUIR ESTE ALUNO ?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="excluirMesmo(2)">FECHAR</button>
            <button type="button" class="btn btn-danger" onclick="excluirMesmo(1)">EXCLUIR</button>
          </div>
        </div>
      </div>
  
      <input type="hidden" name="exclusao" id="guardaIdParaExcluir" value="">

    </div>


@endsection

@section('js')
	<script src="{{ asset('/js/listagem.js') }}" type="text/javascript" charset="utf-8" async defer></script>
	<script src="{{ asset('/js/atualizar.js') }}" type="text/javascript" charset="utf-8" async defer></script>
	<script src="{{ asset('/js/deletar.js') }}" type="text/javascript" charset="utf-8" async defer></script>
	<script src="{{ asset('/js/cadastrar.js') }}" type="text/javascript" charset="utf-8" async defer></script>
@endsection