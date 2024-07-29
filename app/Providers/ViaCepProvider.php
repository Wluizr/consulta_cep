<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Service\ViaCepService;

class ViaCepProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Achei melhor criar um provider, para que se num futuro quiser trocar não precisaria alterar a regra de consultas.
        $this->app->singleton(ViaCepService::class, function ($app) {
            return new ViaCepService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
