<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colaborador;
use App\Models\Unidade;
use App\Models\Cargo;
use App\Models\User;
use Illuminate\Database\QueryException;



class ColaboradorController extends Controller
{
    public function index()
    {
        $unidades = Unidade::all();
        $cargos = Cargo::all();
        $usuarios = User::all();
        $colaboradores = Colaborador::paginate(10); // Paginação para listar 10 colaboradores por página
        return view('colaboradores.index', compact('colaboradores','unidades', 'cargos', 'usuarios'));
    }

    public function create()
    {
        $unidades = Unidade::all();
        $cargos = Cargo::all();
        $usuarios = User::all();
        return view('colaboradores.create', compact('unidades', 'cargos', 'usuarios'));
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



    // Adicione métodos para edição, atualização e exclusão de colaboradores aqui

    public function show(Colaborador $colaborador)
    {
        return view('colaboradores.show', compact('colaborador'));
    }
}