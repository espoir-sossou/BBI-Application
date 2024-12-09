<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags pour réseaux sociaux -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $annonceDetail->titre ?? 'Détails de l\'annonce' }}</title>

    <meta property="og:title" content="{{ $annonceDetail->titre }}" />
    <meta property="og:description" content="{{ $annonceDetail->description }}" />
    <meta property="og:image"
        content="{{ $annonceDetail->images->isNotEmpty() ? Storage::url($annonceDetail->images->first()->path) : asset('Frontend/Home/assets/imgs/default.jpg') }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />


    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $annonceDetail->titre }}" />
    <meta name="twitter:description" content="{{ $annonceDetail->description }}" />
    <meta name="twitter:image"
        content="{{ $annonceDetail->images->isNotEmpty() ? Storage::url($annonceDetail->images->first()->path) : asset('Frontend/Home/assets/imgs/default.jpg') }}" />
    <meta name="twitter:url" content="{{ url()->current() }}" />


    <!-- CSS et JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-5 mb-5">
        <div class="row g-4">
            <!-- Galerie d'images avec favoris -->
            <div class="col-md-7 position-relative">
                <div class="row g-2">
                    @if ($annonceDetail->images->isNotEmpty())
                        @foreach ($annonceDetail->images as $image)
                            <div class="col-6 col-md-4">
                                <a href="{{ Storage::url($image->path) }}" data-bs-toggle="lightbox"
                                    data-gallery="gallery">
                                    <img src="{{ Storage::url($image->path) }}" class="img-fluid rounded shadow"
                                        alt="Image {{ $loop->index + 1 }}" style="height: 150px; object-fit: cover;">
                                </a>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12">
                            <img src="{{ asset('Frontend/Home/assets/imgs/default.jpg') }}" alt="Image par défaut"
                                class="img-fluid rounded shadow" style="width: 100%; object-fit: cover;">
                        </div>
                    @endif
                </div>

            </div>
        </div>
        <!-- Détails de l'annonce -->
        <div class="col-md-5">
            <h5>{{ $annonceDetail->titre }}</h5>
            <h3 class="text-success">{{ number_format($annonceDetail->montant, 0, ',', ' ') }} XOF</h3>
            <p>
                <strong>Type de transaction :</strong>
                <span style="color: {{ $annonceDetail->typeTransaction === 'A louer' ? 'green' : '#17a2b8' }}">
                    {{ $annonceDetail->typeTransaction }}
                </span>
            </p>
            <ul class="list-unstyled">
                <li><strong>Titre :</strong> {{ $annonceDetail->titre }}</li>
                <li><strong>Description :</strong> {{ $annonceDetail->description }}</li>
                <li><strong>Type de propriété :</strong> {{ $annonceDetail->typePropriete }}</li>
                <li><strong>Montant :</strong> {{ $annonceDetail->montant }}</li>
                <li><strong>Superficie :</strong> {{ $annonceDetail->superficie }} m²</li>
                <li><strong>Nombre de chambres :</strong> {{ $annonceDetail->nbChambres }}</li>
                <li><strong>Nombre de salles de bain :</strong> {{ $annonceDetail->nbSalleDeDouche }}</li>
                <li><strong>Veranda :</strong> {{ $annonceDetail->veranda ? 'Oui' : 'Non' }}</li>
                <li><strong>Terrasse :</strong> {{ $annonceDetail->terrasse ? 'Oui' : 'Non' }}</li>
                <li><strong>Cuisine :</strong> {{ $annonceDetail->cuisine ? 'Oui' : 'Non' }}</li>
                <li><strong>Dépendance :</strong> {{ $annonceDetail->dependance ? 'Oui' : 'Non' }}</li>
                <li><strong>Piscine :</strong> {{ $annonceDetail->piscine ? 'Oui' : 'Non' }}</li>
                <li><strong>Garage :</strong> {{ $annonceDetail->garage ? 'Oui' : 'Non' }}</li>
                <li><strong>Titre foncier :</strong> {{ $annonceDetail->titreFoncier ? 'Oui' : 'Non' }}</li>
                <li><strong>Localité :</strong> {{ $annonceDetail->localite }}</li>
            </ul>


            <!-- Boutons d'action -->
            <div class="mt-4">
                @if ($annonceDetail->typeTransaction === 'A vendre')
                    <form action="{{ route('ajouterAuPanier', $annonceDetail->annonce_id) }}" method="POST"
                        class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-info"
                            style="border-radius: 25px; padding: 0.75rem 1.5rem;">
                            <i class="fas fa-shopping-cart me-2"></i>Acheter
                        </button>
                    </form>
                @elseif($annonceDetail->typeTransaction === 'A louer')
                    <form action="{{ route('ajouterAuPanier', $annonceDetail->annonce_id) }}" method="POST"
                        class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-info"
                            style="border-radius: 25px; padding: 0.75rem 1.5rem;">
                            <i class="fas fa-check-circle me-2"></i>Louer
                        </button>
                    </form>
                @endif

                <a href="{{ route('messages.chat', $annonceDetail->user_id) }}">
                    <button class="btn btn-success" style="border-radius: 25px; padding: 0.75rem 1.5rem;">
                        <i class="fas fa-comment me-2"></i>Message
                    </button>
                </a>

                <!--  <a href="{{ route('annonce.carte', $annonceDetail->annonce_id) }}">
                                                    <button class="btn btn-dark" style="border-radius: 25px; padding: 0.75rem 1.5rem;">
                                                        <i class="fas fa-search-plus me-2"></i>Visite 360°
                                                    </button>
                                                </a>-->
                <a href="javascript:void(0);">
                    <button id="share-btn" class="btn btn-dark" data-title="{{ $annonceDetail->titre }}"
                        data-description="{{ $annonceDetail->description }}"
                        data-type-propriete="{{ $annonceDetail->typePropriete }}"
                        data-montant="{{ $annonceDetail->montant }}" data-localite="{{ $annonceDetail->localite }}"
                        data-url="{{ url()->current() }}"
                        data-image="{{ $annonceDetail->images->isNotEmpty() ? url(Storage::url($annonceDetail->images->first()->path)) : url(asset('Frontend/Home/assets/imgs/default.jpg')) }}"
                        style="border-radius: 25px; padding: 0.75rem 1.5rem;">
                        <i class="fas fa-share me-2"></i>Partager
                    </button>
                </a>




            </div>
        </div>
        <!-- Modal de partage -->
        <div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-bottom">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="shareModalLabel">Partager cette annonce</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex flex-row justify-content-center gap-2">
                            <a id="facebook" target="_blank" class="share-icon" style="color: #3b5998;">
                                <i class="fab fa-facebook"></i>
                            </a>
                            <a id="twitter" target="_blank" class="share-icon" style="color: #1da1f2;">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a id="whatsapp" target="_blank" class="share-icon" style="color: #25d366;">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            document.querySelector('#share-btn').addEventListener('click', function(event) {
                event.preventDefault();

                const url = this.dataset.url; // URL actuelle
                const title = this.dataset.title; // Titre de l'annonce
                const description = this.dataset.description; // Description de l'annonce
                const typePropriete = this.dataset.typePropriete; // Type de propriété
                const montant = this.dataset.montant; // Montant
                const localite = this.dataset.localite; // Localité
                const image = this.dataset.image; // Image de l'annonce

                // Contenu par défaut à ajouter à la fin
                const defaultInfo = `
            https://www.bolivebusinessinter.bj/annonce/eud-788/
            Infoline : wa.me/2290196910901
            (+229) 01 9691 0901 / (+229) 01 4015 6804
            E-mail : info@bolivebusinessinter.bj`;

                // Texte complet pour WhatsApp
                const whatsappText = `
            ${title}
            ${description}
            Type de propriété : ${typePropriete}
            Montant : ${montant}
            Localité : ${localite}
            
            Images: ${image}

            Lien : ${url}

            ${defaultInfo}
    `;

                // Lien pour WhatsApp (inclut tous les éléments formatés)
                document.getElementById('whatsapp').href =
                    `https://api.whatsapp.com/send?text=${encodeURIComponent(whatsappText)}`;

                // Affiche le modal
                new bootstrap.Modal(document.getElementById('shareModal')).show();
            });
        </script>






        <style>
            /* Modal style */
            .modal-bottom .modal-content {
                border-radius: 8px;
                width: 100%;
                position: fixed;
                bottom: 0;
                left: 0;
                right: 0;
                margin: 0;
                border-radius: 10px 10px 0 0;
                animation: slideUp 0.3s ease-in-out;
            }

            @keyframes slideUp {
                from {
                    transform: translateY(100%);
                }

                to {
                    transform: translateY(0);
                }
            }

            /* Social media icon style */
            .share-icon {
                display: flex;
                align-items: center;
                text-decoration: none;
                color: #555;
                margin: 0 5px;
            }

            .share-icon i {
                font-size: 30px;
                margin-right: 4px;
            }

            .modal-body a {
                width: 40px;
                height: 40px;
                padding: 5px;
                background-color: #f0f0f0;
                border-radius: 10px;
                margin: 5px;
                transition: background-color 0.3s ease;
            }

            .modal-body a:hover {
                background-color: #d1d1d1;
            }
        </style>
</body>

</html>
