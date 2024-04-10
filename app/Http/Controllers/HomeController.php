<?php

namespace App\Http\Controllers;

use App\Models\Intranet\Admin\Category;

class HomeController extends Controller
{
    public function index()
    {
        $category = Category::all();

        return view('intranet.home', compact('category'));
    }
}
