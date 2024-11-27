<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Favori;
use App\Models\Panier;
use App\Models\Annonce;
use Illuminate\Http\Request;
use App\Models\OffreEnVedette;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{// Dans le contrôleur Laravel
    public function homePage(Request $request)
    {
        // Récupérer l'utilisateur connecté (s'il y en a un)
        $user = Auth::user();

        // Préparer les données utilisateur si connecté
        $userData = $user ? [
            'user_id' => $user->id,
            'role' => $user->role,
            'nom' => $user->nom,
            'prenom' => $user->prenom,
        ] : null;

        // Récupérer les annonces validées
        $annonces = Annonce::where('validee', 1)->get();

        // Récupérer les offres en vedette validées
        $offresEnVedette = OffreEnVedette::where('validee', 1)->get();

        // Afficher la page d'accueil avec les données utilisateur et les autres éléments
        return view('index', [
            'user' => $userData,
            'annonces' => $annonces,
            'offresEnVedette' => $offresEnVedette,
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
        // Vérifiez si l'utilisateur est connecté via Google
        if (!Auth::check()) {
            return redirect()->route('loginPage')->withErrors(['error' => 'Veuillez vous connecter avec Google pour ajouter une annonce au panier.']);
        }

        // Récupérez l'utilisateur authentifié
        $user = Auth::user();

        // Vérifiez si l'utilisateur est valide
        if (!$user) {
            return redirect()->route('loginPage')->withErrors(['error' => 'Utilisateur non trouvé.']);
        }

        // Vérifiez si l'annonce existe
        $annonce = Annonce::find($annonce_id);
        if (!$annonce) {
            return redirect()->back()->withErrors(['error' => 'Annonce non trouvée.']);
        }

        // Vérifiez si l'annonce est déjà dans le panier
        $panier = Panier::where('user_id', $user->user_id)->where('annonce_id', $annonce_id)->first();
        if ($panier) {
            return redirect()->route('panier')->with('message', 'Cette annonce est déjà dans votre panier.');
        }

        // Ajoutez l'annonce au panier
        Panier::create([
            'user_id' => $user->user_id,
            'annonce_id' => $annonce_id,
        ]);

        return redirect()->route('panier')->with('success', 'Annonce ajoutée au panier.');
    }


    public function afficherPanier()
    {
        // Vérifiez si l'utilisateur est connecté via Google
        if (!Auth::check()) {
            return redirect()->route('loginPage')->withErrors(['error' => 'Veuillez vous connecter pour accéder à votre panier.']);
        }

        // Récupérez l'utilisateur authentifié
        $user = Auth::user();

        // Vérifiez si l'utilisateur est valide
        if (!$user) {
            return redirect()->route('loginPage')->withErrors(['error' => 'Utilisateur non trouvé.']);
        }

        // Récupérez les annonces dans le panier pour cet utilisateur
        $panierItems = Panier::where('user_id', $user->user_id)->get();

        // Si le panier est vide
        if ($panierItems->isEmpty()) {
            return view('Layout.Frontend.Annonce.panier', [
                'annonces' => [],
                'message' => 'Votre panier est vide.',
            ]);
        }

        // Récupérer les annonces associées aux éléments du panier
        $annonces = $panierItems->map(function ($item) {
            return $item->annonce; // Supposant une relation entre Panier et Annonce
        });

        // Retourner la vue avec les annonces dans le panier
        return view('Layout.Frontend.Annonce.panier', [
            'annonces' => $annonces,
            'message' => null,
        ]);
    }


    // Méthode pour supprimer une annonce du panier
    public function supprimerDuPanier($annonce_id)
    {
        // Vérifiez si l'utilisateur est connecté via Google
        if (!Auth::check()) {
            return redirect()->route('loginPage')->withErrors(['error' => 'Veuillez vous connecter pour gérer votre panier.']);
        }

        // Récupérez l'utilisateur authentifié
        $user = Auth::user();

        // Vérifiez si l'utilisateur est valide
        if (!$user) {
            return redirect()->route('loginPage')->withErrors(['error' => 'Utilisateur non trouvé.']);
        }

        // Vérifiez si l'annonce existe dans le panier de l'utilisateur
        $panierItem = Panier::where('user_id', $user->user_id)->where('annonce_id', $annonce_id)->first();

        if (!$panierItem) {
            return redirect()->route('panier')->withErrors(['error' => 'L\'annonce n\'est pas présente dans votre panier.']);
        }

        // Supprimer l'annonce du panier
        $panierItem->delete();

        // Rediriger vers la page du panier avec un message de succès
        return redirect()->route('panier')->with('success', 'Annonce supprimée du panier.');
    }


    public function ajouterAuxFavoris($annonce_id)
    {
        // Vérifiez si l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('loginPage')->withErrors(['error' => 'Veuillez vous connecter pour ajouter une annonce à vos favoris.']);
        }

        // Récupérez l'utilisateur authentifié
        $user = Auth::user();

        // Vérifiez si l'annonce existe
        $annonce = Annonce::find($annonce_id);
        if (!$annonce) {
            return redirect()->back()->withErrors(['error' => 'Annonce non trouvée.']);
        }

        // Vérifiez si l'annonce est déjà dans les favoris
        $favori = Favori::where('user_id', $user->user_id)->where('annonce_id', $annonce_id)->first();
        if ($favori) {
            return redirect()->route('favoris')->with('message', 'Cette annonce est déjà dans vos favoris.');
        }

        // Ajouter l'annonce aux favoris
        Favori::create([
            'user_id' => $user->user_id,
            'annonce_id' => $annonce_id,
        ]);

        return redirect()->route('favoris')->with('success', 'Annonce ajoutée à vos favoris.');
    }
    public function afficherFavoris()
    {
        // Vérifiez si l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('loginPage')->withErrors(['error' => 'Veuillez vous connecter pour voir vos favoris.']);
        }

        // Récupérez l'utilisateur authentifié
        $user = Auth::user();

        // Récupérez les favoris de l'utilisateur
        $favorisItems = Favori::where('user_id', $user->user_id)->get();

        if ($favorisItems->isEmpty()) {
            return view('Layout.Frontend.Annonce.favoris', ['annonces' => [], 'message' => 'Vous n\'avez pas encore ajouté de favoris.']);
        }

        // Récupérer les annonces associées aux éléments des favoris
        $annonces = $favorisItems->map(function ($item) {
            return $item->annonce;
        });

        return view('Layout.Frontend.Annonce.favoris', ['annonces' => $annonces]);
    }
    public function supprimerDesFavoris($annonce_id)
    {
        // Vérifiez si l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('loginPage')->withErrors(['error' => 'Veuillez vous connecter pour gérer vos favoris.']);
        }

        // Récupérez l'utilisateur authentifié
        $user = Auth::user();

        // Vérifiez si l'annonce existe dans les favoris de l'utilisateur
        $favori = Favori::where('user_id', $user->user_id)->where('annonce_id', $annonce_id)->first();

        if (!$favori) {
            return redirect()->route('favoris')->withErrors(['error' => 'Favori non trouvé.']);
        }

        // Supprimer l'annonce des favoris
        $favori->delete();

        return redirect()->route('favoris')->with('success', 'Annonce supprimée des favoris.');
    }



}
