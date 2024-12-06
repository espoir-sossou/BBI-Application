<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class GoogleController extends Controller
{
      // Redirige l'utilisateur vers Google pour l'authentification
      public function redirectToGoogle()
      {
          return Socialite::driver('google')->redirect();
      }
      public function handleGoogleCallback()
      {
          try {
              // Récupérer les informations de l'utilisateur via Google
              $googleUser = Socialite::driver('google')->user();

              // Vérifier si l'utilisateur existe déjà dans la base de données
              $user = User::where('email', $googleUser->getEmail())->first();

              if (!$user) {
                  // Si l'utilisateur n'existe pas, créer un compte avec des valeurs par défaut
                  $user = User::create([
                      'name' => $googleUser->getName(), // Nom complet
                      'email' => $googleUser->getEmail(),
                      'password' => bcrypt('default_password'), // Mot de passe par défaut
                      'role' => 'USER', // Rôle par défaut
                      'status' => 'active', // Statut actif par défaut
                  ]);
              }

              // Authentifier et connecter l'utilisateur
              Auth::login($user);

              // Préparer les données utilisateur à passer en paramètre
              $userData = [
                  'user_id' => $user->id,
                  'nom' => $user->nom,
                  'email' => $user->email,
                  'role' => $user->role,
              ];

              // Rediriger vers la page d'accueil avec les informations utilisateur
              return redirect()->route('homePage', $userData);
          } catch (\Exception $e) {
              // En cas d'erreur, rediriger vers la page de connexion avec un message
              return redirect()->route('loginPage')->with('error', 'Erreur lors de l\'authentification Google : ' . $e->getMessage());
          }
      }
      public function handleGoogleLocalCallback()
      {
          try {
              // Récupérer les informations de l'utilisateur via Google
              $googleUser = Socialite::driver('google')->user();

              // Vérifier si l'utilisateur existe déjà dans la base de données
              $user = User::where('email', $googleUser->getEmail())->first();

              if (!$user) {
                  // Si l'utilisateur n'existe pas, créer un compte avec des valeurs par défaut
                  $user = User::create([
                      'name' => $googleUser->getName(), // Nom complet
                      'email' => $googleUser->getEmail(),
                      'password' => bcrypt('default_password'), // Mot de passe par défaut
                      'role' => 'USER', // Rôle par défaut
                      'status' => 'active', // Statut actif par défaut
                  ]);
              }

              // Authentifier et connecter l'utilisateur
              Auth::login($user);

              // Préparer les données utilisateur à passer en paramètre
              $userData = [
                  'user_id' => $user->user_id,
                  'nom' => $user->name,
                  'email' => $user->email,
                  'role' => $user->role,
              ];

              // Rediriger vers la page d'accueil avec les informations utilisateur
              return redirect()->route('homePage', $userData);
          } catch (\Exception $e) {
              // En cas d'erreur, rediriger vers la page de connexion avec un message
              return redirect()->route('loginPage')->with('error', 'Erreur lors de l\'authentification Google : ' . $e->getMessage());
          }
      }


}
