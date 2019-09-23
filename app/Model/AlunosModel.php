<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AlunosModel extends Model
{
    protected $table = 'alunos';

    public function insereDadosAlunos( $request )
    {
    	$valores = DB::table( $this->table )
    	->insert([
    		'nome_alunos' => mb_strtoupper($request->nome) ,
    		'cpf_alunos' => (int)$request->cpf ,
    		'data_nascimento_alunos' => date('Y-m-d', strtotime($request->dataNascimento) ),
    		'email_alunos' => mb_strtoupper($request->email) ,
    		'celular_alunos' => (int)$request->celular ,
    		'endereco_alunos' => mb_strtoupper($request->endereco) ,
    		'numero_endereco_alunos' => (int)$request->numero,
    		'bairro_alunos' => mb_strtoupper($request->bairro) ,
    		'cidade_alunos' => mb_strtoupper($request->cidade) ,
    		'uf_alunos' => mb_strtoupper($request->uf),
    		'status_alunos' => (isset($request->status)) ? 'A' : 'I',
    		'id_cursos' => $request->cursoId 
    	]);

    	return $valores;
    }

    public function listagemAlunosIndex()
    {
        $valores = DB::table( 'alunos as a' )
        ->leftJoin('cursos as c', 'a.id_cursos', '=', 'c.id_cursos')
        ->leftJoin('instituicao as i', 'c.id_instituicao', '=', 'i.id_instituicao')
        ->where('a.status_alunos', 'A')
        ->get();

        return $valores;
    }

    public function buscarInformacaoAlunoParaAtualizar( $request )
    {
        $valores = DB::table( $this->table )
        ->where('id_alunos', $request->idAluno)
        ->first();

        return $valores;
    }

    public function gravarDadosAtualizadosAlunos( $request )
    {

        $valores = DB::table( $this->table )
        ->where('id_alunos', $request->idAlunosEditar)
        ->update([
            'nome_alunos' => mb_strtoupper($request->nomeEditar) ,
            'cpf_alunos' => (int)$request->cpfEditar ,
            'data_nascimento_alunos' => date('Y-m-d', strtotime($request->dataNascimentoEditar) ),
            'email_alunos' => mb_strtoupper($request->emailEditar) ,
            'celular_alunos' => (int)$request->celularEditar ,
            'endereco_alunos' => mb_strtoupper($request->enderecoEditar) ,
            'numero_endereco_alunos' => (int)$request->numeroEditar ,
            'bairro_alunos' => mb_strtoupper($request->bairroEditar) ,
            'cidade_alunos' => mb_strtoupper($request->cidadeEditar) ,
            'uf_alunos' => mb_strtoupper($request->ufEditar) ,
            'status_alunos' => (isset($request->statusEditar)) ? 'A' : 'I', 
            'id_cursos' => $request->cursoIdAtualizar
        ]);

        return $valores;
    }

    public function deletarInformacoesDoAluno( $request )
    {
        $delete = DB::table( $this->table )
        ->where('id_alunos', $request->id)
        ->delete();

        return $delete;
    }
}
