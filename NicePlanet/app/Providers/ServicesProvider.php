<?php

namespace App\Providers;

use App\Services\Auth\AuthService;
use App\Services\Auth\IAuthService;
use App\Services\Produtor\IProdutorService;
use App\Services\Produtor\ProdutorService;
use App\Services\Propriedade\IPropriedadeService;
use App\Services\Propriedade\PropriedadeService;
use Illuminate\Support\ServiceProvider;

class ServicesProvider extends ServiceProvider
{

    // registra os serviços e suas interfaces
    public function register()
    {
        $this->app->bind(IProdutorService::class, ProdutorService::class);
        $this->app->bind(IPropriedadeService::class, PropriedadeService::class);
        $this->app->bind(IAuthService::class, AuthService::class);
    }

    // inicializa os serviços
    public function boot()
    {
        //
    }
}
