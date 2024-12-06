<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function userDashboard()
    {
        return view('Layout.Backend.User_dashboard.index');
    }
    public function userProfil()
    {
        $user = Auth::user(); // Récupération de l'utilisateur connecté
        if (!$user) {
            return redirect()->route('login')->with('fail', 'Veuillez vous connecter pour accéder à votre profil.');
        }

        return view('Layout.Connexion.Clients.user-profile', compact('user'));
    }
    public function redirectToDashboard()
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Stocker les informations de l'utilisateur dans la session
            session([
                'user' => [
                    'id' => $user->id,
                    'nom' => $user->nom,
                    'prenom' => $user->prenom,
                    'email' => $user->email,
                    'role' => $user->role,
                ],
            ]);

            // Rediriger vers la vue du tableau de bord
            return view('Layout.Backend.User_dashboard.index', [
                'user' => $user,
            ]);
        }

        // Si l'utilisateur n'est pas connecté, redirigez vers la page de connexion
        return redirect()->route('loginPage')->withErrors('Vous devez être connecté pour accéder au tableau de bord.');
    }









    public function userTable()
    {
        return view('Layout.Backend.User_dashboard.table');
    }
    public function userChart()
    {
        return view('Layout.Backend.User_dashboard.charts');
    }

}
