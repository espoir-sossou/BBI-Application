<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    // Afficher la conversation avec un utilisateur spécifique
    public function chat($receiver_id)
    {
        // Vérifier si l'utilisateur est authentifié
        if (!Auth::check()) {
            // Si l'utilisateur n'est pas connecté, rediriger vers la page de connexion (homePage)
            return redirect()->route('loginPage');
        }

        // Si l'utilisateur est connecté, continuer la logique
        $user = Auth::user();

        // Vérifier si le receiver_id est correct
        $receiver = User::where('user_id', $receiver_id)->firstOrFail();

        // Récupérer les messages entre l'utilisateur connecté et le destinataire
        $messages = Message::where(function ($query) use ($user, $receiver_id) {
            $query->where('sender_id', $user->user_id)
                ->where('receiver_id', $receiver_id);
        })
        ->orWhere(function ($query) use ($user, $receiver_id) {
            $query->where('sender_id', $receiver_id)
                ->where('receiver_id', $user->user_id);
        })
        ->orderBy('created_at', 'asc')
        ->get();

        // Passer les messages à la vue
        return view('messages.chat', compact('messages', 'receiver'));
    }

    // Envoyer un message
    public function sendMessage(Request $request, $receiver_id)
    {
        $request->validate([
            'content' => 'required|string|max:1000',  // Validation du message
        ]);

        // Créer un nouveau message
        Message::create([
            'sender_id' => Auth::id(),  // L'agent connecté
            'receiver_id' => $receiver_id,  // L'utilisateur destinataire
            'content' => $request->content,  // Le contenu du message
        ]);

        return redirect()->route('messages.chat', ['annonce_id' => $receiver_id])
            ->with('success', 'Message envoyé avec succès !');

    }
    public function agenceChat($receiver_id)
    {
        // Récupérer les informations de l'utilisateur connecté
        $userId = session('user_id');
        $userRole = session('user_role');

        // Vérifier si l'utilisateur est connecté et s'il s'agit d'un agent
        if (!$userId || !$userRole || $userRole !== 'AGENCE') {
            return redirect()->route('loginPage')->withErrors(['error' => 'Veuillez vous connecter pour accéder à cette page.']);
        }

        // Récupérer l'utilisateur connecté
        $user = User::where('user_id', $userId)->first();

        // Récupérer l'utilisateur destinataire (par exemple l'annonceur ou un autre agent)
        $receiver = User::where('user_id', $receiver_id)->firstOrFail();

        // Récupérer les messages entre l'utilisateur connecté et le destinataire
        $messages = Message::where(function ($query) use ($user, $receiver_id) {
            $query->where('sender_id', $user->user_id)
                ->where('receiver_id', $receiver_id);
        })
            ->orWhere(function ($query) use ($user, $receiver_id) {
                $query->where('sender_id', $receiver_id)
                    ->where('receiver_id', $user->user_id);
            })
            ->orderBy('created_at', 'asc')
            ->get();

        // Passer les messages et les informations du destinataire à la vue
        return view('messages.Agence.chat', compact('messages', 'receiver'));
    }
    public function listMessageUsers()
    {
        // Récupérer les informations de l'utilisateur connecté
        $userId = session('user_id');
        $userRole = session('user_role');

        // Vérifier si l'utilisateur est connecté et s'il s'agit d'un agent
        if (!$userId || !$userRole || $userRole !== 'AGENCE') {
            return redirect()->route('loginPage')->withErrors(['error' => 'Veuillez vous connecter pour accéder à cette page.']);
        }

        // Récupérer les utilisateurs de type "USER" ayant envoyé des messages
        $usersWithMessages = Message::where('receiver_id', $userId)
            ->join('users', 'messages.sender_id', '=', 'users.user_id')
            ->where('users.role', 'USER')
            ->distinct()
            ->get(['users.user_id', 'users.prenom', 'users.email']);

        // Passer ces utilisateurs à la vue
        return view('messages.Agence.users-list', compact('usersWithMessages'));
    }










    // Envoyer un message
    public function agenceSendMessage(Request $request, $receiver_id)
    {
        // Vérifier si l'utilisateur est connecté et s'il s'agit d'un agent
        $userId = session('user_id');
        $userRole = session('user_role');

        if (!$userId || !$userRole || $userRole !== 'AGENCE') {
            return redirect()->route('loginPage')->withErrors(['error' => 'Veuillez vous connecter pour accéder à cette page.']);
        }

        // Validation du message
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        // Enregistrement du message
        Message::create([
            'sender_id' => $userId,  // Utilisateur connecté
            'receiver_id' => $receiver_id,  // Utilisateur destinataire
            'content' => $request->content,  // Contenu du message
        ]);

        return redirect()->route('agence.messages.chat', ['receiver_id' => $receiver_id])
            ->with('success', 'Message envoyé !');

    }
    public function index($selectedUserId = null)
    {
        $userId = auth()->id();

        // Récupérer les conversations
        $conversations = Message::where('sender_id', $userId)
            ->orWhere('receiver_id', $userId)
            ->with(['sender', 'receiver'])
            ->get()
            ->groupBy(function ($message) use ($userId) {
                return $message->sender_id === $userId ? $message->receiver_id : $message->sender_id;
            })
            ->map(function ($messages) use ($userId) {
                $messagesList = $messages->sortBy('created_at'); // Trier les messages par date
                $otherUser = $messagesList->first()->sender_id === $userId
                    ? $messagesList->first()->receiver
                    : $messagesList->first()->sender;

                return [
                    'user' => $otherUser,
                    'messages' => $messagesList, // Liste complète des messages
                ];
            });

        // Récupérer les messages d'une conversation spécifique si un utilisateur est sélectionné
        $messages = [];
        $receiver = null;

        if ($selectedUserId) {
            $messages = Message::where(function ($query) use ($userId, $selectedUserId) {
                $query->where('sender_id', $userId)
                    ->where('receiver_id', $selectedUserId);
            })->orWhere(function ($query) use ($userId, $selectedUserId) {
                $query->where('sender_id', $selectedUserId)
                    ->where('receiver_id', $userId);
            })
                ->with(['sender', 'receiver'])
                ->orderBy('created_at') // Trier par date pour un affichage chronologique
                ->get();

            $receiver = User::find($selectedUserId);


            if (!$receiver) {
                return back()->withErrors(['error' => 'Destinataire introuvable.']);
            }
        }

        return view('messages.chat-index', compact('conversations', 'messages', 'receiver'));
    }
    public function show($id)
    {
        $userId = auth()->id();

        $messages = Message::where(function ($query) use ($userId, $id) {
            $query->where('sender_id', $userId)
                ->where('receiver_id', $id);
        })->orWhere(function ($query) use ($userId, $id) {
            $query->where('sender_id', $id)
                ->where('receiver_id', $userId);
        })
            ->with(['sender', 'receiver']) // Charger les relations
            ->get();

        $receiver = User::find($id); // Récupérer le destinataire par son ID

        if (!$receiver) {
            return back()->withErrors(['receiver' => 'Le destinataire est introuvable.']);
        }

        return view('messages.chat-index', compact('messages', 'receiver'));
    }
    public function store(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        // Créer un nouveau message
        $message = Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $id,
            'content' => $request->input('content'),
        ]);

        // Récupérer les messages de la conversation pour afficher après l'envoi
        $messages = Message::where(function ($query) use ($id) {
            $query->where('sender_id', auth()->id())
                ->where('receiver_id', $id);
        })->orWhere(function ($query) use ($id) {
            $query->where('sender_id', $id)
                ->where('receiver_id', auth()->id());
        })
            ->with(['sender', 'receiver'])
            ->orderBy('created_at')
            ->get();

        // Récupérer les informations du destinataire
        $receiver = User::find($id);

        // Vérifier si le destinataire existe
        if (!$receiver) {
            return back()->withErrors(['error' => 'Destinataire introuvable.']);
        }

        // Rediriger vers la page de conversation avec les messages actualisés
        return view('messages.chat-index', compact('messages', 'receiver'));
    }

    public function agenceIndex($selectedUserId = null)
    {
        $userId = auth()->id();

        // Récupérer les conversations
        $conversations = Message::where('sender_id', $userId)
            ->orWhere('receiver_id', $userId)
            ->with(['sender', 'receiver'])
            ->get()
            ->groupBy(function ($message) use ($userId) {
                return $message->sender_id === $userId ? $message->receiver_id : $message->sender_id;
            })
            ->map(function ($messages) use ($userId) {
                $messagesList = $messages->sortBy('created_at'); // Trier les messages par date
                $otherUser = $messagesList->first()->sender_id === $userId
                    ? $messagesList->first()->receiver
                    : $messagesList->first()->sender;

                return [
                    'user' => $otherUser,
                    'messages' => $messagesList, // Liste complète des messages
                ];
            });

        // Récupérer les messages d'une conversation spécifique si un utilisateur est sélectionné
        $messages = [];
        $receiver = null;

        if ($selectedUserId) {
            $messages = Message::where(function ($query) use ($userId, $selectedUserId) {
                $query->where('sender_id', $userId)
                    ->where('receiver_id', $selectedUserId);
            })->orWhere(function ($query) use ($userId, $selectedUserId) {
                $query->where('sender_id', $selectedUserId)
                    ->where('receiver_id', $userId);
            })
                ->with(['sender', 'receiver'])
                ->orderBy('created_at') // Trier par date pour un affichage chronologique
                ->get();

            $receiver = User::find($selectedUserId);

            if (!$receiver) {
                return back()->withErrors(['error' => 'Destinataire introuvable.']);
            }
        }

        return view('messages.Agence.chat-index', compact('conversations', 'messages', 'receiver'));
    }


}
