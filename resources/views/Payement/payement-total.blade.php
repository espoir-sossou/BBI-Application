@extends('Layout.home')

@section('content')
    <div class="container mt-5">
        <h2>Paiement de l'Annonce: {{ $annonce->titre }}</h2>
        <p><strong>Montant Total:</strong> {{ number_format($annonce->montant, 0, ',', ' ') }} XOF</p>

        <form >
            @csrf
            <!-- Ajoute ici ton formulaire de paiement -->
            <button type="submit" class="btn btn-info">Payer maintenant</button>
        </form>

        <a href="{{ route('panier') }}" class="btn btn-primary mt-3">Retour au Panier</a>
    </div>
@endsection
