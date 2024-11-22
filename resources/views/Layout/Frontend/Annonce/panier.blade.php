@extends('Layout.home')

@section('content')
<div class="container mt-5">
    <h2>Mon Panier</h2>

    @if(session('message'))
        <div class="alert alert-info">
            {{ session('message') }}
        </div>
    @elseif(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(count($annonces) > 0)
        <div class="row">
            @foreach($annonces as $annonce)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('uploads/annonces/' . $annonce->image) }}" class="card-img-top" alt="{{ $annonce->titre }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $annonce->titre }}</h5>
                            <p class="card-text">{{ number_format($annonce->montant, 0, ',', ' ') }} XOF</p>
                            <a href="#"
                                class="btn btn-sm mt-2"
                                style="background-color: {{ $annonce->typeTransaction === 'A louer' ? '#318093' : '#318093' }}; color: white;">
                                {{ $annonce->typeTransaction }}
                             </a>


                            <!-- Bouton pour supprimer l'annonce du panier -->
                            <form action="{{ route('panier.supprimer', $annonce->annonce_id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm mt-2">Supprimer du panier</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>Votre panier est vide.</p>
    @endif
</div>
@endsection
