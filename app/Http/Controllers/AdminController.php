<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Annonce;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\OffreEnVedette;

class AdminController extends Controller
{
    public function adminDashboard()
    {
        $adminId = session('user_id'); // ID de l'utilisateur connecté
        $notifications = Notification::where('user_id', $adminId)
            ->where('is_read', false) // Récupérer uniquement les notifications non lues
            ->get();

        return view('Layout.Backend.Admin_dashboard.index', compact('notifications'));
    }

    public function adminProfil()
    {
        $adminId = session('user_id'); // Récupération de l'ID de l'agent connecté depuis la session

        // Vérifie si l'ID de l'agent est présent dans la session
        if (!$adminId) {
            return redirect()->route('login')->with('fail', 'Veuillez vous connecter pour accéder à votre profil.');
        }

        // Récupère les informations de l'agent en utilisant l'ID
        $agent = User::find($adminId); // Ou un modèle spécifique pour les agents, selon ta structure

        if (!$agent) {
            return redirect()->route('login')->with('fail', 'Agent introuvable.');
        }

        return view('Layout.Connexion.Clients.admin-profile', compact('agent'));
    }

    public function adminAnnonceListe()
    {
        $annonces = Annonce::all(); // Récupérer toutes les annonces
        return view('Layout.Backend.Admin_dashboard.annonce-liste', compact('annonces'));
    }
    public function adminAnnonceValidader($id, Request $request)
    {
        // Trouver l'annonce par son ID
        $annonce = Annonce::findOrFail($id);

        // Vérifier si l'action est "validate" ou "unvalidate"
        if ($request->action == 'validate') {
            $annonce->validee = true;
        } elseif ($request->action == 'unvalidate') {
            $annonce->validee = false;
        }

        // Sauvegarder les changements
        $annonce->save();

        // Rediriger avec un message de succès
        return redirect()->route('admin.annonce.liste')->with('success', 'Annonce mise à jour avec succès.');
    }

    public function adminDestroyAnnonce($id)
    {
        // Trouver l'annonce par son ID
        $annonce = Annonce::findOrFail($id);

        // Supprimer l'annonce
        $annonce->delete();

        // Rediriger avec un message de succès
        return redirect()->route('admin.annonce.liste')->with('success', 'Annonce supprimée avec succès.');
    }

    public function adminOffreEnVedetteListe()
    {
        $OffreEnVedette = OffreEnVedette::all(); // Récupérer toutes les OffreEnVedette
        return view('Layout.Backend.Admin_dashboard.Offre_en_vedette.annonce-liste', compact('OffreEnVedette'));
    }
    public function adminOffreEnVedetteValidader($id, Request $request)
    {
        // Trouver l'annonce par son ID
        $OffreEnVedette = OffreEnVedette::findOrFail($id);

        // Vérifier si l'action est "validate" ou "unvalidate"
        if ($request->action == 'validate') {
            $OffreEnVedette->validee = true;
        } elseif ($request->action == 'unvalidate') {
            $OffreEnVedette->validee = false;
        }

        // Sauvegarder les changements
        $OffreEnVedette->save();

        // Rediriger avec un message de succès
        return redirect()->route('admin.offreEnVedette.liste')->with('success', 'offre en vedette mise à jour avec succès.');
    }

    public function adminDestroyOffreEnVedette($id)
    {
          // Trouver l'annonce par son ID
          $OffreEnVedette = OffreEnVedette::findOrFail($id);

          // Supprimer l'OffreEnVedette
          $OffreEnVedette->delete();

          // Rediriger avec un message de succès
          return redirect()->route('admin.offreEnVedette.liste')->with('success', 'Annonce supprimée avec succès.');
    }


















    public function adminTable()
    {
        return view('Layout.Backend.Admin_dashboard.table');
    }
    public function adminChart()
    {
        return view('Layout.Backend.Admin_dashboard.charts');
    }
}
