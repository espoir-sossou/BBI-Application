@extends('Layout.lending_layout')

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
            style="background-image: url('{{ asset('Frontend/Home/assets/imgs/aub1.jpg') }}');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                <h2>Mes Favoris</h2>
                <ol>
                    <li><a href="index.html">Offre</a></li>
                    <li>Mes Favoris</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->
        <div class="container mt-5 mb-5" >

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

                                <img src="{{ $imagePath }}" class="card-img-top" alt="{{ $annonce->titre }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $annonce->titre }}</h5>
                                    <p class="card-text">{{ number_format($annonce->montant, 0, ',', ' ') }} XOF</p>
                                    <div class="d-flex align-items-center mt-2">
                                        <span class="badge"> <a href="{{ route('annonce.details', $annonce->annonce_id) }}"
                                                class="text-info" style="font-size: 16px">Voir les
                                                détails</a>
                                        </span>

                                        <!-- Lien pour retirer l'annonce du panier -->
                                        <form action="{{ route('favoris.supprimer', $annonce->annonce_id) }}" method="POST"
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
                    @endforeach
                </div>
            @else
                <p>Vous n'avez pas encore ajouté de favoris.</p>
            @endif
        </div>
    </main>

@endsection
