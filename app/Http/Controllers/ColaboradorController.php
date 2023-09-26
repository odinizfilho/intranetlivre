<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colaborador;
use App\Models\Unidade;
use App\Models\Cargo;
use App\Models\User;

class ColaboradorController extends Controller
{
    public function index()
    {
        $colaboradores = Colaborador::paginate(10); // Paginação para listar 10 colaboradores por página
        return view('colaboradores.index', compact('colaboradores'));
    }

    public function create()
    {
        $unidades = Unidade::all();
        $cargos = Cargo::all();
        $gestores = User::all();
        return view('colaboradores.create', compact('unidades', 'cargos', 'gestores'));
    }

    public function store(Request $request)
    {
        // Validar os dados do formulário
        $request->validate([
            'cpf_colaborador' => 'required|unique:d_colaborador,cpf_colaborador',
            // Adicione outras regras de validação aqui
        ]);

        // Criar um novo colaborador com base nos dados do formulário
        $colaborador = new Colaborador([
            'cpf_colaborador' => $request->input('cpf_colaborador'),
            'cod_unidade' => $request->input('cod_unidade'),
            'data_nascimento' => $request->input('data_nascimento'),
            'telefone' => $request->input('telefone'),
            'ramal' => $request->input('ramal'),
            'cod_cargo' => $request->input('cod_cargo'),
            'data_admissao' => $request->input('data_admissao'),
            'cpf_gestor' => $request->input('cpf_gestor'),
        ]);

        $colaborador->save();

        return redirect()->route('colaboradores.index')->with('success', 'Colaborador criado com sucesso!');
    }

    // Adicione métodos para edição, atualização e exclusão de colaboradores aqui

    public function show(Colaborador $colaborador)
    {
        return view('colaboradores.show', compact('colaborador'));
    }
}
