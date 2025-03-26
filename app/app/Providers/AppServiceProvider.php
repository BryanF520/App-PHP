<?php

namespace App\Providers;

use App\Contracts\AccesoServiceInterface;
use App\Contracts\EmpresaServiceInterface;
use App\Contracts\PersonaServiceInterface;
use App\Contracts\RolServiceInterface;
use App\Contracts\TarjetaServiceInterface;
use App\Contracts\TelefonoServiceInterface;
use App\Contracts\TipodocServiceInterface;
use App\Services\AccesoService;
use App\Services\EmpresaService;
use App\Services\PersonaService;
use App\Services\RolService;
use App\Services\TelefonoService;
use App\Services\TipodocService;
use App\Services\TarjetaService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PersonaServiceInterface::class, PersonaService::class);
        $this->app->bind(AccesoServiceInterface::class, AccesoService::class);
        $this->app->bind(EmpresaServiceInterface::class, EmpresaService::class);
        $this->app->bind(RolServiceInterface::class, RolService::class);
        $this->app->bind(TipodocServiceInterface::class, TipodocService::class);
        $this->app->bind(TelefonoServiceInterface::class, TelefonoService::class);
        $this->app->bind(TarjetaServiceInterface::class, TarjetaService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
