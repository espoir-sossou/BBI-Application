<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Favori;
use App\Models\Panier;
use App\Models\Annonce;
use Illuminate\Http\Request;
use App\Models\OffreEnVedette;

class HomeController extends Controller
{// Dans le contrôleur Laravel
    public function homePage(Request $request)
    {
        // Vérifier si l'utilisateur est connecté et si le rôle est 'USER'
        $userId = session('user_id');
        $userRole = session('user_role');

        // Récupérer les informations de l'utilisateur depuis la session
        if ($userId && $userRole && $userRole === 'USER') {
            // L'utilisateur est connecté et son rôle est 'USER'
            $userData = session(['user' => ['user_id' => $userId, 'role' => $userRole]]);
        } else {
            // Sinon, on peut rediriger vers la page de connexion ou afficher sans utilisateur
            $userData = null;
        }

        // Récupérer les annonces validées
        $annonces = Annonce::where('validee', 1)->get();

        // Récupérer les offres en vedette validées
        $offresEnVedette = OffreEnVedette::where('validee', 1)->get();

        // Afficher la page d'accueil avec ou sans les informations de l'utilisateur
        return view('index', [
            'user' => $userData,
            'annonces' => $annonces,
            'offresEnVedette' => $offresEnVedette
        ]);
    }

    public function offre(Request $request)
    {
        // Vérifier si l'utilisateur est connecté et si le rôle est 'USER'
        $userId = session('user_id');
        $userRole = session('user_role');

        // Récupérer les informations de l'utilisateur depuis la session
        if ($userId && $userRole && $userRole === 'USER') {
            // L'utilisateur est connecté et son rôle est 'USER'
            $userData = session(['user' => ['user_id' => $userId, 'role' => $userRole]]);
        } else {
            // Sinon, on peut rediriger vers la page de connexion ou afficher sans utilisateur
            $userData = null;
        }

        // Récupérer les annonces validées
        $annonces = Annonce::where('validee', 1)->get();

        // Récupérer les offres en vedette validées
        $offresEnVedette = OffreEnVedette::where('validee', 1)->get();

        // Afficher la page d'accueil avec ou sans les informations de l'utilisateur
        return view('Layout.Frontend.Annonce.offre', [
            'user' => $userData,
            'annonces' => $annonces,
            'offresEnVedette' => $offresEnVedette
        ]);
    }

    public function showAnnonce($annonce_id)
    {
        $annonceDetail = Annonce::findOrFail($annonce_id); // Trouve l'annonce ou renvoie une erreur 404
        return view('Layout.Frontend.Annonce.annonces-details', compact('annonceDetail'));
    }

