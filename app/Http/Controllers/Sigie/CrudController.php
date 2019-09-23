<?php

namespace App\Http\Controllers\Sigie;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\AlunosModel;
use App\Model\CursosModel;
use App\Model\InstituicaoModel;

class CrudController extends Controller
{
    
    private $alunosModel;
    private $cursosModel;
    private $instituicao;

    public function __construct(
    	AlunosModel $alunosModel,
    	CursosModel $cursosModel
    )
    {
    	$this->alunosModel      = $alunosModel;
    	$this->cursosModel      = $cursosModel;
        $this->instituicao = new InstituicaoModel(); 
    }


    public function index( Request $request )
    {

        $request->session()->flush();

		return view('sigie.index', [
            'instituicoes'   => $this->instituicao->buscarInstituicaoAtivas(),
            'listagemAlunos' => $this->alunosModel->listagemAlunosIndex(),
        ]);
    }

    public function buscarTelaCadastroAlunos()
    {

        session(['escondeMenuCadastrar' => true]);

    	return view('sigie.cadastroAlunos',[
            'cursosAtivos' => $this->cursosModel->buscarCursosAtivos()
        ]);
    }

    public function cadastrarAlunos( Request $request)
    {
    	$insere = $this->alunosModel->insereDadosAlunos( $request );
    	if( $insere )
    	{
    		return response()->json([
    			'alerta' => 'Dados inseridos com sucesso!',
    			'erro'   => 'N'
    		]);
    	} else {
    		return response()->json([
    			'alerta' => 'Erro ao inserir os dados do aluno: '.$request->nome,
    			'erro'   => 'S'
    		]);
    	}
    }

    public function cadastrarInstituicao( Request $request )
    {
    	$insere = $this->instituicao->insereDadosInstituicao( $request );
    	if( $insere )
    	{
    		return response()->json([
    			'alerta' => 'Dados inseridos com sucesso!',
    			'erro'   => 'N'
    		]);
    	} else {
    		return response()->json([
    			'alerta' => 'Erro ao inserir os dados da instituição: '.$request->nome,
    			'erro'   => 'S'
    		]);
    	}
    }

    public function cadastrarCurso( Request $request )
    {

        $insere = $this->cursosModel->insereDadosCursos( $request );
        if( $insere )
        {
            return response()->json([
                'alerta' => 'Dados inseridos com sucesso!',
                'erro'   => 'N'
            ]);
        } else {
            return response()->json([
                'alerta' => 'Erro ao inserir os dados do curso: '.$request->nomeCurso,
                'erro'   => 'S'
            ]);
        }
    }

    public function editarAluno( Request $request )
    {

        return response()->json([
            'dadosAlunosEditar' => $this->alunosModel->buscarInformacaoAlunoParaAtualizar( $request ),
            'cursos'            => $this->cursosModel->buscarCursosAtivos()
        ]);
    }

    public function salvarDadosAtualizadosAlunos( Request $request )
    {
        $atualiza = $this->alunosModel->gravarDadosAtualizadosAlunos( $request );  
        if( $atualiza )
        {
            return response()->json([
                'alerta' => 'Dados atualizados com sucesso!',
                'erro'   => 'N'
            ]);
        } else {
            return response()->json([
                'alerta' => 'Erro ao atualizar os dados do aluno: '.$request->nomeEditar,
                'erro'   => 'S'
            ]);
        }
    }

    public function deletarRegistroAluno( Request $request )
    {
        if( $this->alunosModel->deletarInformacoesDoAluno( $request ) )
        {
            return response()->json([
                'alerta' => 'Dados excluidos com sucesso!',
                'erro'   => 'N'
            ]);
        } else {
            return response()->json([
                'alerta' => 'Erro ao excluir os dados do aluno solicitado',
                'erro'   => 'S'
            ]);
        }
    }
}
