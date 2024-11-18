<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthenticateJWT
{
    public function handle($request, Closure $next)
    {
        try {
            // Vérifie si l'utilisateur est authentifié avec JWT
            JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            return response()->json(['error' => 'Non authentifié'], 401);
        }

        return $next($request);
    }
}
