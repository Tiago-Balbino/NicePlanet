<?php

namespace App\Providers;

use App\Repository\Auth\AuthRepository;
use App\Repository\Auth\IAuthRepository;
use App\Repository\Produtor\IProdutorRepository;
use App\Repository\Produtor\ProdutorRepository;
use App\Repository\Propriedade\IPropriedadeRepository;
use App\Repository\Propriedade\PropriedadeRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IProdutorRepository::class, ProdutorRepository::class);
        $this->app->bind(IPropriedadeRepository::class, PropriedadeRepository::class);
        $this->app->bind(IAuthRepository::class, AuthRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
