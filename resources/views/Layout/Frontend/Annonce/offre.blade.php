@extends('Layout.home')

@section('content')
    <div class="row mb-5" style="position: relative;">
        <div class="col-lg-12">

            <div class="section properties annonce ">
                <div class="container">
                    <div class="row properties-box">
                        @foreach ($annonces as $annonce)
                        <div class="col-lg-4 col-md-6 align-self-center mb-30 properties-items">
                            <div class="item position-relative">
                                @php
                                    $firstImage = $annonce->images->first(); // Récupère la première image de la relation 'images'
                                    $imagePath = $firstImage
                                        ? Storage::url($firstImage->path)
                                        : asset('Frontend/Home/assets/imgs/default.jpg');
                                    $isFavorite = in_array($annonce->annonce_id, $userFavorites ?? []); // Vérifie si l'annonce est en favoris
                                @endphp
                                <a href="{{ route('annonce.details', $annonce->annonce_id) }}">
                                    <img src="{{ $imagePath }}" alt="Image Annonce"
                                        style="max-width: 400px; height: 200px; object-fit: cover;" class="rounded">
                                </a>

                                <!-- Bouton Favoris positionné directement sur l'image -->
                                <form action="{{ route('ajouterAuxFavoris', $annonce->annonce_id) }}" method="POST"
                                    class="position-absolute" style="bottom: 285px; right: 30px; z-index: 10;">
                                    @csrf
                                    <button type="submit" class="btn p-0 border-0"
                                        title="{{ $isFavorite ? 'Retirer des favoris' : 'Ajouter aux favoris' }}">
                                        <i class="fa fa-heart"
                                            style="font-size: 24px; color: {{ $isFavorite ? 'tomato' : '#318093' }}; text-shadow: 0 0 5px rgba(0,0,0,0.5);">
                                        </i>
                                    </button>
                                </form>

                                <!-- Catégorie -->
                                <span class="category"
                                    style="
                                        background-color: {{ $annonce->typeTransaction === 'A louer' ? 'green' : ($annonce->typeTransaction === 'A vendre' ? '#17a2b8' : 'transparent') }};
                                        color: white;
                                        padding: 5px 10px;
                                        border-radius: 5px;
                                        font-size: 14px;
                                        display: inline-block;">
                                    {{ $annonce->typeTransaction }}
                                </span>

                                <!-- Informations de l'annonce -->
                                <h6>{{ number_format($annonce->montant, 0, ',', ' ') }} XOF</h6>
                                <h4>
                                    <a
                                        href="{{ route('annonce.details', $annonce->annonce_id) }}">{{ $annonce->titre }}</a>
                                </h4>
                                <ul class="list-unstyled d-flex flex-wrap gap-3">
                                    <li>
                                        <i class="fa fa-bed" style="color: #318093; font-size: 24px;"
                                            title="Nombre de chambres"></i>
                                        <span>{{ $annonce->nbChambres }}</span>
                                    </li>
                                    <li>
                                        <i class="fa fa-shower" style="color: #318093; font-size: 24px;"
                                            title="Salles de bain"></i>
                                        <span>{{ $annonce->nbSalleDeDouche }}</span>
                                    </li>
                                    <li>
                                        <i class="fa fa-ruler-combined" style="color: #318093; font-size: 24px;"
                                            title="Superficie"></i>
                                        <span>{{ $annonce->superficie }} m²</span>
                                    </li>

                                    <li>
                                        <i class="fa fa-car" style="color: #318093; font-size: 24px;"
                                            title="Parking"></i>
                                        <span>{{ $annonce->garage ? '1' : '0' }}</span>
                                    </li>
                                    <li>
                                        <i class="fa fa-file-alt" style="color: #318093; font-size: 24px;"
                                            title="Titre foncier"></i>
                                        <span>{{ $annonce->garage ? 'Oui' : 'Non' }}</span>
                                    </li>
                                    <li>
                                        <i class="fa fa-swimming-pool" style="color: #318093; font-size: 24px;"
                                            title="Piscine"></i>
                                        <span>{{ $annonce->piscine ? 'Oui' : 'Non' }}</span>
                                    </li>
                                </ul>

                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
        <!-- villa End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="Generales/lib/easing/easing.min.js"></script>
    <script src="Generales/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="Generales/mail/jqBootstrapValidation.min.js"></script>
    <script src="Generales/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="Generales/js/main.js"></script>

    <!-- Scripts Villa-->
    <!-- Bootstrap core JavaScript -->
    <script src="Generales/Villa/vendor/jquery/jquery.min.js"></script>
    <script src="Generales/Villa/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="Generales/Villa/assets/js/isotope.min.js"></script>
    <script src="Generales/Villa/assets/js/owl-carousel.js"></script>
    <script src="Generales/Villa/assets/js/counter.js"></script>
    <script src="Generales/Villa/assets/js/custom.js"></script>
@endsection
