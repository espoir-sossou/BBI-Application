<?php

namespace App\Providers;

use App\Models\Favori;
use App\Models\Panier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Partager le nombre d'éléments dans le panier avec toutes les vues
        View::composer('*', function ($view) {
            $cartItemCount = Auth::check() ? Panier::where('user_id', Auth::id())->count() : 0;
            $favorisItemCount = Auth::check() ? Favori::where('user_id', Auth::id())->count() : 0;

            // Passer les données à la vue
            $view->with('cartItemCount', $cartItemCount)
                 ->with('favorisItemCount', $favorisItemCount);
        });
    }
}
