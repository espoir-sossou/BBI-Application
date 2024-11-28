<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\Panier;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Partager le nombre d'éléments dans le panier avec toutes les vues
        View::composer('*', function ($view) {
            $cartItemCount = Auth::check() ? Panier::where('user_id', Auth::id())->count() : 0;
            $view->with('cartItemCount', $cartItemCount);
        });
    }
}
