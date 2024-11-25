<?php

namespace App\Http\Controllers;

use Log;
use App\Models\User;
use App\Models\Annonce;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\OffreEnVedette;
use App\Mail\NewAnnonceCreatedMail;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Mail\NewOffreEnVedetteCreatedMail;


class AgenceController extends Controller
{
    public function agenceDashboard()
    {
        return view('Layout.Backend.Agence_dashboard.index');
    }

    public function annonce()
    {
        return view('Layout.Backend.Agence_dashboard.annonce');
    }
    public function annonceAddPage()
    {
        return view('Layout.Backend.Agence_dashboard.annonce-add-page');
    }
    public function annonceCreate(Request $request)
    {
        // Vérification de l'existence de l'utilisateur connecté dans la session
        $userId = session('user_id');
        $userRole = session('user_role');

        // Si l'utilisateur n'est pas trouvé dans la session, rediriger vers la page de connexion
        if (!$userId || !$userRole) {
            return redirect()->route('loginPage')->withErrors(['error' => 'Veuillez vous connecter pour créer une annonce.']);
        }

        // Récupérer l'utilisateur en fonction de l'ID de la session
        $user = User::where('user_id', $userId)->first();

        // Vérifier si l'utilisateur existe et est autorisé à créer une annonce
        if (!$user || $user->role !== 'AGENCE') {
            return redirect()->back()->withErrors(['error' => 'Vous n\'êtes pas autorisé à créer une annonce.']);
        }

        // Validation des données de l'annonce
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'montant' => 'required|numeric|min:0',
            'typePropriete' => 'required|string|max:255',
            'superficie' => 'nullable|numeric|min:0',
            'nbChambres' => 'nullable|integer|min:0',
            'nbSalleDeDouche' => 'nullable|integer|min:0',
            'veranda' => 'nullable|integer|min:0',
            'terrasse' => 'nullable|integer|min:0',
            'cuisine' => 'nullable|integer|min:0',
            'dependance' => 'nullable|integer|min:0',
            'piscine' => 'nullable|integer|min:0',
            'garage' => 'nullable|integer|min:0',
            'titreFoncier' => 'nullable|integer|min:0',
            'localite' => 'required|string|max:255',
            'localisation' => 'nullable|string|max:255',
            'details' => 'nullable|string',
            'typeTransaction' => 'required|string',
            'visite360' => 'nullable|string|max:255',
            'video' => 'nullable|string|max:255',
            'image' => 'required|file|mimes:jpeg,png,gif|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('', 'annonces');
            $validatedData['image'] = $imagePath;
        }


        // Définit les valeurs par défaut pour les cases à cocher si elles ne sont pas cochées
        $validatedData['veranda'] = $validatedData['veranda'] ?? 0;
        $validatedData['terrasse'] = $validatedData['terrasse'] ?? 0;
        $validatedData['cuisine'] = $validatedData['cuisine'] ?? 0;
        $validatedData['dependance'] = $validatedData['dependance'] ?? 0;
        $validatedData['piscine'] = $validatedData['piscine'] ?? 0;
        $validatedData['garage'] = $validatedData['garage'] ?? 0;
        $validatedData['titreFoncier'] = $validatedData['titreFoncier'] ?? 0;

        // Trouver l'admin dont le rôle est 'ADMIN' dans la table users
        $admin = User::where('role', 'ADMIN')->first();

        // Vérifier s'il existe un admin dans la base de données
        if (!$admin) {
            return redirect()->back()->withErrors(['error' => 'Aucun administrateur trouvé.']);
        }

        // Enregistrer la date de création
        $validatedData['dateCreation'] = now();

