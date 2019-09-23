<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class InstituicaoModel extends Model
{
    

    protected $table = 'instituicao';

    public function insereDadosInstituicao( $request )
    {
    	$valores = DB::table( $this->table )
    	->insert([
    			'nome_instituicao'   => mb_strtoupper($request->nomeInstituicao) ,
    			'cnpj_instituicao'   => (int)$request->cnpjInstituicao ,
    			'status_instituicao' => (isset($request->statusInstituicao)) ? 'A' : 'I'
    	]);

    	return $valores;
    }

    public function buscarInstituicaoAtivas()
    {
        #A = ativo
        #I = inativo
        $valores = DB::table( $this->table )
        ->where('status_instituicao', 'A')
        ->get();

        return $valores;
    }
}
