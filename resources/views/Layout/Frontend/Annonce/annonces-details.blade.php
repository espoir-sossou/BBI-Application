@extends('Layout.home')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row g-4 align-items-center mb-5">
            <!-- Image de l'annonce -->
            <div class="col-md-6 d-flex justify-content-center position-relative">
                @php
                    $imagePath = $annonceDetail->image
                        ? Storage::url($annonceDetail->image)
                        : asset('Frontend/Home/assets/imgs/default.jpg'); // Image par défaut
                @endphp

                <img src="{{ $imagePath }}" alt="{{ $annonceDetail->titre }}" class="img-fluid rounded shadow"
                    style="max-height: 500px; object-fit: cover; width: 100%;">


                <!-- Icône de favoris -->
                <form action="{{ route('ajouterAuxFavoris', $annonceDetail->annonce_id) }}" method="POST"
                    class="favorite-icon">
                    @csrf
                    <button type="submit" class="btn">
                        <i class="fa fa-heart" style="font-size: 24px; color: #318093;"></i>
                    </button>
                </form>
            </div>


            <!-- Détails de l'annonce -->
            <div class="col-md-6">
                <h5 class="mb-3">{{ $annonceDetail->titre }}</h5>
                <h3 class="text-success mb-3">{{ number_format($annonceDetail->montant, 0, ',', ' ') }} XOF</h3>
                <p>
                    <strong>Type de transaction :</strong>
                    <span style="color: {{ $annonceDetail->typeTransaction === 'A louer' ? 'green' : '#17a2b8' }}">
                        {{ $annonceDetail->typeTransaction }}
                    </span>
                </p>

                <!-- Liste des informations -->
                <ul class="list-unstyled mt-4">
                    <li><strong>Description :</strong> {{ $annonceDetail->description }}</li>
                    <li><strong>Type de propriété :</strong> {{ $annonceDetail->typePropriete }}</li>
                    <li><strong>Superficie :</strong> {{ $annonceDetail->superficie }} m²</li>
                    <li><strong>Nombre de chambres :</strong> {{ $annonceDetail->nbChambres }}</li>
                    <li><strong>Nombre de salles de bain :</strong> {{ $annonceDetail->nbSalleDeDouche }}</li>
                    <li><strong>Véranda :</strong> {{ $annonceDetail->veranda ? 'Oui' : 'Non' }}</li>
                    <li><strong>Terrasse :</strong> {{ $annonceDetail->terrasse ? 'Oui' : 'Non' }}</li>
                    <li><strong>Cuisine :</strong> {{ $annonceDetail->cuisine ? 'Oui' : 'Non' }}</li>
                    <li><strong>Dépendance :</strong> {{ $annonceDetail->dependance ? 'Oui' : 'Non' }}</li>
                    <li><strong>Piscine :</strong> {{ $annonceDetail->piscine ? 'Oui' : 'Non' }}</li>
                    <li><strong>Garage :</strong> {{ $annonceDetail->garage ? 'Oui' : 'Non' }}</li>
                    <li><strong>Titre foncier :</strong> {{ $annonceDetail->titreFoncier ? 'Oui' : 'Non' }}</li>
                    <li><strong>Localité :</strong> {{ $annonceDetail->localite }}</li>
                </ul>

                <!-- Boutons -->
                <div class="mt-4 d-flex gap-2">
                    <form action="{{ route('ajouterAuPanier', $annonceDetail->annonce_id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-info btn-lg" style="border-radius: 25px;">
                            <i class="fas fa-shopping-cart me-2"></i>Acheter
                        </button>
                    </form>
                    <form action="{{ route('ajouterAuPanier', $annonceDetail->annonce_id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success btn-lg" style="border-radius: 25px;">
                            <i class="fas fa-check-circle me-2"></i>A Louer
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Custom CSS -->
    <style>
        @media (max-width: 768px) {
            .row.g-4>div {
                margin-bottom: 1.5rem;
            }
        }

        .btn-lg {
            font-size: 1rem;
            padding: 0.75rem 1.5rem;
        }
    </style>
@endsection
