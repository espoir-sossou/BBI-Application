@extends('Layout.home')

@section('content')
    <div class="row " style="position: relative;">
        <div class="col-lg-12">

            <div class="section properties annonce ">
                <div class="container">
                    <div class="row properties-box">
                        @foreach ($annonces as $annonce)
                            <div class="col-lg-4 col-md-6 align-self-center mb-30 properties-items">
                                <div class="item">
                                      @php
                                    $imagePath = $annonce->image ? Storage::url($annonce->image) : asset('Frontend/Home/assets/imgs/default.jpg');
                                @endphp
                                <a href="{{ route('annonce.details', $annonce->annonce_id) }}">
                                    <img src="{{ $imagePath }}" alt="Image Annonce" style="max-width: 400px;">
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
                                    </span>
                                    <h6>{{ number_format($annonce->montant, 0, ',', ' ') }} XOF</h6>
                                    <h4>
                                        <a
                                            href="{{ route('annonce.details', $annonce->annonce_id) }}">{{ $annonce->titre }}</a>
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
