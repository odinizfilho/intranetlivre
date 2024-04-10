<?php

namespace App\Providers;

use App\Models\Intranet\Admin\IntranetConfig;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class IntranetConfigServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Verifica se a tabela 'intranet_configs' existe no banco de dados
        if (DB::getSchemaBuilder()->hasTable('intranet_config')) {
            // Se a tabela existir, recupera os dados de configuração do registro com ID 1
            $config = IntranetConfig::find(1);
        } else {
            // Se a tabela não existir, cria uma instância vazia de IntranetConfig
            $config = new IntranetConfig();
        }

        // Compartilha os dados de configuração com todas as views
        view()->share('intranetConfig', $config);

        // Também compartilha os dados com toda a aplicação, tornando-os acessíveis via app('intranetConfig')
        $this->app->instance('intranetConfig', $config);
    }
}
