<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculoController extends Controller
{
    
    public function chamarTelaLogicaUm()
    {

    	session(['escondeMenuCadastrar' => true]);
    	return view('calculo.calculo');
    }

	public function testeLogicaUm( Request $request )
	{

	
		$total = $request->qtdProduto * $request->precoUnitario; 

		if( $request->qtdProduto <= 5)
		{
			$desconto = 2;
		} else if( $request->qtdProduto > 5 && $request->qtdProduto <= 10 )
		{
			$desconto = 3;
		}else
		{
			$desconto = 5;
		} 

		$totalParaPagar = $total - $total / 100 * $desconto;

		return response()->json(['totalParaPagar' => number_format($totalParaPagar, 2, ',','.')]);
	}

	public function calculoUsinaAngraReis( Request $request )
	{
		$segundos = 0;

		while ($request->massa >= 0.10) {
			$request->massa -= ($request->massa * 0.25);
			$segundos += 30; 
		}

		return response()->json(['tempo' => $segundos]);
	}
}
