<?php

namespace App\Http\Controllers\Intranet;

use App\Http\Controllers\Controller;
use App\Models\Intranet\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    // Exibir todos os posts
    public function index()
    {
        $posts = Post::latest()->get();

        return view('intranet.users.blog.index', compact('posts'));
    }

    // Exibir o formulário para criar um novo post
    public function create()
    {
        return view('intranet.users.blog.create');
    }

    // Salvar um novo post no banco de dados
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $user = Auth::user();

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->slug = Str::of($request->title)->slug();
        $post->user()->associate($user); // Associa o usuário ao post
        $post->save();

        return redirect()->route('blog.index')->with('success', 'Post criado com sucesso!');
    }

    // Exibir um post específico
    public function show(Post $post)
    {
        return view('intranet.users.blog.show', compact('post'));
    }

    // Exibir o formulário para editar um post
    public function edit(Post $post)
    {
        return view('intranet.users.blog.edit', compact('post'));
    }

    // Atualizar um post no banco de dados
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post->title = $request->title;
        $post->content = $request->content;
        $post->slug = Str::of($request->title)->slug();
        $post->save();

        return redirect()->route('blog.index')->with('success', 'Post atualizado com sucesso!');
    }

    // Excluir um post do banco de dados
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('blog.index')->with('success', 'Post excluído com sucesso!');
    }
}