        // Création de l'annonce avec les données validées
        $annonce = new Annonce();
        $annonce->titre = $validatedData['titre'];
        $annonce->description = $validatedData['description'] ?? null;
        $annonce->montant = $validatedData['montant'];
        $annonce->typePropriete = $validatedData['typePropriete'];
        $annonce->superficie = $validatedData['superficie'] ?? null;
        $annonce->nbChambres = $validatedData['nbChambres'] ?? null;
        $annonce->nbSalleDeDouche = $validatedData['nbSalleDeDouche'] ?? null;
        $annonce->veranda = $validatedData['veranda'];
        $annonce->terrasse = $validatedData['terrasse'];
        $annonce->cuisine = $validatedData['cuisine'];
        $annonce->dependance = $validatedData['dependance'];
        $annonce->piscine = $validatedData['piscine'];
        $annonce->garage = $validatedData['garage'];
        $annonce->titreFoncier = $validatedData['titreFoncier'];
        $annonce->localite = $validatedData['localite'];
        $annonce->localisation = $validatedData['localisation'] ?? null;
        $annonce->details = $validatedData['details'] ?? null;
        $annonce->typeTransaction = $validatedData['typeTransaction'];
        $annonce->visite360 = $validatedData['visite360'] ?? null;
        $annonce->video = $validatedData['video'] ?? null;
        $annonce->image = $validatedData['image'];
        $annonce->dateCreation = $validatedData['dateCreation'];
        $annonce->validee = false; // Par défaut, l'annonce n'est pas validée
        $annonce->user_id = $user->user_id; // Associer l'annonce à l'utilisateur connecté
        $annonce->admin_id = $admin->user_id; // Associer l'ID de l'admin trouvé
        // Enregistrement de l'annonce
        $annonce->save();

        // Envoi de la notification push
        Notification::create([
            'user_id' => $admin->user_id, // Vous pouvez envoyer la notification à l'admin ou à d'autres utilisateurs
            'message' => 'Une nouvelle annonce a été créée : ' . $annonce->titre,
            'is_read' => false,
            'type' => 'push', // Type de notification (push dans ce cas)
        ]);

        // Envoi de l'email à l'admin
        Mail::to($admin->email)->send(new NewAnnonceCreatedMail($annonce)); // Assurez-vous de créer une classe de mail pour l'admin

