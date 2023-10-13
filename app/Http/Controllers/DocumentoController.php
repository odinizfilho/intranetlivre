<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\FatoDocumento;
use App\Models\FatoTags;
use App\Models\Category;

class DocumentoController extends Controller
{
    /**
     * Mostra o formulário de upload de documentos.
     *
     * @return \Illuminate\View\View
     */
    public function showUploadForm()
    {
        $categorias = Category::all();
        return view('documentos.upload', compact('categorias'));
    }

    /**
     * Processa o upload de documentos e associa tags, se aplicável.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function upload(Request $request)
    {
        $categorias = Category::all();
        // Validação dos dados do formulário
        $request->validate([
            'file' => 'required|file',
            // Adicione mais regras de validação, se necessário
        ]);

        // Faça o upload do arquivo para o servidor
        $uploadedFile = $request->file('file');
        $path = $uploadedFile->storeAs('upload/drive/documentos');

        // Crie um novo registro na tabela de fatos (documentos)
        $documento = new FatoDocumento();
        $documento->nome = $uploadedFile->getClientOriginalName();
        $documento->caminho = $path;
        $documento->save();

        // Associe as tags, se fornecidas no formulário
        $tags = $request->input('tags', []);
        $documento->tags()->sync($tags);

        // Redirecione para a página de sucesso ou erro
        return redirect()->route('documentos.index')->with('success', 'Documento enviado com sucesso!');
    }

    /**
     * Pesquisa avançada de documentos com base em critérios.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        $termoPesquisa = $request->input('termoPesquisa');
        $categoriaId = $request->input('categoria');
        $tags = $request->input('tags', []);

        // Consulta para pesquisa de documentos
        $query = FatoDocumento::query();

        if (!empty($termoPesquisa)) {
            $query->where('nome', 'LIKE', "%$termoPesquisa%");
        }

        if (!empty($categoriaId)) {
            $query->where('categoria_id', $categoriaId);
        }

        if (!empty($tags)) {
            $query->whereHas('tags', function ($query) use ($tags) {
                $query->whereIn('id', $tags);
            });
        }

        $documentos = $query->get();

        $categorias = Category::all();
        $tags = FatoTags::all();

        return view('documentos.index', compact('documentos', 'categorias', 'tags'));
    }

    public function show($id)
    {
        // Recupere o documento com base no ID
        $documento = FatoDocumento::find($id);

        // Verifique se o documento foi encontrado
        if (!$documento) {
            return redirect()->route('documentos.index')->with('error', 'Documento não encontrado');
        }

        // Aqui você pode adicionar a lógica para exibir o documento na sua view
        // Por exemplo, você pode criar uma view chamada 'documentos.show' e passar o $documento para essa view

        return view('documentos.show', compact('documento'));
    }


    /**
     * Exibe a página de categorização de documentos.
     *
     * @return \Illuminate\View\View
     */
    public function showCategories()
    {
        // Recupere as categorias e tags disponíveis para a categorização
        $categorias = Category::all(); // Substitua "Categoria" pelo nome do seu modelo de categoria, se aplicável
        $tags = FatoTags::all();

        return view('documentos.categories', [
            'categorias' => $categorias,
            'tags' => $tags,
        ]);
    }

    /**
     * Associa tags aos documentos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function categorize(Request $request)
    {
        // Valide os dados do formulário de categorização
        $request->validate([
            'documento_id' => 'required|exists:documentos,id',
            'tags' => 'array',
        ]);

        $documentoId = $request->input('documento_id');
        $tags = $request->input('tags', []);

        $documento = FatoDocumento::find($documentoId);
        $documento->tags()->sync($tags);

        // Redirecione de volta para a página de categorização com uma mensagem de sucesso
        return redirect()->route('categories')->with('success', 'Tags associadas com sucesso ao documento.');
    }

    /**
     * Exporta um documento para um formato específico (PDF, Word, Excel, etc.).
     *
     * @param  int  $id
     * @param  string  $format
     * @return \Illuminate\Http\Response
     */
    public function export($id, $format)
    {
        // Valide o formato
        //$formatosValidos = ['pdf', 'doc', 'txt']; // Adicione formatos válidos
        //if (!in_array($format, $formatosValidos)) {
        // return abort(400); // Bad Request para formato inválido
        //}

        // Encontre o documento no banco de dados
        $documento = FatoDocumento::find($id);

        // Verifique se o documento foi encontrado
        if (!$documento) {
            return abort(404); // Ou qualquer outra ação apropriada se o documento não for encontrado
        }

        // Construa o caminho completo para o arquivo
        $caminhoDoArquivo = public_path($documento->caminho);

        // Verifique se o arquivo existe
        if (!file_exists($caminhoDoArquivo)) {
            return abort(404); // Ou qualquer outra ação apropriada se o arquivo não for encontrado
        }

        // Use a coluna "nome" do banco de dados como o nome do arquivo
        $nomeDoArquivo = $documento->nome;

        // Determine o Content-Type com base no formato (ajuste conforme necessário)
        $contentType = 'application/octet-stream';
        if ($format === 'pdf') {
            $contentType = 'application/pdf';
        } elseif ($format === 'doc') {
            $contentType = 'application/msword';
        }

        // Crie uma resposta de download com o Content-Type correto
        return response()->download($caminhoDoArquivo, $nomeDoArquivo, [
            'Content-Type' => $contentType,
            'Content-Disposition' => 'attachment; filename="' . $nomeDoArquivo . '"',
        ]);
    }

    public function visualizar($pdf)
{
    $id = $pdf;
    if (!$id) {
        return abort(404); // Ou qualquer outra ação apropriada se o documento não for encontrado
    }
    return view('documentos.iframe', compact('id'));
}



}