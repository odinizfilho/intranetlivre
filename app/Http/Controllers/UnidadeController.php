<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\Unidade;
use Rap2hpoutre\FastExcel\FastExcel;

class UnidadeController extends Controller
{
    public function index()
    {
        $unidades = Unidade::all();
        return view('unidades.index', compact('unidades'));
    }

    public function create()
    {
        return view('unidades.create');
    }

    public function import()
    {
        return view('unidades.import');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cod_unidade' => 'required|string',
            'nome' => 'required|string',
            'descricao' => 'nullable|string',
            'endereco' => 'nullable|string',
            'cep' => 'nullable|string',
            'telefone' => 'nullable|string',
            'email' => 'nullable|email',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        Unidade::create($request->all());

        return redirect()->route('unidades.index')
            ->with('success', 'Unidade criada com sucesso.');
    }

    public function edit($id)
    {
        $unidade = Unidade::find($id);

        if (!$unidade) {
            abort(404); // Retorna um erro 404 se a unidade não existir
        }

        return view('unidades.edit', compact('unidade'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'cod_unidade' => 'required|integer',
            'nome' => 'required|string',
            'descricao' => 'nullable|string',
            'endereco' => 'nullable|string',
            'cep' => 'nullable|string',
            'telefone' => 'nullable|string',
            'email' => 'nullable|email',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        $unidade = Unidade::find($id);
        $unidade->update($request->all());

        return redirect()->route('unidades.index')
            ->with('success', 'Unidade atualizada com sucesso.');
    }

    public function destroy($id)
    {
        Unidade::destroy($id);

        return redirect()->route('unidades.index')
            ->with('success', 'Unidade excluída com sucesso.');
    }




    public function importcsv(Request $request)
    {
        try {
            $request->validate([
                'csv_file' => 'required|mimes:csv,txt',
            ]);

            $file = $request->file('csv_file');
            $fileContents = file_get_contents($file->getRealPath());
            $lines = explode(PHP_EOL, $fileContents);

            foreach ($lines as $line) {
                $data = str_getcsv($line);

                // Verifique se há dados suficientes na linha (ajuste conforme necessário)
                if (count($data) >= 2) {
                    $unidadeData = [
                        'cod_unidade' => $data[0],
                        'nome' => $data[1],
                        // Adicione outras colunas do modelo Unidade conforme necessário
                    ];

                    // Valide os dados antes de criar a unidade
                    $validator = Validator::make($unidadeData, [
                        'cod_unidade' => 'required|integer',
                        'nome' => 'required|string',
                        // Valide outros campos aqui
                    ]);

                    if ($validator->fails()) {
                        return Redirect::route('unidades.import')->withErrors($validator);
                    }

                    Unidade::create($unidadeData);
                }
            }

            return redirect()->route('unidades.index')->with('success', 'Dados do CSV importados com sucesso.');
        } catch (\Exception $e) {
            return redirect()->route('unidades.import')->with('error', 'Ocorreu um erro durante a importação do CSV. Por favor, verifique o formato do arquivo e tente novamente.');
        }
    }

    public function generateexemplocsv()
    {
        // Define as colunas que você deseja incluir no arquivo Excel
        $columns = [
            'cod_unidade',
            'nome',
            'descricao',
            'endereco',
            'cep',
            'telefone',
            'email',
            'latitude',
            'longitude',
        ];
    
        // Nome do arquivo a ser gerado e baixado
        $filename = 'unidades.xlsx';
    
        // Crie um array de arrays vazios para representar apenas as colunas
        $columnData = array_fill(0, count($columns), []);
    
        // Exporte o array de colunas para um arquivo Excel usando FastExcel
        (new FastExcel($columnData))->export($filename);
    
        // Defina os cabeçalhos de resposta para download, especificando o tipo de conteúdo
        $headers = [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];
    
        // Retorne o arquivo Excel gerado para download
        return response()->download($filename, $filename, $headers);
    }
    

    public function generateexcel()
    {
        // Retrieve data from the 'Unidade' model
        $data = Unidade::all();
    
        // Name of the file to be generated and downloaded
        $filename = 'unidades.xlsx';
    
        // Export the data to an Excel file using FastExcel
        (new FastExcel($data))->export($filename);
    
        // Define response headers for download
        $headers = [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];
    
        // Return the generated Excel file for download
        return response()->download($filename, $filename, $headers);
    }






    public function show($id)
    {
        // Encontre a unidade com o ID especificado
        $unidade = Unidade::find($id);

        if (!$unidade) {
            // Se a unidade não for encontrada, retorne uma resposta 404
            abort(404);
        }

        // Se a unidade for encontrada, exiba a visualização com os dados da unidade
        return view('unidades.show', compact('unidade'));
    }


}