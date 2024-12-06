<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    // Dans app/Providers/AppServiceProvider.php
    public function boot()
    {
        // Forcer HTTPS en environnement de production
        if (env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }

        // Partager $agentsUsers avec toutes les vues
        view()->composer('*', function ($view) {
            // Vérifie si l'utilisateur connecté est une AGENCE
            if (session('user_role') === 'AGENCE') {
                $agentsUsers = User::where('role', 'AGENCE')->get(); // Récupère les agents
                $view->with('agentsUsers', $agentsUsers);
            }
        });
    }


}
