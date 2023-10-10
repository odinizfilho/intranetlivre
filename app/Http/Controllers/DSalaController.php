<?php

namespace App\Http\Controllers;

use App\Models\DSala;
use Illuminate\Http\Request;

class DSalaController extends Controller
{
    public function index()
    {
        $salas = DSala::all();
        return view('salas.index', compact('salas'));
    }

    public function create()
    {
        return view('salas.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string',
            'capacidade' => 'required|integer',
            'descricao' => 'nullable|string',
        ]);

        DSala::create($data);

        return redirect()->route('salas.index')->with('success', 'Sala criada com sucesso.');
    }

    public function edit(DSala $sala)
    {
        return view('salas.edit', compact('sala'));
    }

    public function update(Request $request, DSala $sala)
    {
        $data = $request->validate([
            'nome' => 'required|string',
            'capacidade' => 'required|integer',
            'descricao' => 'nullable|string',
        ]);

        $sala->update($data);

        return redirect()->route('salas.index')->with('success', 'Sala atualizada com sucesso.');
    }

    public function destroy(DSala $sala)
    {
        $sala->delete();

        return redirect()->route('salas.index')->with('success', 'Sala excluída com sucesso.');
    }
}
