<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\Setor;
use Rap2hpoutre\FastExcel\FastExcel;

class SetorController extends Controller
{
    public function index()
    {
        $setor = Setor::all();
        return view('setor.index', compact('setor'));
    }

    public function create()
    {
        return view('setor.create');
    }

    public function import()
    {
        return view('setor.import');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cod_setor' => 'required|string',
            'nome' => 'required|string',
        ]);

        Setor::create($request->all());

        return redirect()->route('setor.index')
            ->with('success', 'setor criado com sucesso.');
    }

    public function edit($id)
    {
        $setor = Setor::find($id);

        if (!$setor) {
            abort(404);
        }

        return view('setor.edit', compact('setor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'cod_setor' => 'required|string',
            'nome' => 'required|string',
        ]);

        $setor = Setor::find($id);

        if (!$setor) {
            abort(404);
        }

        $setor->update($request->all());

        return redirect()->route('setor.index')
            ->with('success', 'setor atualizado com sucesso.');
    }

    public function destroy($id)
    {
        Setor::destroy($id);

        return redirect()->route('setor.index')
            ->with('success', 'setor excluído com sucesso.');
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

                if (count($data) >= 2) {
                    $setorData = [
                        'cod_setor' => $data[0],
                        'nome' => $data[1],
                        // Adicione outras colunas do modelo setor conforme necessário
                    ];

                    $validator = Validator::make($setorData, [
                        'cod_setor' => 'required|string',
                        'nome' => 'required|string',
                        // Valide outros campos aqui
                    ]);

                    if ($validator->fails()) {
                        return Redirect::route('setor.import')->withErrors($validator);
                    }

                    Setor::create($setorData);
                }
            }

            return redirect()->route('setor.index')->with('success', 'Dados do CSV importados com sucesso.');
        } catch (\Exception $e) {
            return redirect()->route('setor.import')->with('error', 'Ocorreu um erro durante a importação do CSV. Por favor, verifique o formato do arquivo e tente novamente.');
        }
    }

    public function generateexemplocsv()
    {
        $columns = [
            'cod_setor',
            'nome',
            // Adicione outras colunas, se necessário
        ];

        $filename = 'setor.xlsx';

        (new FastExcel([]))->export($filename, function ($row) {
            // Preencha as colunas com dados de exemplo, se necessário
        });

        $headers = [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        return response()->download($filename, $filename, $headers);
    }

    public function generateexcel()
    {
        $data = Setor::all();
        $filename = 'setor.xlsx';

        (new FastExcel($data))->export($filename);

        $headers = [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        return response()->download($filename, $filename, $headers);
    }

    public function show($id)
    {
        $setor = Setor::find($id);

        if (!$setor) {
            abort(404);
        }

        return view('setor.show', compact('setor'));
    }
}
