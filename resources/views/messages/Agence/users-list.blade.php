@extends('Layout.agence_layout')

@section('content')
<div class="container py-5">
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0">Liste des utilisateurs ayant envoyé des messages</h4>
        </div>
        <div class="card-body">
            @if($usersWithMessages->isEmpty())
                <p>Aucun utilisateur n'a encore envoyé de message.</p>
            @else
                <ul class="list-group">
                    @foreach($usersWithMessages as $user)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>
                                <strong>{{ $user->name }}</strong> ({{ $user->email }})
                            </span>
                            <a href="{{ route('agence.messages.chat', ['receiver_id' => $user->user_id]) }}" class="btn btn-primary btn-sm">
                                Voir les messages
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
@endsection
