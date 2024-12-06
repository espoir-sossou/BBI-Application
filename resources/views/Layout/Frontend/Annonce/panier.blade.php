@extends('Layout.lending_layout')

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
            style="background-image: url('{{ asset('Frontend/Home/assets/imgs/property-05.jpg') }}');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                <h2>Mon Panier</h2>
                <ol>
                    <li><a href="index.html">Offre</a></li>
                    <li>Mon Panier</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->
        <div class="container mt-5 mb-5">

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
                <div class="row mt-5" style="margin-bottom: 250px;">
                    @foreach ($annonces as $annonce)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                @php
                                    $firstImage = $annonce->images->first(); // Récupère la première image de la relation 'images'
                                    $imagePath = $firstImage
                                        ? Storage::url($firstImage->path)
                                        : asset('Frontend/Home/assets/imgs/default.jpg');
                                @endphp

                                <img src="{{ $imagePath }}" class="card-img-top" alt="{{ $annonce->titre }}"
                                    style="height: 200px">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $annonce->titre }}</h5>
                                    <p class="card-text">{{ number_format($annonce->montant, 0, ',', ' ') }} XOF</p>

                                    <div class="d-flex align-items-center mt-2">
                                        <span class="badge" data-bs-toggle="modal"
                                            data-bs-target="#paymentModal{{ $annonce->annonce_id }}"
                                            style="background-color: {{ $annonce->typeTransaction === 'A louer' ? '#318093' : ($annonce->typeTransaction === 'A vendre' ? '#4CAF50' : '#318093') }};
                                           color: white;
                                           cursor: pointer;">
                                            {{ $annonce->typeTransaction === 'A vendre' ? 'Acheter' : $annonce->typeTransaction }}
                                        </span>

                                        <!-- Lien pour retirer l'annonce du panier -->
                                        <form action="{{ route('panier.supprimer', $annonce->annonce_id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <span class="text-danger ms-3" style="cursor: pointer;"
                                                onclick="this.closest('form').submit()">
                                                Retirer
                                                <i class="fa fa-trash ms-1"></i>
                                            </span>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal pour choisir le type de paiement -->
                        <div class="modal fade" id="paymentModal{{ $annonce->annonce_id }}" tabindex="-1"
                            aria-labelledby="paymentModalLabel{{ $annonce->annonce_id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="paymentModalLabel{{ $annonce->annonce_id }}">Options de
                                            Paiement pour {{ $annonce->titre }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Choisissez la méthode de paiement pour cette annonce :</p>
                                        <form action="{{ route('panier.payer', $annonce->annonce_id) }}" method="POST">
                                            @csrf
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="payment_option"
                                                    id="paymentOption1{{ $annonce->annonce_id }}" value="total" checked>
                                                <label class="form-check-label"
                                                    for="paymentOption1{{ $annonce->annonce_id }}">
                                                    Paiement en totalité
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="payment_option"
                                                    id="paymentOption2{{ $annonce->annonce_id }}" value="installments">
                                                <label class="form-check-label"
                                                    for="paymentOption2{{ $annonce->annonce_id }}">
                                                    Paiement par tranches
                                                </label>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Annuler</button>
                                        <button type="submit" class="btn btn-primary">Suivant</button>
                                    </div>
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
    </main>

@endsection
