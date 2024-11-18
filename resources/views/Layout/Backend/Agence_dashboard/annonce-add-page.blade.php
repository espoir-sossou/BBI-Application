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
                        <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="typePropriete">Type de Propriété</label>
                        <select class="form-control" id="typePropriete" name="typePropriete" required>
                            <option value="Appartement">Appartement</option>
                            <option value="Maison">Maison</option>
                            <option value="Terrain">Terrain</option>
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
                            value="{{ old('superficie') }}" required>
                    </div>

                    <!-- Number of Rooms -->
                    <div class="form-group">
                        <label for="nbChambres">Nombre de Chambres</label>
                        <input type="number" class="form-control" id="nbChambres" name="nbChambres"
                            value="{{ old('nbChambres') }}" required>
                    </div>

                    <!-- Number of Bathrooms -->
                    <div class="form-group">
                        <label for="nbSalleDeDouche">Nombre de Salles de Douche</label>
                        <input type="number" class="form-control" id="nbSalleDeDouche" name="nbSalleDeDouche"
                            value="{{ old('nbSalleDeDouche') }}" required>
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
                            value="{{ old('localite') }}" required>
                    </div>

                    <!-- Title Deed -->
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="titreFoncier" name="titreFoncier"
                            value="1" {{ old('titreFoncier') ? 'checked' : '' }}>
                        <label class="form-check-label" for="titreFoncier">Titre Foncier</label>
                    </div>

                    <!-- Location Coordinates -->
                    <div class="form-group">
                        <label for="localisation">Localisation (Latitude, Longitude)</label>
                        <input type="text" class="form-control" id="localisation" name="localisation"
                            value="{{ old('localisation') }}" required>
                    </div>

                    <!-- Details -->
                    <div class="form-group">
                        <label for="details">Détails</label>
                        <textarea class="form-control" id="details" name="details" rows="3">{{ old('details') }}</textarea>
                    </div>

                    <!-- Type de Transaction -->
                    <div class="form-group">
                        <label for="typeTransaction">Type de Transaction</label>
                        <select class="form-control" id="typeTransaction" name="typeTransaction" required>
                            <option value="vente" {{ old('typeTransaction') == 'vente' ? 'selected' : '' }}>Vente
                            </option>
                            <option value="autres" {{ old('typeTransaction') == 'autres' ? 'selected' : '' }}>Autres
                            </option>
                        </select>
                    </div>

                    <!-- 360° View URL -->
                    <div class="form-group">
                        <label for="visite360">Visite 360° (URL)</label>
                        <input type="url" class="form-control" id="visite360" name="visite360"
                            value="{{ old('visite360') }}">
                    </div>

                    <!-- Video URL -->
                    <div class="form-group">
                        <label for="video">Vidéo (URL)</label>
                        <input type="url" class="form-control" id="video" name="video"
                            value="{{ old('video') }}">
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control-file" id="image" name="image"
                            accept="image/jpeg, image/png, image/gif" onchange="previewImage(event)" required>
                        <img id="imagePreview" src="#" alt="Preview" class="mt-2"
                            style="max-width: 100px; display: none;">
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <script>
                        function previewImage(event) {
                            const preview = document.getElementById('imagePreview');
                            preview.src = URL.createObjectURL(event.target.files[0]);
                            preview.style.display = 'block';
                        }
                    </script>


                    <button type="submit" class="btn btn-success mt-3">Créer l'annonce</button>
                </form>
            </div>
        </div>
    </div>
@endsection
