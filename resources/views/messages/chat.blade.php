@extends('Layout.home')

@section('content')
<div class="container">
    <h3>Chat avec {{ $receiver->nom }} {{ $receiver->prenom }}</h3>
    <div class="chat-box">
        @foreach($messages as $message)
            <div class="{{ $message->sender_id === auth()->id() ? 'sent' : 'received' }}">
                <p>{{ $message->content }}</p>
                <small>{{ $message->created_at->format('d/m/Y H:i') }}</small>
            </div>
        @endforeach
    </div>

    <form action="{{ route('messages.send', $receiver->user_id) }}" method="POST">
        @csrf
        <textarea name="content" rows="3" class="form-control" placeholder="Écrivez votre message..."></textarea>
        <button type="submit" class="btn btn-primary mt-2">Envoyer</button>
    </form>
</div>

<style>
    .chat-box {
        max-height: 400px;
        overflow-y: scroll;
        border: 1px solid #ddd;
        padding: 15px;
        margin-bottom: 20px;
    }
    .sent {
        text-align: right;
        background-color: #d4f4dd;
        margin-bottom: 10px;
    }
    .received {
        text-align: left;
        background-color: #f4d4d4;
        margin-bottom: 10px;
    }
</style>
@endsection
