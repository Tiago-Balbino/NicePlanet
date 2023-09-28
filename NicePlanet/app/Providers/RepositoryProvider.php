<?php

namespace App\Providers;

use App\Repository\Produtor\IProdutorRepository;
use App\Repository\Produtor\ProdutorRepository;
use App\Repository\Propiedade\IPropiedadeRepository;
use App\Repository\Propiedade\PropiedadeRepository;
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
        $this->app->bind(IPropiedadeRepository::class, PropiedadeRepository::class);
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
