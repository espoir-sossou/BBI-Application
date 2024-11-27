@extends('Layout.home')

@section('content')
    <div class="container mt-5">
        <h2>Mes Favoris</h2>

        @if (session('message'))
            <div class="alert alert-info">
                {{ session('message') }}
            </div>
        @elseif(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (count($annonces) > 0)
            <div class="row">
                @foreach ($annonces as $annonce)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            @php
                                $imagePath = $annonce->image
                                    ? Storage::url($annonce->image)
                                    : asset('Frontend/Home/assets/imgs/default.jpg'); // Image par défaut
                            @endphp

                            <img src="{{ $imagePath }}" class="card-img-top" alt="{{ $annonce->titre }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $annonce->titre }}</h5>
                                <p class="card-text">{{ number_format($annonce->montant, 0, ',', ' ') }} XOF</p>
                                <a href="{{ route('annonce.details', $annonce->annonce_id) }}" class="btn btn-info">Voir les
                                    détails</a>

                                <!-- Bouton pour supprimer l'annonce des favoris -->
                                <form action="{{ route('favoris.supprimer', $annonce->annonce_id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm mt-2">Supprimer des favoris</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>Vous n'avez pas encore ajouté de favoris.</p>
        @endif
    </div>
@endsection
