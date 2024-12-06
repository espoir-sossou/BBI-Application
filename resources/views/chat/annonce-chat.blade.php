@extends('layouts.app')

@section('content')
    <div class="chat-container">
        <div class="messages">
            @foreach ($messages as $message)
                <div class="message {{ $message->sender_id == Auth::id() ? 'sent' : 'received' }}">
                    <strong>{{ $message->sender->name }}:</strong>
                    <p>{{ $message->content }}</p>
                    <small>{{ $message->created_at->format('d/m/Y H:i') }}</small>
                </div>
            @endforeach
        </div>

        <form action="{{ route('messages.send', $receiver->user_id) }}" method="POST">
            @csrf
            <div class="form-group">
                <textarea name="content" placeholder="Écrire un message..." required></textarea>
            </div>
            <button type="submit" class="btn btn-success">
                <i class="fas fa-comment"></i> Envoyer
            </button>
        </form>
    </div>
@endsection
