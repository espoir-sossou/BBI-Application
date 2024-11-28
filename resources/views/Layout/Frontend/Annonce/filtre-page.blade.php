@extends('Layout.home')

@section('content')
<div class="container my-5 mb-5">
    <div class="card shadow-lg p-4" style="border-radius: 12px; margin-bottom:150px">
        <h3 class="text-center mb-4 text-primary">Filtrer les Propriétés</h3>
        <form action="{{ route('annonces.recherche') }}" method="GET">
            <div class="row">
                <!-- Titre -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="titre" class="font-weight-bold">Titre</label>
                        <input
                            type="text"
                            class="form-control"
                            id="titre"
                            name="query[titre]"
                            value="{{ request('query.titre') }}">
                    </div>
                </div>

                <!-- Type de Propriété -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="typePropriete" class="font-weight-bold">Type de Propriété</label>
                        <select class="form-control" id="typePropriete" name="query[typePropriete]">
                            <option value="">Sélectionnez...</option>
                            <option value="Appartement" {{ request('query.typePropriete') == 'Appartement' ? 'selected' : '' }}>Appartement</option>
                            <option value="Maison" {{ request('query.typePropriete') == 'Maison' ? 'selected' : '' }}>Maison</option>
                            <option value="Terrain" {{ request('query.typePropriete') == 'Terrain' ? 'selected' : '' }}>Terrain</option>
                            <option value="Autre" {{ request('query.typePropriete') == 'Autre' ? 'selected' : '' }}>Autre</option>
                        </select>
                    </div>
                </div>

                <!-- Montant -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="montant" class="font-weight-bold">Montant</label>
                        <input
                            type="number"
                            step="0.01"
                            class="form-control"
                            id="montant"
                            name="query[montant]"
                            value="{{ request('query.montant') }}">
                    </div>
                </div>

                <!-- Superficie -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="superficie" class="font-weight-bold">Superficie</label>
                        <input
                            type="number"
                            step="0.1"
                            class="form-control"
                            id="superficie"
                            name="query[superficie]"
                            value="{{ request('query.superficie') }}">
                    </div>
                </div>

                <!-- Nombre de Chambres -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nbChambres" class="font-weight-bold">Nombre de Chambres</label>
                        <input
                            type="number"
                            class="form-control"
                            id="nbChambres"
                            name="query[nbChambres]"
                            value="{{ request('query.nbChambres') }}">
                    </div>
                </div>

                <!-- Nombre de Salles de Douche -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nbSalleDeDouche" class="font-weight-bold">Nombre de Salles de Douche</label>
                        <input
                            type="number"
                            class="form-control"
                            id="nbSalleDeDouche"
                            name="query[nbSalleDeDouche]"
                            value="{{ request('query.nbSalleDeDouche') }}">
                    </div>
                </div>
                 <!-- Localité -->
                 <div class="col-md-4">
                    <div class="form-group">
                        <label for="localite" class="font-weight-bold">Localité</label>
                        <input
                            type="text"
                            class="form-control"
                            id="localite"
                            name="query[localite]"
                            value="{{ request('query.localite') }}">
                    </div>
                </div>

                <!-- Piscine -->
                <div class="col-md-3">
                    <div class="form-check">
                        <input
                            type="checkbox"
                            class="form-check-input"
                            id="piscine"
                            name="query[piscine]"
                            value="1"
                            {{ request('query.piscine') == '1' ? 'checked' : '' }}>
                        <label class="form-check-label font-weight-bold" for="piscine">Piscine</label>
                    </div>
                </div>

                <!-- Garage -->
                <div class="col-md-3">
                    <div class="form-check">
                        <input
                            type="checkbox"
                            class="form-check-input"
                            id="garage"
                            name="query[garage]"
                            value="1"
                            {{ request('query.garage') == '1' ? 'checked' : '' }}>
                        <label class="form-check-label font-weight-bold" for="garage">Garage</label>
                    </div>
                </div>

                 <!-- Titre Foncier  -->
                 <div class="col-md-3">
                    <div class="form-check">
                        <input
                            type="checkbox"
                            class="form-check-input"
                            id="titreFoncier"
                            name="query[titreFoncier]"
                            value="1"
                            {{ request('query.titreFoncier') == '1' ? 'checked' : '' }}>
                        <label class="form-check-label font-weight-bold" for="titreFoncier">Titre Foncier</label>
                    </div>
                </div>

                <!-- Options avec Checkboxes -->
                @php
                    $checkboxFields = [
                        'veranda' => 'Véranda',
                        'terrasse' => 'Terrasse',
                        'cuisine' => 'Cuisine',
                        'dependance' => 'Dépendance',
                    ];
                @endphp

                @foreach ($checkboxFields as $key => $label)
                    <div class="col-md-3">
                        <div class="form-check">
                            <input
                                type="checkbox"
                                class="form-check-input"
                                id="{{ $key }}"
                                name="query[{{ $key }}]"
                                value="1"
                                {{ request('query.' . $key) == '1' ? 'checked' : '' }}>
                            <label class="form-check-label font-weight-bold" for="{{ $key }}">{{ $label }}</label>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Bouton Rechercher -->
            <div class="text-center mt-4 mb-5">
                <button type="submit" class="btn btn-lg btn-dark"
                    style="width: 40%; padding: 15px; font-size: 18px; border-radius: 12px; background-color: #318093; color: white;">
                    Rechercher
                </button>
            </div>
        </form>

    </div>


</div>
@endsection
