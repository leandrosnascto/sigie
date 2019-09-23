@extends('layouts.app')

@section('content')

	<div class="callout callout-danger">
        <h4>Observação</h4>
        Ao relizar o cálculo, o desconto será de acordo com a quantidade de produtos, note:
		<br> 
        Até 5 produtos, será <b>2%</b> de desconto.<br>
        De 5 a 10 produtos, será <b>3%</b> de desconto.<br>
        Acima de 10 produtos, será <b>5%</b> de desconto.
    </div>


	<div class="card card-default">


        <div class="card-header">
            <h3 class="card-title">Calculando Produtos</h3>
        </div>
        <div class="card-body">

        	{{ csrf_field() }}

        	<div class="row">
            <!-- Date range -->
	            <div class="form-group col-md-6">
	              <label>Descrição Produto:</label>

	              <div class="input-group">
	                <div class="input-group-prepend">
	                  <span class="input-group-text">
	                    <i class=""></i>
	                  </span>
	                </div>
	                <input type="text" class="form-control float-right" id="nomeDescricao" name="nomeDescricao" value="" maxlength="100" required>
	              </div>
	              <!-- /.input group -->
	            </div>
	            
	            <div class="form-group col-md-2">
	              <label>Quantidade:</label>

	              <div class="input-group">
	                <div class="input-group-prepend">
	                  <span class="input-group-text"><i class=""></i></span>
	                </div>
	                <input type="number" class="form-control float-right" id="qtdProduto" name="qtdProduto" value="" maxlength="10" required>
	              </div>
	              <!-- /.input group -->
	            </div>
	            
	            <div class="form-group col-md-2">
	              <label>Preço unitário:</label>

	              <div class="input-group">
	                <div class="input-group-prepend">
	                  <span class="input-group-text"><i class=""></i></span>
	                </div>
	                <input type="number" class="form-control float-right" id="precoUnitario" name="precoUnitario" value="" maxlength="10" required>
	              </div>
	              <!-- /.input group -->
	            </div>

	            <div class="form-group col-md-2">
	              <label>Valor Pagar R$:</label>

	              <div class="input-group">
	                
	                <input type="text" class="form-control float-right" id="valor" name="valor" value="" maxlength="10" disabled>
	              </div>
	              <!-- /.input group -->
	            </div>
	        </div>
           
        </div>

        <div class="card-body">
			<div class="row">
				<div class="form-group col-md-3">
	              <label>Valor da massa usina angra:</label>

	              <div class="input-group">
	                <div class="input-group-prepend">
	                  <span class="input-group-text"><i class=""></i></span>
	                </div>
	                <input type="number" class="form-control float-right" id="massa" name="qtdProduto" value="" maxlength="10" required>
	              </div>
	              <!-- /.input group -->
	            </div>
			</div>

            <div class="justify-content-between">
				<button style="float: left;" type="button" id="tempoUsinaAgra" class="btn btn-primary">Motrar Tempo Usina Angra</button>

                <button style="float: right;" type="button" id="calcularValor" class="btn btn-primary">Calcular</button>

            </div>
	        
        </div>

    </div>


     <div class="modal fade modalTempoAgra" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="TituloModalCentralizado">TEMPO ANGRA DOS REIS</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="text-align: center;">
           		<div id="tempo"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="fechaModelTempoAngra">FECHAR</button>
          </div>
        </div>
      </div>


@endsection    

@section('js')
	<script src="{{ asset('/js/calculo/calculo.js') }}" type="text/javascript" charset="utf-8"></script>
@endsection