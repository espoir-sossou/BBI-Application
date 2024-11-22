@extends('Layout.agence_layout')

@section('content')
<div class="container">
    <h1 class="my-4">Modifier l'offre en Vedette</h1>

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

    <!-- Formulaire de modification de l'OffreEnVedette -->
    <form action="{{ route('offreEnVedette.update', $OffreEnVedette->offre_en_vedettes_id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" class="form-control" id="titre" name="titre" value="{{ old('titre', $OffreEnVedette->titre) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $OffreEnVedette->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="montant">Montant</label>
            <input type="number" class="form-control" id="montant" name="montant" value="{{ old('montant', $OffreEnVedette->montant) }}" required min="0">
        </div>

        <div class="form-group">
            <label for="typePropriete">Type de Propriété</label>
            <select class="form-control" id="typePropriete" name="typePropriete" required>
                <option value="Appartement" {{ $OffreEnVedette->typePropriete == 'Appartement' ? 'selected' : '' }}>Appartement</option>
                <option value="Maison" {{ $OffreEnVedette->typePropriete == 'Maison' ? 'selected' : '' }}>Maison</option>
                <option value="Terrain" {{ $OffreEnVedette->typePropriete == 'Terrain' ? 'selected' : '' }}>Terrain</option>
                <option value="Autre" {{ $OffreEnVedette->typePropriete == 'Autre' ? 'selected' : '' }}>Autre</option>
            </select>
        </div>

        <div class="form-group">
            <label for="superficie">Superficie (m²)</label>
            <input type="number" class="form-control" id="superficie" name="superficie" value="{{ old('superficie', $OffreEnVedette->superficie) }}" min="0">
        </div>

        <div class="form-group">
            <label for="nbChambres">Nombre de Chambres</label>
            <input type="number" class="form-control" id="nbChambres" name="nbChambres" value="{{ old('nbChambres', $OffreEnVedette->nbChambres) }}" min="0">
        </div>

        <div class="form-group">
            <label for="nbSalleDeDouche">Nombre de Salles de Douche</label>
            <input type="number" class="form-control" id="nbSalleDeDouche" name="nbSalleDeDouche" value="{{ old('nbSalleDeDouche', $OffreEnVedette->nbSalleDeDouche) }}" min="0">
        </div>

        <div class="form-group">
            <label for="localite">Localité</label>
            <input type="text" class="form-control" id="localite" name="localite" value="{{ old('localite', $OffreEnVedette->localite) }}" required>
        </div>

        <div class="form-group">
            <label for="localisation">Localisation (Adresse)</label>
            <input type="text" class="form-control" id="localisation" name="localisation" value="{{ old('localisation', $OffreEnVedette->localisation) }}">
        </div>

        <div class="form-group">
            <label for="details">Détails supplémentaires</label>
            <textarea class="form-control" id="details" name="details" rows="4">{{ old('details', $OffreEnVedette->details) }}</textarea>
        </div>

        <div class="form-group">
            <label for="typeTransaction">Type de Transaction</label>
            <select class="form-control" id="typeTransaction" name="typeTransaction" required>
                <option value="A vendre" {{ $OffreEnVedette->typeTransaction == 'A vendre' ? 'selected' : '' }}>A vendre</option>
                <option value="A louer" {{ $OffreEnVedette->typeTransaction == 'A louer' ? 'selected' : '' }}>A louer</option>
            </select>
        </div>

        <div class="form-group">
            <label for="visite360">Visite 360° (URL)</label>
            <input type="url" class="form-control" id="visite360" name="visite360" value="{{ old('visite360', $OffreEnVedette->visite360) }}">
        </div>

        <div class="form-group">
            <label for="video">Vidéo (URL)</label>
            <input type="url" class="form-control" id="video" name="video" value="{{ old('video', $OffreEnVedette->video) }}">
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <!-- Vérifier si une image existe déjà et afficher la prévisualisation -->
            <div>
                @if($OffreEnVedette->image)
                    <!-- Si l'OffreEnVedette a déjà une image, la prévisualiser -->
                    <img id="imagePreview" src="{{ asset('storage/' . $OffreEnVedette->image) }}" alt="Preview" class="mt-2" style="max-width: 100px;">
                @else
                    <img id="imagePreview" src="#" alt="Preview" class="mt-2" style="max-width: 100px; display: none;">
                @endif
            </div>

            <!-- Champ d'upload d'image -->
            <input type="file" class="form-control-file" id="image" name="image" accept="image/jpeg, image/png, image/gif" onchange="previewImage(event)">

            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <script>
            // Fonction pour prévisualiser l'image téléchargée
            function previewImage(event) {
                const preview = document.getElementById('imagePreview');
                preview.src = URL.createObjectURL(event.target.files[0]);
                preview.style.display = 'block';
            }
        </script>


        <button type="submit" class="btn btn-primary mt-3">Mettre à jour l'offre en Vedette</button>
        <a href="{{ route('offreEnVedette.liste') }}" class="btn btn-secondary mt-3">Annuler</a>
    </form>
</div>
@endsection
