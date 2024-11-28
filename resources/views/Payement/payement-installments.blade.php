@extends('Layout.home')

@section('content')
    <div class="container mt-5">
        <h2>Paiement par Tranches pour l'Annonce: {{ $annonce->titre }}</h2>
        <p><strong>Montant Total:</strong> {{ number_format($annonce->montant, 0, ',', ' ') }} XOF</p>

        <p>Choisissez le nombre de tranches :</p>
        <form >
            @csrf
            <div class="form-group">
                <label for="installments">Nombre de tranches :</label>
                <select name="installments" id="installments" class="form-control">
                    <option value="3">3 Tranches</option>
                    <option value="6">6 Tranches</option>
                    <option value="12">12 Tranches</option>
                </select>
            </div>
            <button type="submit" class="btn btn-info mt-3">Confirmer le paiement</button>
        </form>

        <a href="{{ route('panier') }}" class="btn btn-primary mt-3">Retour au Panier</a>
    </div>
@endsection
