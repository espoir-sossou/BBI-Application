<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;
use App\Models\OffreEnVedette;

class HomeController extends Controller
{// Dans le contrôleur Laravel
    public function homePage(Request $request)
    {
        // Récupérer les informations de l'utilisateur depuis les paramètres de la requête
        $userData = $request->only(['email', 'nom', 'prenom', 'role', 'telephone']);

        // Récupérer les annonces validées
        $annonces = Annonce::where('validee', 1)->get();

        // Récupérer les offres en vedette validées
        $offresEnVedette = OffreEnVedette::where('validee', 1)->get();

        // Vérifier que l'email et d'autres informations essentielles sont présentes
        if (isset($userData['email'])) {
            // Stocker les informations de l'utilisateur dans la session
            session(['user' => $userData]);

            // Afficher la page d'accueil avec les informations de l'utilisateur, les annonces validées et les offres en vedette
            return view('index', [
                'user' => $userData,
                'annonces' => $annonces,
                'offresEnVedette' => $offresEnVedette
            ]);
        }

        // Afficher uniquement les annonces validées et les offres en vedette si aucune information utilisateur n'est fournie
        return view('index', [
            'annonces' => $annonces,
            'offresEnVedette' => $offresEnVedette
        ]);
    }




}
