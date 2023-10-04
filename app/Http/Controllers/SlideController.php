<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide; // Certifique-se de importar o modelo Slide.

class SlideController extends Controller
{
    /**
     * Exibe a lista de todos os slides.
     */
    public function index()
    {
        $slides = Slide::all();
        return view('slides.index', compact('slides'));
    }

    /**
     * Exibe o formulário de criação de um novo slide.
     */
    public function create()
    {
        return view('slides.create');
    }

    /**
     * Armazena um novo slide no banco de dados.
     */
    public function store(Request $request)
{
    $request->validate([
        'image_url' => 'required|image|mimes:svg,jpeg,png,jpg,gif|max:2048', // Validação da imagem
        'title' => 'nullable|string',
        'display_order' => 'nullable|integer',
        // Outras regras de validação para os campos do slide aqui
    ]);

    $imagePath = null;

    if ($request->hasFile('image_url')) {
        $image = $request->file('image_url');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = $image->storeAs('uploads', $imageName, 'public');
        // Certifique-se de criar a pasta 'uploads' no diretório 'public' se ainda não existir.
        $imagePath = 'uploads/' . $imageName;
    }

    // Crie um novo slide com os dados do formulário e o caminho da imagem
    $slide = new Slide([
        'image_url' => $imagePath,
        'title' => $request->input('title'),
        'display_order' => $request->input('display_order'),
        // Outros campos do slide aqui
    ]);

    $slide->save();

    return redirect()->route('slides.index')
        ->with('success', 'Slide criado com sucesso!');
}


    /**
     * Exibe um slide específico.
     */
    public function show(Slide $slide)
    {
        return view('slides.show', compact('slide'));
    }

    /**
     * Exibe o formulário de edição de um slide específico.
     */
    public function edit(Slide $slide)
    {
        return view('slides.edit', compact('slide'));
    }

    /**
     * Atualiza um slide específico no banco de dados.
     */
    public function update(Request $request, Slide $slide)
    {
        // Validação dos dados do formulário aqui, se necessário.

        $slide->update($request->all());

        return redirect()->route('slides.index')
            ->with('success', 'Slide atualizado com sucesso!');
    }

    /**
     * Remove um slide específico do banco de dados.
     */
    public function destroy(Slide $slide)
    {
        $slide->delete();

        return redirect()->route('slides.index')
            ->with('success', 'Slide removido com sucesso!');
    }
}
