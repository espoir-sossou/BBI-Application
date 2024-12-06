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

        // Récupérer les annonces favoris de l'utilisateur connecté
        $userFavorites = $user ? Favori::where('user_id', $user->user_id)->pluck('annonce_id')->toArray() : [];


        // Afficher la page d'accueil avec les données utilisateur et les autres éléments
        return view('index', [
            'user' => $userData,
            'annonces' => $annonces,
            'offresEnVedette' => $offresEnVedette,
            'userFavorites' => $userFavorites, // Assure-toi que cette variable est bien passée à la vue
        ]);
    }
    public function avendrePage(Request $request)
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

        // Récupérer les annonces favoris de l'utilisateur connecté
        $userFavorites = $user ? Favori::where('user_id', $user->user_id)->pluck('annonce_id')->toArray() : [];


        // Afficher la page d'accueil avec les données utilisateur et les autres éléments
        return view('Layout.Frontend.Annonce.avendre-page', [
            'user' => $userData,
            'annonces' => $annonces,
            'offresEnVedette' => $offresEnVedette,
            'userFavorites' => $userFavorites, // Assure-toi que cette variable est bien passée à la vue
        ]);
    }
    public function alouerPage(Request $request)
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

        // Récupérer les annonces favoris de l'utilisateur connecté
        $userFavorites = $user ? Favori::where('user_id', $user->user_id)->pluck('annonce_id')->toArray() : [];

        // Afficher la page d'accueil avec les données utilisateur et les autres éléments
        return view('Layout.Frontend.Annonce.alouer-page', [
            'user' => $userData,
            'annonces' => $annonces,
            'offresEnVedette' => $offresEnVedette,
            'userFavorites' => $userFavorites, // Assure-toi que cette variable est bien passée à la vue
        ]);
    }
    public function appartementPage(Request $request)
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

        // Récupérer les annonces favoris de l'utilisateur connecté
        $userFavorites = $user ? Favori::where('user_id', $user->user_id)->pluck('annonce_id')->toArray() : [];


        // Afficher la page d'accueil avec les données utilisateur et les autres éléments
        return view('Layout.Frontend.Annonce.appartement-page', [
            'user' => $userData,
            'annonces' => $annonces,
            'offresEnVedette' => $offresEnVedette,
            'userFavorites' => $userFavorites, // Assure-toi que cette variable est bien passée à la vue
        ]);
    }
    public function maisonPage(Request $request)
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

        // Récupérer les annonces favoris de l'utilisateur connecté
        $userFavorites = $user ? Favori::where('user_id', $user->user_id)->pluck('annonce_id')->toArray() : [];

        // Afficher la page d'accueil avec les données utilisateur et les autres éléments
        return view('Layout.Frontend.Annonce.maison-page', [
            'user' => $userData,
            'annonces' => $annonces,
            'offresEnVedette' => $offresEnVedette,
            'userFavorites' => $userFavorites, // Assure-toi que cette variable est bien passée à la vue
        ]);
    }
    public function terrainPage(Request $request)
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

        // Récupérer les annonces favoris de l'utilisateur connecté
        $userFavorites = $user ? Favori::where('user_id', $user->user_id)->pluck('annonce_id')->toArray() : [];


        // Afficher la page d'accueil avec les données utilisateur et les autres éléments
        return view('Layout.Frontend.Annonce.terrain-page', [
            'user' => $userData,
            'annonces' => $annonces,
            'offresEnVedette' => $offresEnVedette,
            'userFavorites' => $userFavorites, // Assure-toi que cette variable est bien passée à la vue
        ]);
    }
    public function villaPage(Request $request)
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

        // Récupérer les annonces favoris de l'utilisateur connecté
        $userFavorites = $user ? Favori::where('user_id', $user->user_id)->pluck('annonce_id')->toArray() : [];

        // Afficher la page d'accueil avec les données utilisateur et les autres éléments
        return view('Layout.Frontend.Annonce.villa-page', [
            'user' => $userData,
            'annonces' => $annonces,
            'offresEnVedette' => $offresEnVedette,
            'userFavorites' => $userFavorites, // Assure-toi que cette variable est bien passée à la vue
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

        $user = Auth::user();

        // Récupérer les annonces favoris de l'utilisateur connecté
        $userFavorites = $user ? Favori::where('user_id', $user->user_id)->pluck('annonce_id')->toArray() : [];

        // Afficher la page d'accueil avec ou sans les informations de l'utilisateur
        return view('Layout.Frontend.Annonce.offre', [
            'user' => $userData,
            'annonces' => $annonces,
            'offresEnVedette' => $offresEnVedette,
            'userFavorites' => $userFavorites, // Assure-toi que cette variable est bien passée à la vue

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

    public function getCartItemCount()
    {
        // Vérifiez si l'utilisateur est connecté
        if (!Auth::check()) {
            return 0; // Pas connecté, aucun élément dans le panier
        }

        // Récupérer le nombre d'éléments dans le panier de l'utilisateur
        return Panier::where('user_id', Auth::id())->count();
    }
    public function payer(Request $request, $annonce_id)
    {
        // Vérifie si l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('loginPage')->withErrors(['error' => 'Veuillez vous connecter pour effectuer un paiement.']);
        }

        $user = Auth::user();
        $annonce = Annonce::find($annonce_id);

        // Vérifie si l'annonce existe
        if (!$annonce) {
            return redirect()->route('panier')->withErrors(['error' => 'Annonce non trouvée.']);
        }

        // Vérifie le choix de l'utilisateur
        $paymentOption = $request->input('payment_option');

        if ($paymentOption === 'total') {
            // Logique pour le paiement en totalité
            // Vous pouvez rediriger vers une page de paiement ou traiter directement le paiement ici
            return redirect()->route('paiement.total', ['annonce_id' => $annonce_id]);
        } elseif ($paymentOption === 'installments') {
            // Logique pour le paiement par tranches
            // Vous pouvez définir des informations supplémentaires pour le paiement par tranches
            return redirect()->route('paiement.installments', ['annonce_id' => $annonce_id]);
        }

        return redirect()->route('panier')->withErrors(['error' => 'Option de paiement invalide.']);
    }


    public function ajouterAuxFavoris($annonce_id)
    {
        // Vérifiez si l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('loginPage')->withErrors(['error' => 'Veuillez vous connecter pour gérer vos favoris.']);
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
            // Si l'annonce est déjà dans les favoris, la retirer
            $favori->delete();
            return redirect()->route('favoris')->with('success', 'Annonce retirée de vos favoris.');
        } else {
            // Sinon, l'ajouter aux favoris
            Favori::create([
                'user_id' => $user->user_id,
                'annonce_id' => $annonce_id,
            ]);
            return redirect()->route('favoris')->with('success', 'Annonce ajoutée à vos favoris.');
        }
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
    public function getFavorisCartItemCount()
    {
        // Vérifiez si l'utilisateur est connecté
        if (!Auth::check()) {
            return 0; // Pas connecté, aucun élément dans les favoris
        }

        // Récupérer le nombre d'éléments dans les favoris de l'utilisateur
        return Favori::where('user_id', Auth::id())->count();
    }

    public function showMap()
    {
        // Récupère toutes les annonces validées avec latitude et longitude
        $annonces = Annonce::where('validee', 1)  // Ajout de la condition 'validee = 1'
            ->whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->get();
        return view('map.map-page', compact('annonces'));
    }
    public function showAnnonceCarte($annonce_id)
    {
        // Trouver l'annonce par son ID
        $annonceDetail = Annonce::findOrFail($annonce_id);

        // Retourner la vue avec les informations de l'annonce
        return view('map.show-annonce-carte', compact('annonceDetail'));
    }

















    public function filtrePage()
    {
        return view('Layout.Frontend.Annonce.filtre-page');
    }

    public function recherche(Request $request)
    {
        // Récupérer les critères de recherche
        $query = $request->input('query', []);
        $typeTransaction = $request->input('typeTransaction');
        $montantMin = $request->input('montantMin');
        $montantMax = $request->input('montantMax');

        // Filtrer les annonces
        $annonces = Annonce::query()
            ->when(isset($query['titre']) && !empty($query['titre']), function ($q) use ($query) {
                $q->where('titre', 'like', '%' . $query['titre'] . '%');
            })
            ->when(isset($query['typePropriete']) && !empty($query['typePropriete']), function ($q) use ($query) {
                $q->where('typePropriete', $query['typePropriete']);
            })
            ->when(isset($query['montant']) && !empty($query['montant']), function ($q) use ($query) {
                $q->where('montant', $query['montant']);
            })
            ->when(isset($query['superficie']) && !empty($query['superficie']), function ($q) use ($query) {
                $q->where('superficie', $query['superficie']);
            })
            ->when(isset($query['nbChambres']) && !empty($query['nbChambres']), function ($q) use ($query) {
                $q->where('nbChambres', $query['nbChambres']);
            })
            ->when(isset($query['nbSalleDeDouche']) && !empty($query['nbSalleDeDouche']), function ($q) use ($query) {
                $q->where('nbSalleDeDouche', $query['nbSalleDeDouche']);
            })
            ->when(isset($query['veranda']) && $query['veranda'] == '1', function ($q) {
                $q->where('veranda', true);
            })
            ->when(isset($query['terrasse']) && $query['terrasse'] == '1', function ($q) {
                $q->where('terrasse', true);
            })
            ->when(isset($query['cuisine']) && $query['cuisine'] == '1', function ($q) {
                $q->where('cuisine', true);
            })
            ->when(isset($query['dependance']) && $query['dependance'] == '1', function ($q) {
                $q->where('dependance', true);
            })
            ->when(isset($query['piscine']) && $query['piscine'] == '1', function ($q) {
                $q->where('piscine', true);
            })
            ->when(isset($query['garage']) && $query['garage'] == '1', function ($q) {
                $q->where('garage', true);
            })
            ->when(isset($query['localite']) && !empty($query['localite']), function ($q) use ($query) {
                $q->where('localite', 'like', '%' . $query['localite'] . '%');
            })
            ->when(isset($query['titreFoncier']) && $query['titreFoncier'] == '1', function ($q) {
                $q->where('titreFoncier', true);
            })
            ->when($typeTransaction, function ($q) use ($typeTransaction) {
                $q->where('typeTransaction', $typeTransaction);
            })
            ->when($montantMin, function ($q) use ($montantMin) {
                $q->where('montant', '>=', $montantMin);
            })
            ->when($montantMax, function ($q) use ($montantMax) {
                $q->where('montant', '<=', $montantMax);
            })
            ->get();

        return redirect()->route('annonces.resultats', $request->all());
    }




    public function afficherResultats(Request $request)
    {
        $offresEnVedette = OffreEnVedette::where('validee', 1)->get();

        $user = Auth::user();

        // Récupérer les annonces favoris de l'utilisateur connecté
        $userFavorites = $user ? Favori::where('user_id', $user->user_id)->pluck('annonce_id')->toArray() : [];

        // Récupérer les critères de recherche
        $query = $request->input('query', []);
        $typeTransaction = $request->input('typeTransaction');
        $montantMin = $request->input('montantMin');
        $montantMax = $request->input('montantMax');

        // Filtrer les annonces
        $annonces = Annonce::query()
            ->when(isset($query['titre']) && !empty($query['titre']), function ($q) use ($query) {
                $q->where('titre', 'like', '%' . $query['titre'] . '%');
            })
            ->when(isset($query['typePropriete']) && !empty($query['typePropriete']), function ($q) use ($query) {
                $q->where('typePropriete', $query['typePropriete']);
            })
            ->when(isset($query['montant']) && !empty($query['montant']), function ($q) use ($query) {
                $q->where('montant', $query['montant']);
            })
            ->when(isset($query['superficie']) && !empty($query['superficie']), function ($q) use ($query) {
                $q->where('superficie', $query['superficie']);
            })
            ->when(isset($query['nbChambres']) && !empty($query['nbChambres']), function ($q) use ($query) {
                $q->where('nbChambres', $query['nbChambres']);
            })
            ->when(isset($query['nbSalleDeDouche']) && !empty($query['nbSalleDeDouche']), function ($q) use ($query) {
                $q->where('nbSalleDeDouche', $query['nbSalleDeDouche']);
            })
            ->when(isset($query['veranda']) && $query['veranda'] == '1', function ($q) {
                $q->where('veranda', true);
            })
            ->when(isset($query['terrasse']) && $query['terrasse'] == '1', function ($q) {
                $q->where('terrasse', true);
            })
            ->when(isset($query['cuisine']) && $query['cuisine'] == '1', function ($q) {
                $q->where('cuisine', true);
            })
            ->when(isset($query['dependance']) && $query['dependance'] == '1', function ($q) {
                $q->where('dependance', true);
            })
            ->when(isset($query['piscine']) && $query['piscine'] == '1', function ($q) {
                $q->where('piscine', true);
            })
            ->when(isset($query['garage']) && $query['garage'] == '1', function ($q) {
                $q->where('garage', true);
            })
            ->when(isset($query['localite']) && !empty($query['localite']), function ($q) use ($query) {
                $q->where('localite', 'like', '%' . $query['localite'] . '%');
            })
            ->when(isset($query['titreFoncier']) && $query['titreFoncier'] == '1', function ($q) {
                $q->where('titreFoncier', true);
            })
            ->when($typeTransaction, function ($q) use ($typeTransaction) {
                $q->where('typeTransaction', $typeTransaction);
            })
            ->when($montantMin, function ($q) use ($montantMin) {
                $q->where('montant', '>=', $montantMin);
            })
            ->when($montantMax, function ($q) use ($montantMax) {
                $q->where('montant', '<=', $montantMax);
            })
            ->get();

        return view('Layout.Frontend.Annonce.resultats', compact('annonces', 'offresEnVedette', 'userFavorites'));

    }


    public function aproposPage()
    {
        return view('Layout.Frontend.Home.apropos-page');
    }

    public function servicePage()
    {
        return view('Layout.Frontend.Home.service-page');
    }

    public function contactPage()
    {
        return view('Layout.Frontend.Home.contact-page');
    }


}
