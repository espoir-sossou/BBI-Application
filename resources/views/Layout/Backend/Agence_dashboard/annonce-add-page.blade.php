@extends('Layout.agence_layout')

@section('content')
    <div class="container mt-4">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h2 class="mb-0">Créer une nouvelle annonce</h2>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('annonce.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Title -->
                    <div class="form-group">
                        <label for="titre">Titre</label>
                        <input type="text" class="form-control" id="titre" name="titre" value="{{ old('titre') }}"
                            required>
                    </div>

                    <!-- Description -->
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="typePropriete">Type de Propriété</label>
                        <select class="form-control" id="typePropriete" name="typePropriete" required>
                            <option value="Appartement">Appartement</option>
                            <option value="Maison">Maison</option>
                            <option value="Terrain">Terrain</option>
                            <option value="Villa">Villa</option>
                            <!-- Ajouter d'autres types de propriétés si nécessaire -->
                        </select>
                    </div>


                    <!-- Price -->
                    <div class="form-group">
                        <label for="montant">Montant</label>
                        <input type="number" step="0.01" class="form-control" id="montant" name="montant"
                            value="{{ old('montant') }}" required>
                    </div>

                    <!-- Area -->
                    <div class="form-group">
                        <label for="superficie">Superficie</label>
                        <input type="number" step="0.1" class="form-control" id="superficie" name="superficie"
                            value="{{ old('superficie') }}">
                    </div>

                    <!-- Number of Rooms -->
                    <div class="form-group">
                        <label for="nbChambres">Nombre de Chambres</label>
                        <input type="number" class="form-control" id="nbChambres" name="nbChambres"
                            value="{{ old('nbChambres') }}">
                    </div>

                    <!-- Number of Bathrooms -->
                    <div class="form-group">
                        <label for="nbSalleDeDouche">Nombre de Salles de Douche</label>
                        <input type="number" class="form-control" id="nbSalleDeDouche" name="nbSalleDeDouche"
                            value="{{ old('nbSalleDeDouche') }}">
                    </div>

                    <!-- Checkboxes -->
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="veranda" name="veranda" value="1"
                                {{ old('veranda') ? 'checked' : '' }}>
                            <label class="form-check-label" for="veranda">Veranda</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="terrasse" name="terrasse" value="1"
                                {{ old('terrasse') ? 'checked' : '' }}>
                            <label class="form-check-label" for="terrasse">Terrasse</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="cuisine" name="cuisine" value="1"
                                {{ old('cuisine') ? 'checked' : '' }}>
                            <label class="form-check-label" for="cuisine">Cuisine</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="dependance" name="dependance" value="1"
                                {{ old('dependance') ? 'checked' : '' }}>
                            <label class="form-check-label" for="dependance">Dépendance</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="piscine" name="piscine" value="1"
                                {{ old('piscine') ? 'checked' : '' }}>
                            <label class="form-check-label" for="piscine">Piscine</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="garage" name="garage"
                                value="1" {{ old('garage') ? 'checked' : '' }}>
                            <label class="form-check-label" for="garage">Garage</label>
                        </div>
                    </div>

                    <!-- Location -->
                    <div class="form-group">
                        <label for="localite">Localité</label>
                        <input type="text" class="form-control" id="localite" name="localite"
                            value="{{ old('localite') }}">
                    </div>

                    <!-- Title Deed -->
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="titreFoncier" name="titreFoncier"
                            value="1" {{ old('titreFoncier') ? 'checked' : '' }}>
                        <label class="form-check-label" for="titreFoncier">Titre Foncier</label>
                    </div>

                    <div class="form-group">
                        <label for="localisation">Localisation (cliquez sur la carte)</label>
                        <div id="map" style="height: 400px;"></div>
                        <!-- Champs cachés pour latitude et longitude -->
                        <input type="hidden" id="latitude" name="latitude">
                        <input type="hidden" id="longitude" name="longitude">
                    </div>

                    <script>
                        function initMap() {
                            // Centre de la carte par défaut
                            const defaultCenter = { lat: 0, lng: 0 };

                            const map = new google.maps.Map(document.getElementById('map'), {
                                center: defaultCenter,
                                zoom: 2,
                            });

                            // Permettre à l'utilisateur de cliquer sur la carte
                            google.maps.event.addListener(map, 'click', function (event) {
                                const lat = event.latLng.lat();
                                const lng = event.latLng.lng();

                                // Ajouter un marqueur au point où l'utilisateur clique
                                new google.maps.Marker({
                                    position: { lat: lat, lng: lng },
                                    map: map,
                                    title: 'Localisation choisie',
                                });

                                // Mettre à jour les champs latitude et longitude
                                document.getElementById('latitude').value = lat;
                                document.getElementById('longitude').value = lng;
                            });
                        }
                    </script>
                   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBrntgALGzUGdJNxYhC5Nb_rOmSxhuRsZM&callback=initMap" async defer></script>



                    <!-- Details -->
                    <div class="form-group">
                        <label for="details">Détails</label>
                        <textarea class="form-control" id="details" name="details" rows="3">{{ old('details') }}</textarea>
                    </div>

                    <!-- Type de Transaction -->
                    <div class="form-group">
                        <label for="typeTransaction">Type de Transaction</label>
                        <select class="form-control" id="typeTransaction" name="typeTransaction" required>
                            <option value="A vendre" {{ old('typeTransaction') == 'A vendre' ? 'selected' : '' }}>A vendre
                            </option>
                            <option value="A louer" {{ old('typeTransaction') == 'A louer' ? 'selected' : '' }}>A louer
                            </option>
                        </select>
                    </div>

                    <!-- 360° View URL -->
                    <div class="form-group">
                        <label for="visite360">Visite 360° (URL)</label>
                        <input type="url" class="form-control" id="visite360" name="visite360"
                            value="{{ old('visite360') }}">
                    </div>

                    <!--
                                                <div class="form-group">
                                                    <label for="video">Vidéo (URL)</label>
                                                    <input type="url" class="form-control" id="video" name="video"
                                                        value="{{ old('video') }}" desabled>
                                                </div>
                                            -->
                                            <div class="form-group">
                                                <label for="images">Images</label>
                                                <div id="file-container"></div> <!-- Conteneur dynamique des champs file -->
                                                <button type="button" id="add-file-button" class="btn btn-primary mt-2">Ajouter des fichiers</button>
                                                <div id="imagesPreview" class="mt-3"></div> <!-- Prévisualisation des images -->

                                                @error('images')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <script>
                                                document.addEventListener('DOMContentLoaded', () => {
                                                    const fileContainer = document.getElementById('file-container');
                                                    const addFileButton = document.getElementById('add-file-button');
                                                    const imagesPreview = document.getElementById('imagesPreview');

                                                    addFileButton.addEventListener('click', () => {
                                                        // Créer un nouveau champ file
                                                        const fileInput = document.createElement('input');
                                                        fileInput.type = 'file';
                                                        fileInput.name = 'images[]';
                                                        fileInput.accept = 'image/*';
                                                        fileInput.classList.add('form-control-file', 'mt-2');
                                                        fileInput.addEventListener('change', previewImages); // Ajouter une prévisualisation

                                                        // Ajouter le champ au conteneur
                                                        fileContainer.appendChild(fileInput);
                                                    });

                                                    function previewImages(event) {
                                                        const files = event.target.files;

                                                        // Afficher chaque image sélectionnée
                                                        Array.from(files).forEach(file => {
                                                            const img = document.createElement('img');
                                                            img.src = URL.createObjectURL(file);
                                                            img.style.maxWidth = '100px';
                                                            img.style.margin = '5px';
                                                            imagesPreview.appendChild(img);
                                                        });
                                                    }
                                                });
                                            </script>








                    <button type="submit" class="btn btn-success mt-3">Créer l'annonce</button>
                </form>
            </div>
        </div>
    </div>
@endsection
