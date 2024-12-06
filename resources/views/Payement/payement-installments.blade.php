@extends('Layout.lending_layout')

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
            style="background-image: url('{{ asset('Frontend/Home/assets/imgs/img11.jpg') }}');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                <h2>Paiement par Tranches</h2>
                <ol>
                    <li><a href="index.html">Offre</a></li>
                    <li>Paiement</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->
    <div class="container mt-5" style="margin-bottom: 250px">
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
</main>

@endsection
