<?php

namespace App\Http\Controllers\Intranet\Admin;

use App\Http\Controllers\Controller; // Importe a classe Controller corretamente
use App\Models\Intranet\Admin\Apps; // Importe o modelo Apps corretamente
use Illuminate\Http\Request;

class AppsController extends Controller
{
    // Exibe o formulário para criar um novo aplicativo
    public function create()
    {
        return view('intranet.admin.apps.create');
    }

    // Armazena o novo aplicativo no banco de dados
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image_url' => 'required|url',
            'app_link' => 'required|url',
            'active' => 'required|boolean',
        ]);

        Apps::create($request->all());

        return redirect()->route('apps.create')->with('success', 'Apps created successfully.');
    }

    // Atualiza os detalhes de um aplicativo no banco de dados
    public function update(Request $request, Apps $Apps)
    {
        $request->validate([
            'name' => 'required',
            'image_url' => 'required|url',
            'app_link' => 'required|url',
            'active' => 'required|boolean',
        ]);

        $Apps->update($request->all());

        return redirect()->route('Appss.index')->with('success', 'Apps updated successfully.');
    }

    // Exclui um aplicativo do banco de dados
    public function destroy(Apps $Apps)
    {
        $Apps->delete();

        return redirect()->route('Appss.index')->with('success', 'Apps deleted successfully.');
    }

 
}
