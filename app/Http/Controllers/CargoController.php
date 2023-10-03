<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\Cargo;
use Rap2hpoutre\FastExcel\FastExcel;

class CargoController extends Controller
{
    public function index()
    {
        $cargos = Cargo::all();
        return view('cargos.index', compact('cargos'));
    }

    public function create()
    {
        return view('cargos.create');
    }

    public function import()
    {
        return view('cargos.import');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cod_cargo' => 'required|string',
            'nome' => 'required|string',
        ]);

        Cargo::create($request->all());

        return redirect()->route('cargos.index')
            ->with('success', 'Cargo criado com sucesso.');
    }

    public function edit($id)
    {
        $cargo = Cargo::find($id);

        if (!$cargo) {
            abort(404);
        }

        return view('cargos.edit', compact('cargo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'cod_cargo' => 'required|string',
            'nome' => 'required|string',
        ]);

        $cargo = Cargo::find($id);

        if (!$cargo) {
            abort(404);
        }

        $cargo->update($request->all());

        return redirect()->route('cargos.index')
            ->with('success', 'Cargo atualizado com sucesso.');
    }

    public function destroy($id)
    {
        Cargo::destroy($id);

        return redirect()->route('cargos.index')
            ->with('success', 'Cargo excluído com sucesso.');
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
                    $cargoData = [
                        'cod_cargo' => $data[0],
                        'nome' => $data[1],
                        // Adicione outras colunas do modelo Cargo conforme necessário
                    ];

                    $validator = Validator::make($cargoData, [
                        'cod_cargo' => 'required|string',
                        'nome' => 'required|string',
                        // Valide outros campos aqui
                    ]);

                    if ($validator->fails()) {
                        return Redirect::route('cargos.import')->withErrors($validator);
                    }

                    Cargo::create($cargoData);
                }
            }

            return redirect()->route('cargos.index')->with('success', 'Dados do CSV importados com sucesso.');
        } catch (\Exception $e) {
            return redirect()->route('cargos.import')->with('error', 'Ocorreu um erro durante a importação do CSV. Por favor, verifique o formato do arquivo e tente novamente.');
        }
    }

    public function generateexemplocsv()
    {
        $columns = [
            'cod_cargo',
            'nome',
            // Adicione outras colunas, se necessário
        ];

        $filename = 'cargos.xlsx';

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
        $data = Cargo::all();
        $filename = 'cargos.xlsx';

        (new FastExcel($data))->export($filename);

        $headers = [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        return response()->download($filename, $filename, $headers);
    }

    public function show($id)
    {
        $cargo = Cargo::find($id);

        if (!$cargo) {
            abort(404);
        }

        return view('cargos.show', compact('cargo'));
    }
}
