<?php

namespace App\Http\Controllers\Intranet\Admin;

use App\Http\Controllers\Controller;
use App\Models\Intranet\Admin\IntranetConfig;
use Illuminate\Http\Request;

class IntranetConfigController extends Controller
{
    // Método para exibir as configurações da intranet
    public function getConfig()
    {
        // Verifica se existe uma configuração com ID 1
        $config = IntranetConfig::find(1);

        // Se não existir, cria uma nova com dados padrão
        if (! $config) {
            $defaultData = [
                'titulo' => 'Título Padrão',
                'logo' => 'caminho/para/o/logo.png',
                'cnpj' => '123456789',
                'cep' => '12345-678',
                'endereco' => 'Endereço Padrão',
                'link' => 'http://exemplo.com',
            ];

            $config = IntranetConfig::create($defaultData);
        }

        return view('intranet.admin.config', compact('config'));
    }

    // Método para atualizar as configurações da intranet
    // Método para atualizar as configurações da intranet
    public function updateConfig(Request $request)
    {
        $config = IntranetConfig::findOrFail(1); // Garante que o registro com ID 1 exista

        $config->titulo = $request->input('titulo');
        $config->cnpj = $request->input('cnpj');
        $config->cep = $request->input('cep');
        $config->endereco = $request->input('endereco');
        $config->link = $request->input('link');

        // Verifica se um arquivo de mídia foi enviado
        if ($request->hasFile('logo')) {
            // Remove o arquivo de mídia existente
            $config->clearMediaCollection('logo');

            // Faz o upload do novo arquivo de mídia
            $config->addMediaFromRequest('logo')
                ->toMediaCollection('logo');
        }

        $config->save();

        return redirect()->route('config')->with('success', 'Configurações atualizadas com sucesso!');
    }
}
