<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unidade;

class UnidadeController extends Controller
{
    public function index()
    {
        $unidades = Unidade::all();
        return view('unidades.index', compact('unidades'));
    }

    public function create()
    {
        return view('unidades.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cod_unidade' => 'required|integer',
            'nome' => 'required|string',
            'descricao' => 'nullable|string',
            'endereco' => 'nullable|string',
            'cep' => 'nullable|string',
            'telefone' => 'nullable|string',
            'email' => 'nullable|email',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        Unidade::create($request->all());

        return redirect()->route('unidades.index')
            ->with('success', 'Unidade criada com sucesso.');
    }

    public function edit($id)
    {
        $unidade = Unidade::find($id);
        return view('unidades.edit', compact('unidade'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'cod_unidade' => 'required|integer',
            'nome' => 'required|string',
            'descricao' => 'nullable|string',
            'endereco' => 'nullable|string',
            'cep' => 'nullable|string',
            'telefone' => 'nullable|string',
            'email' => 'nullable|email',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        $unidade = Unidade::find($id);
        $unidade->update($request->all());

        return redirect()->route('unidades.index')
            ->with('success', 'Unidade atualizada com sucesso.');
    }

    public function destroy($id)
    {
        Unidade::destroy($id);

        return redirect()->route('unidades.index')
            ->with('success', 'Unidade excluída com sucesso.');
    }
}
