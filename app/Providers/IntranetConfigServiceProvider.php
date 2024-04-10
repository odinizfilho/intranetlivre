<?php

namespace App\Providers;

use App\Models\Intranet\Admin\IntranetConfig;
use Illuminate\Support\ServiceProvider;

class IntranetConfigServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $config = IntranetConfig::find(1);

        // Compartilhar os dados de configuração com todas as views
        view()->share('intranetConfig', $config);

        // Também pode compartilhar os dados com toda a aplicação, tornando-os acessíveis via app('intranetConfig')
        $this->app->instance('intranetConfig', $config);
    }
}
