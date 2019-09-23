<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CursosModel extends Model
{
    protected $table = 'cursos';

    public function insereDadosCursos( $request )
    {
    	$valores = DB::table( $this->table )
    	->insert([
    		'nome_cursos' => mb_strtoupper($request->nomeCurso) ,
    		'duracao_cursos' => mb_strtoupper($request->duracaoCurso) ,
    		'status_cursos' => (isset($request->statusCurso)) ? 'A' : 'I',
    		'id_instituicao' => $request->instituicaoId
    	]);

    	return $valores;
    }

    public function buscarCursosAtivos()
    {
        #A = ativo
        #I = inativo
        $valores = DB::table( $this->table )
        ->where('status_cursos', 'A')
        ->get();

        return $valores;
    }
}
