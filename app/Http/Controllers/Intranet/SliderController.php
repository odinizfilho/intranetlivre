<?php

namespace App\Http\Controllers\Intranet;

use App\Http\Controllers\Controller;
use App\Models\Intranet\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    // Exibir todos as imagens do slider
    public function index()
    {
        $sliderImages = Slider::latest()->get();

        return view('intranet.admin.slider.index', compact('sliderImages'));
    }

    // Exibir o formulário para criar uma nova imagem do slider
    public function create()
    {
        return view('intranet.admin.slider.create');
    }

    // Salvar uma nova imagem do slider no banco de dados
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'link' => 'required|string',
            'src_slider' => 'image|mimes:webp,jpeg,png,jpg,gif|max:2048', // Validação da imagem de destaque
        ]);

        $slide = new Slider();
        $slide->title = $request->title;
        $slide->content = $request->content;
        $slide->link = $request->link;
        // Associa o usuário ao post

        // Upload da imagem de destaque
        if ($request->hasFile('src_slider')) {
            $slide->addMedia($request->file('src_slider'))->toMediaCollection('src_slider');
        }

        $slide->save();

        return redirect()->route('slider.index')->with('success', 'slide criado com sucesso!');
    }

    // Exibir um imagem específica do slider
    public function show(Slider $sliderImage)
    {
        return view('intranet.admin.slider.show', compact('sliderImage'));
    }

    // Exibir o formulário para editar uma imagem do slider
    public function edit(Slider $sliderImage)
    {
        return view('intranet.admin.slider.edit', compact('sliderImage'));
    }
}
