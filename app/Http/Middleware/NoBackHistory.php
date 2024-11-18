<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class NoBackHistory
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Désactive la mise en cache du navigateur pour les routes protégées
        $response->headers->set('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', 'Sat, 01 Jan 1990 00:00:00 GMT');

        // Si l'utilisateur est connecté et essaie d'accéder à la page de connexion
        if (Auth::check() && $request->is('login-page', 'signup-page')) {
            return redirect()->route('user.dashboard'); // ou rediriger vers un tableau de bord spécifique
        }

        // Si l'utilisateur est déconnecté et essaie d'aller sur une page après déconnexion (ex : dashboard)
        if (Auth::guest() && $request->is('user.dashboard')) {
            return redirect()->route('loginPage');
        }

        return $response;
    }
}


