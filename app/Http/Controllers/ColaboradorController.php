<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colaborador;
use App\Models\Unidade;
use App\Models\Cargo;
use App\Models\Setor;
use App\Models\User;
use Illuminate\Database\QueryException;
use Carbon\Carbon;



class ColaboradorController extends Controller
{
    public function index()
    {
        $unidades = Unidade::all();
        $cargos = Cargo::all();
        $usuarios = User::all();
        $setores = Setor::all();
        $colaboradores = Colaborador::paginate(10); // Paginação para listar 10 colaboradores por página
        return view('colaboradores.index', compact('colaboradores', 'unidades', 'cargos', 'usuarios', 'setores'));
    }

    public function create()
    {
        $unidades = Unidade::all();
        $cargos = Cargo::all();
        $usuarios = User::all();
        $setores = Setor::all();
        return view('colaboradores.create', compact('unidades', 'cargos', 'usuarios', 'setores'));
    }

    public function store(Request $request)
    {
        // Validar os dados do formulário
        $request->validate([
            'matricula' => 'required|unique:d_colaborador,matricula',
            // Adicione outras regras de validação aqui
        ]);

        try {
            // Criar um novo colaborador com base nos dados do formulário
            $colaborador = new Colaborador([
                'matricula' => $request->input('matricula'),
                'cod_unidade' => $request->input('cod_unidade'),
                'data_nascimento' => $request->input('data_nascimento'),
                'telefone' => $request->input('telefone'),
                'ramal' => $request->input('ramal'),
                'cod_cargo' => $request->input('cod_cargo'),
                'cod_setor' => $request->input('cod_setor'),
                'data_admissao' => $request->input('data_admissao'),
                'matricula_gestor' => $request->input('matricula_gestor'),
            ]);

            $colaborador->save();

            return redirect()->route('colaboradores.index')->with('success', 'Colaborador criado com sucesso!');
        } catch (QueryException $e) {
            // Verificar se a exceção é devido a uma violação de chave estrangeira
            if ($e->errorInfo[1] == 1452) {
                $errorMessage = 'Erro ao criar o colaborador. A unidade especificada não existe.';
            } else {
                $errorMessage = 'Erro ao criar o colaborador. Por favor, verifique os dados e tente novamente.';
            }

            return redirect()->route('colaboradores.create')->withErrors([$errorMessage]);
        }
    }

    public function edit(Colaborador $colaborador)
    {
        $unidades = Unidade::all();
        $cargos = Cargo::all();
        $usuarios = User::all();
        $setores = Setor::all();

        return view('colaboradores.edit', compact('colaborador', 'unidades', 'cargos', 'usuarios', 'setores'));
    }

    public function update(Request $request, Colaborador $colaborador)
    {
        // Validar os dados do formulário
        $request->validate([
            'matricula' => 'required|unique:d_colaborador,matricula,' . $colaborador->id,
            // Adicione outras regras de validação aqui
        ]);

        try {
            // Atualizar os dados do colaborador com base nos dados do formulário
            $colaborador->update([
                'matricula' => $request->input('matricula'),
                'cod_unidade' => $request->input('cod_unidade'),
                'data_nascimento' => $request->input('data_nascimento'),
                'telefone' => $request->input('telefone'),
                'ramal' => $request->input('ramal'),
                'cod_cargo' => $request->input('cod_cargo'),
                'cod_setor' => $request->input('cod_setor'),
                'data_admissao' => $request->input('data_admissao'),
                'matricula_gestor' => $request->input('matricula_gestor'),
            ]);

            return redirect()->route('colaboradores.index')->with('success', 'Colaborador atualizado com sucesso!');
        } catch (QueryException $e) {
            // Verificar se a exceção é devido a uma violação de chave estrangeira
            if ($e->errorInfo[1] == 1452) {
                $errorMessage = 'Erro ao atualizar o colaborador. A unidade especificada não existe.';
            } else {
                $errorMessage = 'Erro ao atualizar o colaborador. Por favor, verifique os dados e tente novamente.';
            }

            return redirect()->route('colaboradores.edit', $colaborador)->withErrors([$errorMessage]);
        }
    }

    // Adicione métodos para edição, atualização e exclusão de colaboradores aqui

    public function show(Colaborador $colaborador)
    {
        return view('colaboradores.show', compact('colaborador'));
    }

    public function aniversariantes()
    {
        // Obtém o mês atual
        $mesAtual = Carbon::now()->month;
        $usuarios = User::all();
    
        // Consulta os colaboradores com aniversário no mês atual usando o modelo
        $aniversariantes = Colaborador::whereMonth('data_nascimento', $mesAtual)->get();
    
        return view('colaboradores.aniversariantes', compact('aniversariantes', 'usuarios'));
    }
}