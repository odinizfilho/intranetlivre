<?php

namespace App\Http\Controllers\Intranet;

use App\Http\Controllers\Controller;
use App\Models\Intranet\Admin\Category;
use App\Models\Intranet\DocManager;
use App\Models\Intranet\DocumentShare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocManagerController extends Controller
{
    public function index()
    {
        $documents = DocManager::latest()->get();
        $categories = Category::all(); // Recuperar todas as categorias

        return view('intranet.users.doc.index', compact('documents', 'categories'));
    }

    public function create()
    {
        $categories = Category::all(); // Recuperar todas as categorias

        return view('intranet.users.doc.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'document' => 'required|file|mimes:pdf|max:2048',
            'is_public' => 'required|boolean',
            'category_id' => 'required|exists:categories,id', // Validação da categoria selecionada
        ]);

        $input = $request->all();

        $input['user_id'] = Auth::id();

        $document = DocManager::create([
            'title' => $input['title'],
            'description' => $input['description'],
            'user_id' => $input['user_id'],
            'is_public' => $input['is_public'],
            'category_id' => $input['category_id'], // Salvar a categoria selecionada
        ]);

        if (! $input['is_public'] && isset($input['shared_with'])) {
            foreach ($input['shared_with'] as $userId) {
                DocumentShare::create([
                    'document_id' => $document->id,
                    'user_id' => $userId,
                ]);
            }
        }

        if ($request->hasFile('document') && $request->file('document')->isValid()) {
            $media = $document->addMediaFromRequest('document')->toMediaCollection('documents');
            $document->media_id = $media->id; // Associar o ID da mídia ao documento
            $document->save();
        }

        return redirect()->route('docmanager.index');
    }

    public function show($id)
    {
        $document = DocManager::findOrFail($id);
        $media = $document->getFirstMedia('documents');

        return view('intranet.users.doc.show', compact('document', 'media'));
    }

    public function download($id, $filename)
    {
        $document = DocManager::findOrFail($id);
        $media = $document->getFirstMedia('documents');

        if ($media && $media->file_name === $filename) {
            $path = $media->getPath();

            return response()->download($path, $filename);
        } else {
            abort(404, 'Mídia não encontrada.');
        }
    }

    public function documentsByCategory($categorySlug)
    {
        // Encontre a categoria com base na slug
        $category = Category::where('slug', $categorySlug)->firstOrFail();

        // Recupere os documentos associados a essa categoria
        $documents = DocManager::where('category_id', $category->id)->get();

        return view('intranet.users.doc.documents_by_category', compact('documents', 'category'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string', // Validação opcional para o parâmetro de pesquisa
        ]);

        // Inicializa a consulta de documentos
        $query = DocManager::query();

        // Verifica se há um termo de pesquisa
        if ($request->has('search')) {
            $searchTerm = $request->input('search');

            // Aplica a pesquisa no título e na descrição do documento
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', '%'.$searchTerm.'%')
                    ->orWhere('description', 'like', '%'.$searchTerm.'%');
            });
        }

        // Se houver categoria especificada na pesquisa
        if ($request->has('category_id')) {
            $categoryId = $request->input('category_id');

            // Filtra os documentos pela categoria especificada
            $query->where('category_id', $categoryId);
        }

        // Recupera os documentos correspondentes à consulta
        $documents = $query->latest()->get();

        // Recupera todas as categorias para exibição na barra lateral ou em um filtro
        $category = Category::all();

        return view('intranet.users.doc.search', compact('documents', 'category'));
    }
}
