@extends('Layout.lending_layout')

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
            style="background-image: url('{{ asset('Frontend/Lending/assets/img/breadcrumbs-bg.jpg') }}');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                <h2>Faitent vos recherches</h2>
                <ol>
                    <li><a href="index.html">Offre</a></li>
                    <li>Recherche</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->

        <div class="container my-5" >
            <div class="search-section p-4" style="margin-bottom: 350px">
                <h3 class="text-center mb-4" style="color: #318093;">Recherchez Votre Propriété Idéale</h3>
                <form action="{{ route('annonces.recherche') }}" method="GET">
                    <div class="row gy-4">
                        <!-- Type de Propriété -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="typePropriete">Type de Propriété</label>
                                <select class="form-control" id="typePropriete" name="query[typePropriete]">
                                    <option value="">Sélectionnez...</option>
                                    <option value="Appartement" {{ request('query.typePropriete') == 'Appartement' ? 'selected' : '' }}>Appartement</option>
                                    <option value="Maison" {{ request('query.typePropriete') == 'Maison' ? 'selected' : '' }}>Maison</option>
                                    <option value="Terrain" {{ request('query.typePropriete') == 'Terrain' ? 'selected' : '' }}>Terrain</option>
                                    <option value="Villa" {{ request('query.typePropriete') == 'Villa' ? 'selected' : '' }}>Villa</option>
                                </select>
                            </div>
                        </div>

                        <!-- Montant -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="montant">Montant Maximum (XOF)</label>
                                <input type="number" step="0.01" class="form-control" id="montant" name="query[montant]" value="{{ request('query.montant') }}">
                            </div>
                        </div>

                        <!-- Superficie -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="superficie">Superficie Minimale (m²)</label>
                                <input type="number" step="0.1" class="form-control" id="superficie" name="query[superficie]" value="{{ request('query.superficie') }}">
                            </div>
                        </div>

                        <!-- Nombre de Chambres -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nbChambres">Nombre de Chambres</label>
                                <input type="number" class="form-control" id="nbChambres" name="query[nbChambres]" value="{{ request('query.nbChambres') }}">
                            </div>
                        </div>

                        <!-- Nombre de Salles de Douche -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nbSalleDeDouche">Nombre de Salles de Douche</label>
                                <input type="number" class="form-control" id="nbSalleDeDouche" name="query[nbSalleDeDouche]" value="{{ request('query.nbSalleDeDouche') }}">
                            </div>
                        </div>

                        <!-- Localité -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="localite">Localité</label>
                                <input type="text" class="form-control" id="localite" name="query[localite]" value="{{ request('query.localite') }}">
                            </div>
                        </div>

                        <!-- Options avec Checkboxes -->
                        <div class="col-md-12">
                            <div class="row">
                                @php
                                    $checkboxFields = [
                                        'piscine' => 'Piscine',
                                        'garage' => 'Garage',
                                        'titreFoncier' => 'Titre Foncier',
                                        'veranda' => 'Véranda',
                                        'terrasse' => 'Terrasse',
                                        'cuisine' => 'Cuisine',
                                        'dependance' => 'Dépendance',
                                    ];
                                @endphp

                                @foreach ($checkboxFields as $key => $label)
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="{{ $key }}" name="query[{{ $key }}]" value="1" {{ request('query.' . $key) == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="{{ $key }}">{{ $label }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Bouton Rechercher -->
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-lg search-btn">Rechercher</button>
                    </div>
                </form>
            </div>
        </div>

        <style>
            /* Styling global */
            body {
                font-family: Arial, sans-serif;
                color: #333;
            }

            .search-section {
                background-color: #f8f9fa;
                border-radius: 6px;
                padding: 20px;

            }

            .search-section h3 {
                font-size: 24px;
                font-weight: bold;
            }

            label {
                font-weight: 600;
                color: #555;
            }

            .form-control {
                border-radius: 4px;
                border: 1px solid #f8f9fa;
                box-shadow: none;
            }

            .form-check-label {
                font-weight: 500;
            }

            /* Bouton de recherche */
            .search-btn {
                background-color: #318093;
                color: white;
                padding: 12px 30px;
                font-size: 16px;
                font-weight: bold;
                border: none;
                border-radius: 6px;
                transition: background-color 0.3s;
            }

            .search-btn:hover {
                background-color: #19cdd3;
                color: white;
            }

            /* Adaptation mobile */
            @media (max-width: 768px) {
                .search-section h3 {
                    font-size: 20px;
                }

                .form-control {
                    font-size: 14px;

                }
            }
        </style>

        </div>
    @endsection