        // Redirection avec un message de succès
        return redirect()->route('annonce.liste')->with('success', 'Annonce créée avec succès !');
    }
    public function annonceListe()
    {
        // Récupérer les informations de l'utilisateur connecté
        $userId = session('user_id');
        $userRole = session('user_role');

        // Vérifier si l'utilisateur est connecté
        if (!$userId || !$userRole) {
            return redirect()->route('loginPage')->withErrors(['error' => 'Veuillez vous connecter pour accéder à cette page.']);
        }

        // Filtrer les annonces en fonction du rôle
        $annonces = match ($userRole) {
            'ADMIN' => Annonce::all(), // Un admin peut voir toutes les annonces
            'AGENCE' => Annonce::where('user_id', $userId)->get(), // Une agence voit ses propres annonces
            'VENDEUR' => Annonce::where('user_id', $userId)->get(), // Un vendeur voit ses propres annonces
            default => [],
        };

       // Déterminer s'il y a des annonces pour ce rôle
    $hasAnnonces = !$annonces->isEmpty();

        // Retourner la vue avec les annonces filtrées
        return view('Layout.Backend.Agence_dashboard.annonce-liste', compact('annonces', 'hasAnnonces', 'userRole'));
        }
        public function destroyAnnonce($id)
    {
        // Trouver l'annonce par son ID
        $annonce = Annonce::findOrFail($id);

        // Supprimer l'annonce
        $annonce->delete();

        // Rediriger avec un message de succès
        return redirect()->route('annonce.liste')->with('success', 'Annonce supprimée avec succès.');
    }
    public function annonceEditPage($annonce_id)
    {
        // Récupérer l'annonce par son ID
        $annonce = Annonce::findOrFail($annonce_id);

        // Retourner la vue d'édition avec les données de l'annonce
        return view('Layout.Backend.Agence_dashboard.annonce-edit-page', compact('annonce'));
    }
    public function annonceUpdate(Request $request, $annonce_id)
    {
        // Vérification de l'existence de l'utilisateur connecté
        $userId = session('user_id');
        $userRole = session('user_role');

        // Si l'utilisateur n'est pas trouvé dans la session, rediriger vers la page de connexion
        if (!$userId || !$userRole) {
            return redirect()->route('loginPage')->withErrors(['error' => 'Veuillez vous connecter pour mettre à jour l\'annonce.']);
        }

        // Vérifier si l'utilisateur est autorisé à modifier cette annonce
        $user = User::where('user_id', $userId)->first();
        if (!$user || $user->role !== 'AGENCE') {
            return redirect()->back()->withErrors(['error' => 'Vous n\'êtes pas autorisé à modifier cette annonce.']);
        }

        // Récupérer l'annonce par son ID
        $annonce = Annonce::findOrFail($annonce_id);

        // Validation des données du formulaire
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'montant' => 'required|numeric|min:0',
            'typePropriete' => 'required|string|max:255',
            'superficie' => 'nullable|numeric|min:0',
            'nbChambres' => 'nullable|integer|min:0',
            'nbSalleDeDouche' => 'nullable|integer|min:0',
            'veranda' => 'nullable|integer|min:0',
            'terrasse' => 'nullable|integer|min:0',
            'cuisine' => 'nullable|integer|min:0',
            'dependance' => 'nullable|integer|min:0',
            'piscine' => 'nullable|integer|min:0',
            'garage' => 'nullable|integer|min:0',
            'titreFoncier' => 'nullable|integer|min:0',
            'localite' => 'required|string|max:255',
            'localisation' => 'nullable|string|max:255',
            'details' => 'nullable|string',
            'typeTransaction' => 'required|string',
            'visite360' => 'nullable|string|max:255',
            'video' => 'nullable|string|max:255',
            'image' => 'required|file|mimes:jpeg,png,gif|max:2048',
        ]);

        // Si une nouvelle image est envoyée, enregistrer l'image
        if ($request->hasFile('image')) {
            // Utilisation du disque personnalisé 'annonces' pour stocker l'image
            $imagePath = $request->file('image')->store('images', 'annonces');
            $validatedData['image'] = $imagePath;
        }

        // Mise à jour de l'annonce avec les nouvelles données validées
        $annonce->update($validatedData);

        // Envoi de la notification push
        Notification::create([
            'user_id' => $user->user_id,
            'message' => 'L\'annonce "' . $annonce->titre . '" a été mise à jour.',
            'is_read' => false,
            'type' => 'push',
        ]);
        // Redirection avec un message de succès
        return redirect()->route('annonce.liste')->with('success', 'Annonce mise à jour avec succès !');
    }



    public function offreEnVedetteAddPage()
    {
        return view('Layout.Backend.Agence_dashboard.Offre_en_vedette.annonce-add-page');
    }
    public function offreEnVedetteCreate(Request $request)
    {
        // Vérification de l'existence de l'utilisateur connecté dans la session
        $userId = session('user_id');
        $userRole = session('user_role');

        // Si l'utilisateur n'est pas trouvé dans la session, rediriger vers la page de connexion
        if (!$userId || !$userRole) {
            return redirect()->route('loginPage')->withErrors(['error' => 'Veuillez vous connecter pour créer une annonce.']);
        }

        // Récupérer l'utilisateur en fonction de l'ID de la session
        $user = User::where('user_id', $userId)->first();

        // Vérifier si l'utilisateur existe et est autorisé à créer une annonce
        if (!$user || $user->role !== 'AGENCE') {
            return redirect()->back()->withErrors(['error' => 'Vous n\'êtes pas autorisé à créer une annonce.']);
        }

        // Validation des données de l'annonce
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'montant' => 'required|numeric|min:0',
            'typePropriete' => 'required|string|max:255',
            'superficie' => 'nullable|numeric|min:0',
            'nbChambres' => 'nullable|integer|min:0',
            'nbSalleDeDouche' => 'nullable|integer|min:0',
            'veranda' => 'nullable|integer|min:0',
            'terrasse' => 'nullable|integer|min:0',
            'cuisine' => 'nullable|integer|min:0',
            'dependance' => 'nullable|integer|min:0',
            'piscine' => 'nullable|integer|min:0',
            'garage' => 'nullable|integer|min:0',
            'titreFoncier' => 'nullable|integer|min:0',
            'localite' => 'required|string|max:255',
            'localisation' => 'nullable|string|max:255',
            'details' => 'nullable|string',
            'typeTransaction' => 'required|string',
            'visite360' => 'nullable|string|max:255',
            'video' => 'nullable|string|max:255',
            'image' => 'required|file|mimes:jpeg,png,gif|max:2048',
        ]);


        // Enregistrer l'image si elle est présente
        if ($request->hasFile('image')) {
            // Utilisation du disque personnalisé 'annonces' pour stocker l'image
            $imagePath = $request->file('image')->store('images', 'annonces');
            $validatedData['image'] = $imagePath; // Stocker le chemin de l'image
        }

        // Définit les valeurs par défaut pour les cases à cocher si elles ne sont pas cochées
        $validatedData['veranda'] = $validatedData['veranda'] ?? 0;
        $validatedData['terrasse'] = $validatedData['terrasse'] ?? 0;
        $validatedData['cuisine'] = $validatedData['cuisine'] ?? 0;
        $validatedData['dependance'] = $validatedData['dependance'] ?? 0;
        $validatedData['piscine'] = $validatedData['piscine'] ?? 0;
        $validatedData['garage'] = $validatedData['garage'] ?? 0;
        $validatedData['titreFoncier'] = $validatedData['titreFoncier'] ?? 0;

        // Trouver l'admin dont le rôle est 'ADMIN' dans la table users
        $admin = User::where('role', 'ADMIN')->first();

        // Vérifier s'il existe un admin dans la base de données
        if (!$admin) {
            return redirect()->back()->withErrors(['error' => 'Aucun administrateur trouvé.']);
        }

        // Enregistrer la date de création
        $validatedData['dateCreation'] = now();

        // Création de l'annonce avec les données validées
        $OffreEnVedette = new OffreEnVedette();
        $OffreEnVedette->titre = $validatedData['titre'];
        $OffreEnVedette->description = $validatedData['description'] ?? null;
        $OffreEnVedette->montant = $validatedData['montant'];
        $OffreEnVedette->typePropriete = $validatedData['typePropriete'];
        $OffreEnVedette->superficie = $validatedData['superficie'] ?? null;
        $OffreEnVedette->nbChambres = $validatedData['nbChambres'] ?? null;
        $OffreEnVedette->nbSalleDeDouche = $validatedData['nbSalleDeDouche'] ?? null;
        $OffreEnVedette->veranda = $validatedData['veranda'];
        $OffreEnVedette->terrasse = $validatedData['terrasse'];
        $OffreEnVedette->cuisine = $validatedData['cuisine'];
        $OffreEnVedette->dependance = $validatedData['dependance'];
        $OffreEnVedette->piscine = $validatedData['piscine'];
        $OffreEnVedette->garage = $validatedData['garage'];
        $OffreEnVedette->titreFoncier = $validatedData['titreFoncier'];
        $OffreEnVedette->localite = $validatedData['localite'];
        $OffreEnVedette->localisation = $validatedData['localisation'] ?? null;
        $OffreEnVedette->details = $validatedData['details'] ?? null;
        $OffreEnVedette->typeTransaction = $validatedData['typeTransaction'];
        $OffreEnVedette->visite360 = $validatedData['visite360'] ?? null;
        $OffreEnVedette->video = $validatedData['video'] ?? null;
        $OffreEnVedette->image = $validatedData['image'];
        $OffreEnVedette->dateCreation = $validatedData['dateCreation'];
        $OffreEnVedette->validee = false; // Par défaut, l'OffreEnVedette n'est pas validée
        $OffreEnVedette->user_id = $user->user_id; // Associer l'OffreEnVedette à l'utilisateur connecté
        $OffreEnVedette->admin_id = $admin->user_id; // Associer l'ID de l'admin trouvé
        // Enregistrement de l'OffreEnVedette
        $OffreEnVedette->save();
        // Envoi de la notification push
        Notification::create([
            'user_id' => $admin->user_id, // Vous pouvez envoyer la notification à l'admin ou à d'autres utilisateurs
            'message' => 'Une nouvelle annonce a été créée : ' . $OffreEnVedette->titre,
            'is_read' => false,
            'type' => 'push', // Type de notification (push dans ce cas)
        ]);

        // Envoi de l'email à l'admin
        Mail::to($admin->email)->send(new NewOffreEnVedetteCreatedMail($OffreEnVedette)); // Assurez-vous de créer une classe de mail pour l'admin

        // Redirection avec un message de succès
        return redirect()->route('offreEnVedette.liste')->with('success', 'Annonce créée avec succès !');
    }
    public function offreEnVedetteListe()
{
    // Récupérer les informations de l'utilisateur connecté
    $userId = session('user_id');
    $userRole = session('user_role');

    // Vérifier si l'utilisateur est connecté
    if (!$userId || !$userRole) {
        return redirect()->route('loginPage')->withErrors(['error' => 'Veuillez vous connecter pour accéder à cette page.']);
    }

    // Filtrer les offres en fonction du rôle
    $offresEnVedette = match ($userRole) {
        'ADMIN' => OffreEnVedette::all(), // Un admin peut voir toutes les offres
        'AGENCE', 'VENDEUR' => OffreEnVedette::where('user_id', $userId)->get(), // Une agence/vendeur voit ses propres offres
        default => [],
    };

    // Vérifier si des offres existent pour ce rôle
    $hasOffres = !$offresEnVedette->isEmpty();

    // Retourner la vue avec les données filtrées
    return view('Layout.Backend.Agence_dashboard.Offre_en_vedette.annonce-liste', compact('offresEnVedette', 'hasOffres', 'userRole'));
}

    public function offreEnVedetteditPage($annonce_id)
    {
        // Récupérer l'annonce par son ID
        $OffreEnVedette = OffreEnVedette::findOrFail($annonce_id);

        // Retourner la vue d'édition avec les données de l'annonce
        return view('Layout.Backend.Agence_dashboard.Offre_en_vedette.annonce-edit-page', compact('OffreEnVedette'));
    }
    public function offreEnVedetteUpdate(Request $request, $annonce_id)
    {
        // Vérification de l'existence de l'utilisateur connecté
        $userId = session('user_id');
        $userRole = session('user_role');

        // Si l'utilisateur n'est pas trouvé dans la session, rediriger vers la page de connexion
        if (!$userId || !$userRole) {
            return redirect()->route('loginPage')->withErrors(['error' => 'Veuillez vous connecter pour mettre à jour l\'annonce.']);
        }

        // Vérifier si l'utilisateur est autorisé à modifier cette annonce
        $user = User::where('user_id', $userId)->first();
        if (!$user || $user->role !== 'AGENCE') {
            return redirect()->back()->withErrors(['error' => 'Vous n\'êtes pas autorisé à modifier cette annonce.']);
        }

        // Récupérer l'annonce par son ID
        $OffreEnVedette = OffreEnVedette::findOrFail($annonce_id);

        // Validation des données du formulaire
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'montant' => 'required|numeric|min:0',
            'typePropriete' => 'required|string|max:255',
            'superficie' => 'nullable|numeric|min:0',
            'nbChambres' => 'nullable|integer|min:0',
            'nbSalleDeDouche' => 'nullable|integer|min:0',
            'veranda' => 'nullable|integer|min:0',
            'terrasse' => 'nullable|integer|min:0',
            'cuisine' => 'nullable|integer|min:0',
            'dependance' => 'nullable|integer|min:0',
            'piscine' => 'nullable|integer|min:0',
            'garage' => 'nullable|integer|min:0',
            'titreFoncier' => 'nullable|integer|min:0',
            'localite' => 'required|string|max:255',
            'localisation' => 'nullable|string|max:255',
            'details' => 'nullable|string',
            'typeTransaction' => 'required|string',
            'visite360' => 'nullable|string|max:255',
            'video' => 'nullable|string|max:255',
            'image' => 'required|file|mimes:jpeg,png,gif|max:2048',
        ]);

        // Si une nouvelle image est envoyée, enregistrer l'image
        if ($request->hasFile('image')) {
            // Utilisation du disque personnalisé 'annonces' pour stocker l'image
            $imagePath = $request->file('image')->store('images', 'annonces');
            $validatedData['image'] = $imagePath;
        }

        // Mise à jour de l'annonce avec les nouvelles données validées
        $OffreEnVedette->update($validatedData);

        // Envoi de la notification push
        Notification::create([
            'user_id' => $user->user_id,
            'message' => 'L\'Offre en Vedette "' . $OffreEnVedette->titre . '" a été mise à jour.',
            'is_read' => false,
            'type' => 'push',
        ]);
        // Redirection avec un message de succès
        return redirect()->route('offreEnVedette.liste')->with('success', 'Offre en Vedette mise à jour avec succès !');
    }

    public function destroyoffreEnVedette($id)
    {
        // Trouver l'annonce par son ID
        $OffreEnVedette = OffreEnVedette::findOrFail($id);

        // Supprimer l'OffreEnVedette
        $OffreEnVedette->delete();

        // Rediriger avec un message de succès
        return redirect()->route('offreEnVedette.liste')->with('success', 'Annonce supprimée avec succès.');
    }




















    public function annonceAdd(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'typePropriete' => 'required|string',
            'montant' => 'required|numeric',
            'superficie' => 'required|numeric',
            'nbChambres' => 'required|integer',
            'nbSalleDeDouche' => 'required|integer',
            'veranda' => 'required|boolean',
            'terrasse' => 'required|boolean',
            'cuisine' => 'required|boolean',
            'dependance' => 'required|boolean',
            'piscine' => 'required|boolean',
            'garage' => 'required|boolean',
            'localite' => 'required|string',
            'titreFoncier' => 'required|boolean',
            'localisation' => 'required|string',
            'details' => 'required|string',
            'typeTransaction' => 'required|string',
            'visite360' => 'nullable|url',
            'video' => 'nullable|url',
            'assigned_admin_id' => 'required|integer',
            'photos' => 'nullable|array',
            'photos.*' => 'file|mimes:jpeg,jpg,png,gif|max:2048', // Taille max 2 Mo
        ]);

        // Vérification et traitement des fichiers photos
        $photos = [];
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                if ($photo->isValid()) {
                    $photos[] = $photo->store('public/photos/' . now()->format('Y/m/d'));
                } else {
                    return back()->withErrors(['photos' => 'Un ou plusieurs fichiers sont invalides.']);
                }
            }
        }

        // Préparer les données pour l'API
        $data = array_merge($validatedData, ['photos' => $photos]);

        // Vérification du token
        $token = session('token');
        if (!$token) {
            return back()->withErrors(['error' => 'Token d\'authentification manquant.']);
        }

        // Appel à l'API
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post(config('custom.routes.annonces_create'), $data);

        // Gestion de la réponse
        if ($response->successful()) {
            return redirect()->route('annonces')->with('success', 'Annonce créée avec succès.');
        }

        $errorMessage = $response->json('message') ?? 'Erreur inconnue';
        return back()->withErrors(['error' => 'Erreur lors de la création de l\'annonce.', 'details' => $errorMessage]);
    }


    // Route GET pour afficher le formulaire de téléchargement
    public function uploadFile()
    {
        return view('Layout.Backend.Agence_dashboard.upload');
    }
    public function getFile($fileName)
    {
        $token = session('token');
        if (!$token) {
            return back()->withErrors(['error' => 'Token d\'authentification manquant.']);
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('http://localhost:3000/annonces/getAllFiles');

        if ($response->successful()) {
            $files = $response->json()['files'];

            return view('Layout.Backend.Agence_dashboard.get-file', compact('files'));
        } else {
            return back()->withErrors(['error' => 'Erreur lors de la récupération des fichiers']);
        }
    }


    public function uploadFileAdd(Request $request)
    {
        // Vérifier si un fichier a été téléchargé et qu'il est valide
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            // Récupérer le fichier téléchargé
            $file = $request->file('file');
            $filePath = $file->getPathname();

            // Récupérer le token d'authentification depuis la session
            $token = session('token');
            if (!$token) {
                return back()->withErrors(['error' => 'Token d\'authentification manquant.']);
            }

            // Envoyer le fichier à l'API NestJS
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token, // Ajouter le token d'authentification
            ])
                ->attach('file', fopen($filePath, 'r'), $file->getClientOriginalName()) // Utiliser le nom du champ 'file'
                ->post('http://localhost:3000/annonces/upload'); // Remplace par l'URL correcte de ton API NestJS

            // Vérifier la réponse de l'API
            if ($response->successful()) {
                // Rediriger vers /get-file avec le nom du fichier
                return redirect()->route('getFile', ['fileName' => $response->json()['file']]);
            } else {
                return back()->with('error', 'File upload failed: ' . $response->json()['message']);
            }
        }

        return back()->with('error', 'No file selected or invalid file.');
    }



    public function agenceTable()
    {
        return view('Layout.Backend.Agence_dashboard.table');
    }
    public function agenceChart()
    {
        return view('Layout.Backend.Agence_dashboard.charts');
    }
}