    public function ajouterAuPanier($annonce_id)
    {
        // Vérification de l'existence de l'utilisateur connecté dans la session
        $userId = session('user_id');
        $userRole = session('user_role');

        // Si l'utilisateur n'est pas trouvé dans la session, rediriger vers la page de connexion
        if (!$userId || !$userRole) {
            return redirect()->route('loginPage')->withErrors(['error' => 'Veuillez vous connecter pour ajouter une annonce au panier.']);
        }

        // Récupérer l'utilisateur en fonction de l'ID de la session
        $user = User::where('user_id', $userId)->first();

        // Vérification de l'existence de l'annonce
        $annonce = Annonce::find($annonce_id);

        if (!$annonce) {
            return redirect()->back()->withErrors(['error' => 'Annonce non trouvée.']);
        }

        // Vérifier si l'annonce est déjà dans le panier de l'utilisateur
        $panier = Panier::where('user_id', $userId)->where('annonce_id', $annonce_id)->first();

        if ($panier) {
            // Si l'annonce est déjà dans le panier, on ne l'ajoute pas de nouveau
            return redirect()->route('panier')->with('message', 'Cette annonce est déjà dans votre panier.');
        } else {
            // Ajouter l'annonce au panier
            Panier::create([
                'user_id' => $userId,
                'annonce_id' => $annonce_id,
            ]);
        }

        // Rediriger vers la page du panier avec un message de succès
        return redirect()->route('panier')->with('success', 'Annonce ajoutée au panier.');
    }
    public function afficherPanier()
    {
        // Vérification de l'existence de l'utilisateur connecté dans la session
        $userId = session('user_id');
        $userRole = session('user_role');

        // Si l'utilisateur n'est pas trouvé dans la session, rediriger vers la page de connexion
        if (!$userId || !$userRole) {
            return redirect()->route('loginPage')->withErrors(['error' => 'Veuillez vous connecter pour voir votre panier.']);
        }

        // Récupérer l'utilisateur en fonction de l'ID de la session
        $user = User::where('user_id', $userId)->first();

        // Si l'utilisateur n'existe pas, rediriger vers la page de connexion
        if (!$user) {
            return redirect()->route('loginPage')->withErrors(['error' => 'Utilisateur non trouvé.']);
        }

        // Récupérer toutes les annonces dans le panier de l'utilisateur connecté
        $panierItems = Panier::where('user_id', $userId)->get();

        // Vérifier si le panier est vide
        if ($panierItems->isEmpty()) {
            return view('Layout.Frontend.Annonce.panier', ['annonces' => [], 'message' => 'Votre panier est vide.']);
        }

        // Extraire les annonces associées aux éléments du panier
        $annonces = $panierItems->map(function ($item) {
            return $item->annonce; // Relation avec le modèle Annonce
        });

        // Retourner la vue avec les annonces dans le panier
        return view('Layout.Frontend.Annonce.panier', ['annonces' => $annonces]);
    }
    // Méthode pour supprimer une annonce du panier
    public function supprimerDuPanier($annonce_id)
    {
        // Vérification de l'existence de l'utilisateur connecté dans la session
        $userId = session('user_id');
        $userRole = session('user_role');

        // Si l'utilisateur n'est pas trouvé dans la session, rediriger vers la page de connexion
        if (!$userId || !$userRole) {
            return redirect()->route('loginPage')->withErrors(['error' => 'Veuillez vous connecter pour gérer votre panier.']);
        }

        // Supprimer l'annonce du panier
        Panier::where('user_id', $userId)->where('annonce_id', $annonce_id)->delete();

        // Rediriger vers la page du panier avec un message de succès
        return redirect()->route('panier')->with('success', 'Annonce supprimée du panier.');
    }

    public function ajouterAuxFavoris($annonce_id)
    {
        $userId = session('user_id');
        $userRole = session('user_role');

        if (!$userId || !$userRole) {
            return redirect()->route('loginPage')->withErrors(['error' => 'Veuillez vous connecter pour ajouter une annonce à vos favoris.']);
        }

        $annonce = Annonce::find($annonce_id);

        if (!$annonce) {
            return redirect()->back()->withErrors(['error' => 'Annonce non trouvée.']);
        }

        $favori = Favori::where('user_id', $userId)->where('annonce_id', $annonce_id)->first();

        if ($favori) {
            return redirect()->route('favoris')->with('message', 'Cette annonce est déjà dans vos favoris.');
        } else {
            Favori::create([
                'user_id' => $userId,
                'annonce_id' => $annonce_id,
            ]);
        }

        return redirect()->route('favoris')->with('success', 'Annonce ajoutée à vos favoris.');
    }
    public function afficherFavoris()
    {
        $userId = session('user_id');
        $userRole = session('user_role');

        if (!$userId || !$userRole) {
            return redirect()->route('loginPage')->withErrors(['error' => 'Veuillez vous connecter pour voir vos favoris.']);
        }

        $favorisItems = Favori::where('user_id', $userId)->get();

        if ($favorisItems->isEmpty()) {
            return view('favoris', ['annonces' => [], 'message' => 'Vous n\'avez pas encore ajouté de favoris.']);
        }

        $annonces = $favorisItems->map(function ($item) {
            return $item->annonce;
        });

        return view('Layout.Frontend.Annonce.favoris', ['annonces' => $annonces]);
    }
    public function supprimerDesFavoris($annonce_id)
    {
        $userId = session('user_id');

        $favori = Favori::where('user_id', $userId)->where('annonce_id', $annonce_id)->first();

        if (!$favori) {
            return redirect()->route('favoris')->withErrors(['error' => 'Favori non trouvé.']);
        }

        $favori->delete();

        return redirect()->route('favoris')->with('success', 'Annonce supprimée des favoris.');
    }


}
