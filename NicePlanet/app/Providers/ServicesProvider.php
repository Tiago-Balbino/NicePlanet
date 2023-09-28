<?php

namespace App\Providers;

use App\Services\Produtor\IProdutorService;
use App\Services\Produtor\ProdutorService;
use App\Services\Propiedade\IPropiedadeService;
use App\Services\Propiedade\PropiedadeService;
use Illuminate\Support\ServiceProvider;

class ServicesProvider extends ServiceProvider
{

    // registra os serviços e suas interfaces
    public function register()
    {
        $this->app->bind(IProdutorService::class, ProdutorService::class);
        $this->app->bind(IPropiedadeService::class, PropiedadeService::class);
    }

    // inicializa os serviços
    public function boot()
    {
        //
    }
}
