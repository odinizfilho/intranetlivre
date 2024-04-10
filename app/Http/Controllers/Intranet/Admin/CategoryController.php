<?php

namespace App\Http\Controllers\Intranet\Admin;

use App\Http\Controllers\Controller;
use App\Models\Intranet\Admin\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();

        return view('intranet.admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('intranet.admin.categories.create');
    }

    public function edit(Category $category)
    {
        return view('intranet.admin.categories.edit', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'slug' => 'required|string|max:255|regex:/^[a-z0-9-]+$/|unique:categories,slug',
            // Você pode adicionar outras regras de validação, se necessário
        ]);

        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
        ];

        // Verifique se 'description' está presente no pedido antes de atribuí-lo
        if ($request->has('description')) {
            $data['description'] = $request->description;
        }

        try {
            Category::create($data);

            return redirect()->route('categories.index')->with('success', 'Categoria criada com sucesso.');
        } catch (\Exception $e) {
            return redirect()->route('categories.create')->withErrors(['error' => 'Ocorreu um erro ao criar a categoria: '.$e->getMessage()]);
        }
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,'.$category->id,
            'slug' => 'required|string|max:255|unique:categories,slug,'.$category->id,
            // Você pode adicionar outras regras de validação, se necessário
        ]);

        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
        ];

        // Verifique se 'description' está presente no pedido antes de atribuí-lo
        if ($request->has('description')) {
            $data['description'] = $request->description;
        }

        try {
            $category->update($data);

            return redirect()->route('categories.index')->with('success', 'Categoria atualizada com sucesso.');
        } catch (\Exception $e) {
            return redirect()->route('categories.edit', $category)->withErrors(['error' => 'Ocorreu um erro ao atualizar a categoria: '.$e->getMessage()]);
        }
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Categoria excluída com sucesso.');
    }
}
