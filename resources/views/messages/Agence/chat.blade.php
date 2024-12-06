@extends('Layout.agence_layout')

@section('content')
    <div class="container py-5">
        <div class="card" id="chatBox" style="border-radius: 15px;">
            <!-- Header -->
            <div class="card-header d-flex justify-content-between align-items-center p-3 bg-info text-white">
                <p class="mb-0 fw-bold">Chat avec {{ $receiver->prenom }} ({{ $receiver->email }})</p>
            </div>

            <!-- Affichage des messages -->
            <div class="card-body" id="messagesContainer"
                style="max-height: 400px; overflow-y: auto; scroll-behavior: smooth;">
                @foreach ($messages as $message)
                    <div class="message {{ $message->sender_id === session('user_id') ? 'sent' : 'received' }}">
                        <p>{{ $message->content }}</p>
                        <small>{{ $message->created_at->format('d/m/Y H:i') }}</small>
                    </div>
                @endforeach
            </div>

            <!-- Formulaire d'envoi -->
            <div class="card-footer">
                <form action="{{ route('agence.messages.send', ['receiver_id' => $receiver->user_id]) }}" method="POST">
                    @csrf
                    <textarea name="content" rows="3" class="form-control" placeholder="Écrivez votre message..." required></textarea>
                    <button type="submit" class="btn btn-primary mt-2"><i class="fas fa-paper-plane"></i></button>
                </form>
            </div>
        </div>
    </div>

    <style>
        #chatBox {
            border-radius: 15px;
            background-color: #ffffff;
        }

        #messagesContainer {
            max-height: 400px;
            overflow-y: auto;
            scroll-behavior: smooth;
            padding-bottom: 10px;
        }

        .message {
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .sent {
            background-color: #f0f0f0;
            text-align: right;
            margin-left: 50px;
        }

        .received {
            background-color: #e1f5fe;
            text-align: left;
            margin-right: 50px;
        }

        textarea.form-control {
            font-size: 1rem;
        }

        .card-footer form {
            display: flex;
            align-items: center;
        }

        .card-footer form button {
            margin-left: 10px;
        }
    </style>
@endsection
