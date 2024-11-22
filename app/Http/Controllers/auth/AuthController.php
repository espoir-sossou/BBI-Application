<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use App\Models\Dashboard;
use Illuminate\Http\Request;
use App\Mail\SignupConfirmation;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\SigninRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
        // Validation des données
        $validator = Validator::make($request->all(), [
            'nom' => 'nullable|string|max:255',
            'prenom' => 'nullable|string|max:255',
            'sexe' => 'nullable|string|max:10',
            'username' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|string',
            'telephone' => 'nullable|string|max:20',
            'adresse' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            // Sauvegarde du mot de passe en clair temporairement pour l'e-mail
            $plainPassword = $request->password;

            // Vérifier que les champs nom et prenom existent avant de les passer à la création
            $userData = [
                'nom' => $request->nom ?: null,
                'prenom' => $request->prenom ?: null,
                'sexe' => $request->sexe,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'telephone' => $request->telephone,
                'adresse' => $request->adresse,
            ];

            // Création de l'utilisateur
            $user = User::create($userData);

            // Envoi de l'email de confirmation
            Mail::to($user->email)->send(new SignupConfirmation($user, $plainPassword));

            // Rediriger vers la page de connexion avec un message de succès
            return redirect()->route('loginPage') // Vous devez vous assurer que cette route est définie dans votre `web.php`
                ->with('success', 'Utilisateur inscrit avec succès. Un email de confirmation a été envoyé.');

        } catch (\Exception $e) {
            Log::error('Erreur lors de l\'inscription : ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Erreur interne du serveur.']);
        }
    }

    // app/Http/Controllers/auth/AuthController.php

    public function login(Request $request)
    {
        // Validation des données d'entrée
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Récupérer l'utilisateur avec l'email fourni
        $user = User::where('email', $validatedData['email'])->first();

        // Vérification des identifiants
        if (!$user || !Hash::check($validatedData['password'], $user->password)) {
            return redirect()->back()->withErrors(['error' => 'Identifiants incorrects']);
        }

        // Vérification de l'état du compte utilisateur
        if ($user->status !== 'active') {
            return redirect()->back()->withErrors(['error' => 'Votre compte est inactif. Veuillez contacter l\'administration.']);
        }

        // Générer un token JWT
        $token = JWTAuth::fromUser($user);

        // Déterminer l'URL de redirection en fonction du rôle
        $redirectUrl = match ($user->role) {
            'ADMIN' => route('admin.dashboard'),
            'AGENCE', 'VENDEUR' => $this->getDashboardUrlForAgenceVendeur($user),
            'USER' => route('homePage'),
            default => route('loginPage'),
        };

        // Stocker les informations nécessaires dans la session pour utilisation
        session([
            'token' => $token,
            'user_id' => $user->user_id,
            'user_role' => $user->role,
            'user_dashboard_url' => $redirectUrl,  // Ajouter l'URL du tableau de bord
        ]);

        // Rediriger l'utilisateur vers la page correspondante
        return redirect($redirectUrl);
    }

    /**
     * Récupérer l'URL du tableau de bord pour les rôles AGENCE et VENDEUR
     */
    private function getDashboardUrlForAgenceVendeur($user)
    {
        // Vérifier si l'utilisateur a déjà un tableau de bord
        $dashboard = Dashboard::where('user_id', $user->user_id)->first();

        // Si le tableau de bord n'existe pas, en créer un vide
        if (!$dashboard) {
            $dashboard = new Dashboard([
                'user_id' => $user->user_id,
                'content' => 'Tableau de bord vide',  // Par défaut, le contenu peut être "vide" ou une autre valeur
            ]);
            $dashboard->save();  // Sauvegarder le tableau de bord dans la base de données
        }

        // Rediriger vers le tableau de bord de l'utilisateur en fonction du rôle
        $dashboardUrl = route('loginPage');  // URL par défaut

        if ($user->role === 'AGENCE') {
            // Rediriger vers un tableau de bord spécifique à l'AGENCE
            $dashboardUrl = route('agence.dashboard');
        } elseif ($user->role === 'VENDEUR') {
            // Rediriger vers un tableau de bord spécifique au VENDEUR
            $dashboardUrl = route('vendeur.dashboard');
        }

        return $dashboardUrl;
    }





    public function logout(Request $request)
    {
        // Déconnexion de l'utilisateur
        Auth::logout();

        // Invalidation de la session pour s'assurer que l'utilisateur ne peut pas revenir avec l'ancienne session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirection vers la page de connexion avec un message de succès
        return redirect()->route('loginPage')->with('success', 'Vous êtes bien déconnecté.');
    }



    public function signupConfirmation()
    {
        return view('emails.signup_confirmation');
    }































    public function googleLogin()
    {
        // URL de l'authentification Google sur l'API NestJS
        $response = config('custom.routes.auth_google_login');

        // Redirection vers l'API pour l'authentification Google
        return redirect()->away($response);
    }

    public function userProfil(Request $request)
    {
        // Vérifier si l'utilisateur est connecté et si le rôle est 'USER'
        $userId = session('user_id');
        $userRole = session('user_role');

        // Récupérer les informations de l'utilisateur depuis la session
        if ($userId && $userRole && $userRole === 'USER') {
            // L'utilisateur est connecté et son rôle est 'USER'

            // Récupérer les informations utilisateur depuis la base de données
            $user = User::find($userId); // Remplace "User" par le nom de ton modèle

            if ($user) {
                // Créer un tableau avec les informations utilisateur
                $userData = [
                    'user_id' => $user->id,
                    'role' => $user->role,
                    'email' => $user->email,
                    'nom' => $user->nom,
                    'prenom' => $user->prenom,
                    'telephone' => $user->telephone,
                    // Ajouter d'autres informations si nécessaire
                ];

                // Passer les données à la vue
                return view('Layout.Connexion.Clients.user-profile', ['user' => $userData]);
            } else {
                // L'utilisateur n'a pas été trouvé dans la base de données
                return redirect()->route('loginPage')->with('fail', 'Utilisateur introuvable.');
            }
        } else {
            // Si l'utilisateur n'est pas connecté ou son rôle n'est pas 'USER', rediriger vers la page de connexion
            return redirect()->route('loginPage');
        }
    }

    public function signUpPage()
    {
        return view('Layout.Connexion.Clients.sign_up');
    }
    public function handleSignup(Request $request)
    {
        // Valider les champs du formulaire
        $request->validate([
            'lastname' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'sexe' => 'required|string|in:M,F', // Validation pour les valeurs 'M' et 'F'
            'role' => 'required|string|in:ADMIN,ACHETEUR,VENDEUR,AGENCE,USER', // Validation des rôles
            'email' => 'required|email',
            'password' => 'required|string|min:6',  // Ajoute un champ "password_confirmation" dans ton formulaire si tu veux confirmer le mot de passe
            'adresse' => 'nullable|string|max:255',
        ]);

        // Appeler l'API NestJS pour l'inscription
        $response = Http::post(config('custom.routes.auth_register'), [
            'nom' => $request->input('lastname'),
            'prenom' => $request->input('firstname'),
            'sexe' => $request->input('sexe'),
            'role' => $request->input('role'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),  // Envoyer le mot de passe brut, l'API se chargera du hachage
            'telephone' => $request->input('phone'),
            'adresse' => $request->input('adresse'),
        ]);

        // Vérifier la réponse de l'API
        if ($response->successful()) {
            // Si l'inscription réussit, rediriger avec un message de succès
            return redirect()->route('loginPage')->with('success', 'Inscription réussie ! veuillez vous connecter ');
        } else {
            // Afficher un message d'erreur si l'API retourne une erreur
            $errorMessage = $response->json('message') ?? 'Erreur lors de l\'inscription';
            return back()->withErrors(['message' => $errorMessage]);
        }
    }

    public function loginPage()
    {
        return view(view: 'Layout.Connexion.Clients.sign_in');
    }

    public function AgentloginPage()
    {
        return view('Layout.Connexion.Clients.agent_sign_in');
    }
    public function handleLogin(Request $request)
    {
        // Valider les champs
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Appeler l'API NestJS
        $response = Http::post(config('custom.routes.auth_login'), [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        if ($response->successful() && $response->json('status') === "0000") {
            // Si l'authentification est réussie, récupérer les données de l'utilisateur
            $data = $response->json('data');
            $role = $data['role'];  // Récupérer le rôle de l'utilisateur

            // Enregistrer les informations de l'utilisateur et le token dans la session
            Session::put('user', $data);
            Session::put('token', $data['token']);  // Sauvegarder le token dans la session

            // Redirection en fonction du rôle
            switch ($role) {
                case 'ADMIN':
                    return redirect()->route('admin.dashboard')->with('success', 'Connexion réussie !');
                case 'AGENCE':
                    return redirect()->route('agence.dashboard')->with('success', 'Connexion réussie !');
                case 'VENDEUR':
                    return redirect()->route('vendeur.dashboard')->with('success', 'Connexion réussie !');
                case 'USER':
                    return redirect()->route('user.dashboard')->with('success', 'Connexion réussie !');
                default:
                    // Si le rôle n'est pas reconnu, afficher un message d'erreur
                    return redirect()->route('loginPage')->with('fail', 'Rôle utilisateur non reconnu.');
            }
        } else {
            // Afficher un message d'erreur si l'API retourne une erreur
            $errorMessage = $response->json('message') ?? 'Erreur lors de la connexion';
            return redirect()->route('loginPage')->with('fail', $errorMessage);
        }
    }

    /*
    public function handleLogout(Request $request)
    {
        // Vérifiez si un utilisateur est authentifié dans la session
        if (Session::has('user')) {
            // Récupère le token de l'utilisateur pour l'envoyer à l'API NestJS
            $token = Session::get('user.token');
            $isGoogleAuth = Session::get('user.isGoogleAuth', false);

            // Supprime les informations de session de l'utilisateur
            Session::flush();

            // Choisissez la bonne route pour la déconnexion en fonction du type de connexion
            $logoutRoute = $isGoogleAuth ? config('custom.routes.auth_google_logout') : config('custom.routes.auth_logout');

            $response = Http::withToken($token)->post($logoutRoute);

            if ($response->successful()) {
                return redirect()->route('loginPage')->with('success', 'Déconnexion réussie !');
            } else {
                return redirect()->route('user.profil')->with('fail', 'Erreur lors de la déconnexion depuis le serveur.');
            }
        } else {
            // Si l'utilisateur n'est pas en session, redirection directe vers la page de connexion
            return redirect()->route('loginPage')->with('fail', 'Aucun utilisateur connecté.');
        }
    }
 */

    public function authLogout(Request $request)
    {
        // Effacer les informations de l'utilisateur de la session
        $request->session()->forget('user_id');
        $request->session()->forget('user_role');
        $request->session()->forget('user'); // Si tu as des informations supplémentaires stockées

        // Optionnellement, on peut aussi détruire complètement la session
        $request->session()->flush();

        // Rediriger l'utilisateur vers la page de connexion
        return redirect()->route('loginPage')->with('success', 'Vous êtes maintenant déconnecté.');
    }





}
