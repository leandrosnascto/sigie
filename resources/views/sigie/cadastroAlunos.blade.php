@extends('layouts.app')

@section('content')

	<form action="#" method="post" accept-charset="utf8">
		
		{{ csrf_field() }}

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
	                <input type="text" class="form-control float-right" id="nome" name="nome" maxlength="100" value="" required>
	              </div>
	              <!-- /.input group -->
	            </div>
	            
	            <div class="form-group col-md-4">
	              <label>Cpf:</label>

	              <div class="input-group">
	                <div class="input-group-prepend">
	                  <span class="input-group-text"><i class=""></i></span>
	                </div>
	                <input type="number" class="form-control float-right" id="cpf" name="cpf" maxlength="11" value="" required>
	              </div>
	              <!-- /.input group -->
	            </div>
	            
	            <div class="form-group col-md-4">
	              <label>Data Nascimento:</label>

	              <div class="input-group">
	                <div class="input-group-prepend">
	                  <span class="input-group-text"><i class=""></i></span>
	                </div>
	                <input type="date" class="form-control float-right" id="dataNascimento" name="dataNascimento" value="" required>
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
	                <input type="text" class="form-control float-right" id="email" name="email" maxlength="100" value="" required>
	              </div>
	              <!-- /.input group -->
	            </div>
	            
	            <div class="form-group col-md-4">
	              <label>Celular:</label>

	              <div class="input-group">
	                <div class="input-group-prepend">
	                  <span class="input-group-text"><i class=""></i></span>
	                </div>
	                <input type="number" class="form-control float-right" id="celular" name="celular"  value="" required>
	              </div>
	              <!-- /.input group -->
	            </div>
	            
	            <div class="form-group col-md-4">
	              <label>Endereco:</label>

	              <div class="input-group">
	                <div class="input-group-prepend">
	                  <span class="input-group-text"><i class=""></i></span>
	                </div>
	                <input type="text" class="form-control float-right" id="endereco" name="endereco" maxlength="100" value="" required>
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
	                <input type="number" class="form-control float-right" id="numero" name="numero" maxlength="7" value="" required>
	              </div>
	              <!-- /.input group -->
	            </div>
	            
	            <div class="form-group col-md-4">
	              <label>Bairro:</label>

	              <div class="input-group">
	                <div class="input-group-prepend">
	                  <span class="input-group-text"><i class=""></i></span>
	                </div>
	                <input type="text" class="form-control float-right" id="bairro" name="bairro" maxlength="50" value="" required>
	              </div>
	              <!-- /.input group -->
	            </div>
	            
	            <div class="form-group col-md-4">
	              <label>Cidade:</label>

	              <div class="input-group">
	                <div class="input-group-prepend">
	                  <span class="input-group-text"><i class=""></i></span>
	                </div>
	                <input type="text" class="form-control float-right" id="cidade" name="cidade" maxlength="50" value="" required>
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
	                <input type="text" class="form-control float-right" id="uf" name="uf" maxlength="2" value="" required>
	              </div>
	              <!-- /.input group -->
	            </div>
	            
	            <div class="form-group col-md-4">
	              	<label>Status:</label>

	                <div class="form-group clearfix">
		                  
	                    <input type="checkbox" id="status" name="status" value="1" required>
	                    <label>
	                    	obs: ativo clicado.
	                    </label>
              
            		</div>

	            </div>
	            
	            <div class="form-group col-md-4">
	              <label>Curso:</label>

	              <select name="cursoId" class="form-control select2" style="width: 100%;" required>
	              	<option value="">Selecione um curso</option>
	              	@foreach( $cursosAtivos as $curso )
						<option value="{{ $curso->id_cursos }}"> {{ $curso->nome_cursos }} </option>
						
	              	@endforeach
	              </select>
	            </div>
	        </div>

	        </div class="row">
            	<div class="justify-content-between">
                	<button style="float: right;" type="button" id="cadastrarAlunos" class="btn btn-primary">Salvar</button>
            	</div>
        	</div>
           
        </div>

    	</div>
    </form>
              
@endsection    

@section('js')
	<script src="{{ asset('/js/cadastrar.js') }}" type="text/javascript" charset="utf-8" async defer></script>
@endsection