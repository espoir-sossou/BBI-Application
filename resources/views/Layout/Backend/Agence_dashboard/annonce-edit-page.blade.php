@extends('Layout.agence_layout')

@section('content')
    <div class="container">
        <h1 class="my-4">Modifier l'Annonce</h1>

        <!-- Affichage des erreurs de validation -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulaire de modification de l'annonce -->
        <form action="{{ route('annonce.update', $annonce->annonce_id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Titre -->
            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" class="form-control" id="titre" name="titre"
                    value="{{ old('titre', $annonce->titre) }}" required>
            </div>

            <!-- Description -->
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $annonce->description) }}</textarea>
            </div>

            <!-- Type de Propriété -->
            <div class="form-group">
                <label for="typePropriete">Type de Propriété</label>
                <select class="form-control" id="typePropriete" name="typePropriete" required>
                    <option value="Appartement" {{ $annonce->typePropriete == 'Appartement' ? 'selected' : '' }}>Appartement
                    </option>
                    <option value="Maison" {{ $annonce->typePropriete == 'Maison' ? 'selected' : '' }}>Maison</option>
                    <option value="Terrain" {{ $annonce->typePropriete == 'Terrain' ? 'selected' : '' }}>Terrain</option>
                    <option value="Autre" {{ $annonce->typePropriete == 'Autre' ? 'selected' : '' }}>Autre</option>
                </select>
            </div>

            <!-- Montant -->
            <div class="form-group">
                <label for="montant">Montant</label>
                <input type="number" step="0.01" class="form-control" id="montant" name="montant"
                    value="{{ old('montant', $annonce->montant) }}" required min="0">
            </div>

            <!-- Superficie -->
            <div class="form-group">
                <label for="superficie">Superficie (m²)</label>
                <input type="number" step="0.1" class="form-control" id="superficie" name="superficie"
                    value="{{ old('superficie', $annonce->superficie) }}" min="0">
            </div>

            <!-- Nombre de Chambres -->
            <div class="form-group">
                <label for="nbChambres">Nombre de Chambres</label>
                <input type="number" class="form-control" id="nbChambres" name="nbChambres"
                    value="{{ old('nbChambres', $annonce->nbChambres) }}" min="0">
            </div>

            <!-- Nombre de Salles de Douche -->
            <div class="form-group">
                <label for="nbSalleDeDouche">Nombre de Salles de Douche</label>
                <input type="number" class="form-control" id="nbSalleDeDouche" name="nbSalleDeDouche"
                    value="{{ old('nbSalleDeDouche', $annonce->nbSalleDeDouche) }}" min="0">
            </div>

            <!-- Options supplémentaires (Checkboxes) -->
            <div class="form-group">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="veranda" name="veranda" value="1"
                        {{ old('veranda', $annonce->veranda) ? 'checked' : '' }}>
                    <label class="form-check-label" for="veranda">Veranda</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="terrasse" name="terrasse" value="1"
                        {{ old('terrasse', $annonce->terrasse) ? 'checked' : '' }}>
                    <label class="form-check-label" for="terrasse">Terrasse</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="cuisine" name="cuisine" value="1"
                        {{ old('cuisine', $annonce->cuisine) ? 'checked' : '' }}>
                    <label class="form-check-label" for="cuisine">Cuisine</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="dependance" name="dependance" value="1"
                        {{ old('dependance', $annonce->dependance) ? 'checked' : '' }}>
                    <label class="form-check-label" for="dependance">Dépendance</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="piscine" name="piscine" value="1"
                        {{ old('piscine', $annonce->piscine) ? 'checked' : '' }}>
                    <label class="form-check-label" for="piscine">Piscine</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="garage" name="garage" value="1"
                        {{ old('garage', $annonce->garage) ? 'checked' : '' }}>
                    <label class="form-check-label" for="garage">Garage</label>
                </div>
            </div>

            <!-- Localité -->
            <div class="form-group">
                <label for="localite">Localité</label>
                <input type="text" class="form-control" id="localite" name="localite"
                    value="{{ old('localite', $annonce->localite) }}" required>
            </div>

            <!-- Titre Foncier -->
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="titreFoncier" name="titreFoncier" value="1"
                    {{ old('titreFoncier', $annonce->titreFoncier) ? 'checked' : '' }}>
                <label class="form-check-label" for="titreFoncier">Titre Foncier</label>
            </div>

            <!-- Localisation -->
            <div class="form-group">
                <label for="localisation">Localisation (Latitude, Longitude)</label>
                <input type="text" class="form-control" id="localisation" name="localisation"
                    value="{{ old('localisation', $annonce->localisation) }}">
            </div>

            <!-- Détails -->
            <div class="form-group">
                <label for="details">Détails supplémentaires</label>
                <textarea class="form-control" id="details" name="details" rows="4">{{ old('details', $annonce->details) }}</textarea>
            </div>

            <!-- Type de Transaction -->
            <div class="form-group">
                <label for="typeTransaction">Type de Transaction</label>
                <select class="form-control" id="typeTransaction" name="typeTransaction" required>
                    <option value="A vendre" {{ $annonce->typeTransaction == 'A vendre' ? 'selected' : '' }}>A vendre
                    </option>
                    <option value="A louer" {{ $annonce->typeTransaction == 'A louer' ? 'selected' : '' }}>A louer
                    </option>
                </select>
            </div>

            <!-- Image -->
            <div class="form-group">
                <label for="image">Image</label>
                <div>
                    @php
                        $imagePath = $annonce->image
                            ? Storage::url($annonce->image)
                            : asset('Frontend/Home/assets/imgs/default.jpg');
                    @endphp
                    <img id="imagePreview" src="{{ $imagePath }}" alt="Preview" class="mt-2"
                        style="max-width: 100px;">
                </div>
                <input type="file" class="form-control-file" id="image" name="image"
                    accept="image/jpeg, image/png, image/gif" onchange="previewImage(event)">
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

            <!-- Boutons -->
            <button type="submit" class="btn btn-primary mt-3">Mettre à jour l'annonce</button>
            <a href="{{ route('annonce.liste') }}" class="btn btn-secondary mt-3">Annuler</a>
        </form>

    </div>
@endsection
