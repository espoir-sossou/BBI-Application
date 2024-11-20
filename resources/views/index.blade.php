@extends('Layout.home')

@section('content')
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" style="height: 50vh;">
        <div class="carousel-inner h-100">
            @foreach ($offresEnVedette as $index => $offre)
                <div class="carousel-item h-100 {{ $index === 0 ? 'active' : '' }}">
                    @if ($offre->image)
                        <img src="{{ asset('storage/' . $offre->image) }}" class="d-block w-100 h-100"
                            style="object-fit: cover; transition: opacity 1s ease-in-out;" alt="Image de l'offre en vedette">
                    @else
                        <img src="Frontend/Home/assets/imgs/default.jpg" class="d-block w-100 h-100"
                            style="object-fit: cover; transition: opacity 1s ease-in-out;" alt="Image par défaut">
                    @endif
                    <!-- Titre sur l'image avec ombre -->
                    <div class="text-on-image"
                        style="
position: absolute;
top: 10%;
left: 10px;
z-index: 10;
background-color: rgba(0, 0, 0, 0.5); /* Fond semi-transparent noir */
color: white;
padding: 5px 10px; /* Espace autour du texte */
border-radius: 5px; /* Coins arrondis pour un style moderne */
">
                        <h5 style="margin: 0; color: white">{{ $offre->titre ?? 'Titre par défaut' }}</h5>
                    </div>

                </div>
            @endforeach
        </div>

        <!-- Contrôles précédent et suivant -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Précédent</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Suivant</span>
        </button>
    </div>


    <div class="row" style="position: relative; top:-60px">
        <div class="col-lg-12">
            <!-- Banniere -->
            <div class="container-fluid">

                <!-- Featured Start -->
                <div class="container-fluid pt-4">
                    <div class="row px-xl-5 ">

                        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                                <h1 class="fas fa-list m-0 mr-2" style="color: #318093"></h1>
                                <h5 class="font-weight-semi-bold m-0">Listing d'Annonces</h5>
                            </div>

                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                                <h1 class="fas fa-map m-0 mr-3" style="color: #318093"></h1>
                                <h5 class="font-weight-semi-bold m-0">Cartes Interactives</h5>
                            </div>

                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                                <h1 class="fas fa-camera m-0 mr-3" style="color: #318093"></h1>
                                <h5 class="font-weight-semi-bold m-0">Visite Virtuelle</h5>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                                <h1 class="fas fa-comments m-0 mr-3" style="color: #318093"></h1>
                                <h5 class="font-weight-semi-bold m-0">Messagerie Intégrée</h5>
                            </div>
                        </div>
                    </div>
                </div>

               
            </div>

            <div class="section properties">
                <div class="container">
                    <div class="row properties-box">
                        @foreach ($annonces as $annonce)
                            <div class="col-lg-4 col-md-6 align-self-center mb-30 properties-items">
                                <div class="item">
                                    <a href="property-details.html">
                                        <img src="{{ asset('storage/' . $annonce->image) }}" alt="Image Annonce"
                                            style="max-width: 400px;">
                                    </a>
                                    <span class="category"
                                    style="
                                    background-color: {{ $annonce->typeTransaction === 'A louer' ? 'green' : ($annonce->typeTransaction === 'A vendre' ? '#17a2b8' : 'transparent') }};
                                    color: white;
                                    padding: 5px 10px;
                                    border-radius: 5px;
                                    font-size: 14px;
                                    display: inline-block;">
                                    {{ $annonce->typeTransaction }}
                                </span>                                     <h6>{{ number_format($annonce->montant, 0, ',', ' ') }} XOF</h6>
                                    <h4>
                                        <a href="property-details.html">{{ $annonce->titre }}</a>
                                    </h4>
                                    <ul>
                                        <li>nbr Chambres : <span>{{ $annonce->nbChambres }}</span></li>
                                        <li>Salles de bain : <span>{{ $annonce->nbSalleDeDouche }}</span></li>
                                        <li>Superficie : <span>{{ $annonce->superficie }} m²</span></li>
                                        <li>Parking : <span>{{ $annonce->garage ? '1' : '0' }}</span></li>
                                        <li>nbr Salle de douche : <span>{{ $annonce->nbChambres }}</span></li>
                                        <li>titre foncier : <span>{{ $annonce->garage ? 'Oui' : 'Non' }}</span></li>
                                        <li>Chambres : <span>{{ $annonce->nbChambres }}</span></li>
                                        <li>Garage : <span>{{ $annonce->garage ? 'Oui' : 'Non' }}</span></li>
                                        <li>Piscine : <span>{{ $annonce->piscine ? 'Oui' : 'Non' }}</span></li>
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
