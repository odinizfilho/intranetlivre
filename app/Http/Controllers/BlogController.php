<?php
namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Http;


class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('blogs.index', compact('blogs'));
    }


    public function dashboard(Request $request)
    {
        $latestPosts = Blog::latestThree()->get();
    
        // Obter latitude e longitude do usuário
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
    
        // Usar latitude e longitude padrão caso não sejam fornecidas
        if (empty($latitude) || empty($longitude)) {
            $latitude = -23.52; // Latitude padrão
            $longitude = -51.69; // Longitude padrão
        }
    
        // URL da API
        $url = 'https://api.open-meteo.com/v1/forecast?latitude=' . $latitude . '&longitude=' . $longitude . '&hourly=temperature_2m&current_weather=true&forecast_days=1&timezone=America%2FSao_Paulo';
    
        try {
            // Fazer a solicitação GET para a API
            $response = Http::get($url);
    
            // Verificar se a solicitação foi bem-sucedida
            if ($response->successful()) {
                $content = $response->body();
    
                // Obter a temperatura atual
                $temperature = $this->getTemperatureAtCurrentTime($content);
    
                if ($temperature !== null) {
                    return view('dashboard', compact('latestPosts', 'temperature'));
                }
            }
        } catch (\Exception $e) {
            // Tratar qualquer exceção que possa ocorrer durante a solicitação
            // ou obtenção da temperatura atual.
            // Por exemplo, você pode registrar a exceção ou exibir uma mensagem de erro.
        }
    
        // Caso ocorra algum erro durante a solicitação da API ou obtenção da temperatura,
        // retornar apenas os últimos posts.
        return view('dashboard', compact('latestPosts'));
    }
    

private function getTemperatureAtCurrentTime($jsonContent)
{
    // Decodifica o JSON
    $data = json_decode($jsonContent);

    // Obtém a data e hora atual no formato "Y-m-d\TH:i"
    $currentTime = date('Y-m-d\TH:i');

    // Verifica se a hora atual existe nos dados da previsão
    if (in_array($currentTime, $data->hourly->time)) {
        // Obtém o índice da hora atual
        $index = array_search($currentTime, $data->hourly->time);

        // Obtém a temperatura correspondente
        $temperature = $data->hourly->temperature_2m[$index];

        return $temperature;
    } else {
        // Procura a temperatura mais próxima
        $closestTime = $this->getClosestTime($data->hourly->time, $currentTime);

        if ($closestTime !== null) {
            // Obtém o índice do horário mais próximo
            $index = array_search($closestTime, $data->hourly->time);

            // Obtém a temperatura correspondente
            $temperature = $data->hourly->temperature_2m[$index];

            return $temperature;
        }
    }

    return null;
}

private function getClosestTime($times, $targetTime)
{
    $closestTime = null;
    $closestDiff = PHP_INT_MAX;

    foreach ($times as $time) {
        $diff = abs(strtotime($time) - strtotime($targetTime));

        if ($diff < $closestDiff) {
            $closestTime = $time;
            $closestDiff = $diff;
        }
    }

    return $closestTime;
}


    



    public function show($id)
    {
        $post = Blog::with('user')->findOrFail($id);
        $authorName = $post->user->name ?? 'Autor desconhecido';
        $postLink = $post->link(); // Substitua 'link()' pelo nome do método que retorna o link do post
        $image_path = $post->image_path;

        return view('blogs.show', compact('post', 'authorName', 'postLink'));
    }
    

    public function create()
    {
        $categories = Category::all();
        return view('blogs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'categories' => 'array',
            'categories.*' => 'exists:categories,id',
            'image' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
    
        $imagePath = null;
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('upload', $imageName, 'public');
            $imagePath = 'upload/' . $imageName;
        }
    
        $blog = Blog::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'image_path' => $imagePath,
            'user_id' => auth()->user()->id,
        ]);
    
        $blog->categories()->attach($request->input('categories'));
    
        // Obtém a URL do post
        $postUrl = route('posts.show', $blog->id);
    
        // Enviar e-mail para todos os usuários
        return redirect()->route('posts.show', $blog->id)->with('success', 'Blog post created successfully!');
    }
    





    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = Category::all();
        $blogCategories = $blog->categories->pluck('id')->toArray();
        return view('blogs.edit', compact('blog', 'categories', 'blogCategories'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'categories' => 'array',
            'categories.*' => 'exists:categories,id',
        ]);

        $blog = Blog::findOrFail($id);
        $blog->update($validatedData);

        $blog->categories()->sync($request->input('categories'));

        return redirect()->route('posts.index')->with('success', 'Blog post updated successfully!');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('posts.index')->with('success', 'Blog post deleted successfully!');
    }
}