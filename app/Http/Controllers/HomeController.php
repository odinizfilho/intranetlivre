<?php

namespace App\Http\Controllers;

use App\Models\Intranet\Admin\Category; // Certifique-se de importar o modelo Post
use App\Models\Intranet\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->take(3)->get();
        $categories = Category::all();

        return view('intranet.home', compact('categories', 'posts'));
    }
}
