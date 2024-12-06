@extends('Layout.lending_layout')

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
            style="background-image: url('{{ asset('Frontend/Home/assets/imgs/img11.jpg') }}');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                <h2>Paiement Total</h2>
                <ol>
                    <li><a href="index.html">Offre</a></li>
                    <li>Paiement</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->
    <div class="container mt-5" style="margin-bottom: 250px">
        <h2>Paiement de l'Annonce: {{ $annonce->titre }}</h2>
        <p><strong>Montant Total:</strong> {{ number_format($annonce->montant, 0, ',', ' ') }} XOF</p>

        <form >
            @csrf
            <!-- Ajoute ici ton formulaire de paiement -->
            <button type="submit" class="btn btn-info">Payer maintenant</button>
        </form>

        <a href="{{ route('panier') }}" class="btn btn-primary mt-3">Retour au Panier</a>
    </div>
</main>

@endsection
