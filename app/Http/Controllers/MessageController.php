<?php

namespace App\Http\Controllers;

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
        $user = Auth::user();
        $receiver = User::findOrFail($receiver_id);

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

        return view('messages.chat', compact('messages', 'receiver'));
    }

    // Envoyer un message
    public function sendMessage(Request $request, $receiver_id)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $message = Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $receiver_id,
            'content' => $request->content,
        ]);

        return redirect()->route('messages.chat', ['receiver_id' => $receiver_id])
                         ->with('success', 'Message envoyé !');
    }
}
