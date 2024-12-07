<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1 class="my-4">Modifier l'Annonce</h1>

        <!-- Affichage des erreurs de validation -->
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Formulaire de modification de l'annonce -->
        <form action="<?php echo e(route('annonce.update', $annonce->annonce_id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <!-- Titre -->
            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" class="form-control" id="titre" name="titre"
                    value="<?php echo e(old('titre', $annonce->titre)); ?>" required>
            </div>

            <!-- Description -->
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"><?php echo e(old('description', $annonce->description)); ?></textarea>
            </div>

            <!-- Type de Propriété -->
            <div class="form-group">
                <label for="typePropriete">Type de Propriété</label>
                <select class="form-control" id="typePropriete" name="typePropriete" required>
                    <option value="Appartement" <?php echo e($annonce->typePropriete == 'Appartement' ? 'selected' : ''); ?>>Appartement
                    </option>
                    <option value="Maison" <?php echo e($annonce->typePropriete == 'Maison' ? 'selected' : ''); ?>>Maison</option>
                    <option value="Terrain" <?php echo e($annonce->typePropriete == 'Terrain' ? 'selected' : ''); ?>>Terrain</option>
                    <option value="Autre" <?php echo e($annonce->typePropriete == 'Autre' ? 'selected' : ''); ?>>Autre</option>
                </select>
            </div>

            <!-- Montant -->
            <div class="form-group">
                <label for="montant">Montant</label>
                <input type="number" step="0.01" class="form-control" id="montant" name="montant"
                    value="<?php echo e(old('montant', $annonce->montant)); ?>" required min="0">
            </div>

            <!-- Superficie -->
            <div class="form-group">
                <label for="superficie">Superficie (m²)</label>
                <input type="number" step="0.1" class="form-control" id="superficie" name="superficie"
                    value="<?php echo e(old('superficie', $annonce->superficie)); ?>" min="0">
            </div>

            <!-- Nombre de Chambres -->
            <div class="form-group">
                <label for="nbChambres">Nombre de Chambres</label>
                <input type="number" class="form-control" id="nbChambres" name="nbChambres"
                    value="<?php echo e(old('nbChambres', $annonce->nbChambres)); ?>" min="0">
            </div>

            <!-- Nombre de Salles de Douche -->
            <div class="form-group">
                <label for="nbSalleDeDouche">Nombre de Salles de Douche</label>
                <input type="number" class="form-control" id="nbSalleDeDouche" name="nbSalleDeDouche"
                    value="<?php echo e(old('nbSalleDeDouche', $annonce->nbSalleDeDouche)); ?>" min="0">
            </div>

            <!-- Options supplémentaires (Checkboxes) -->
            <div class="form-group">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="veranda" name="veranda" value="1"
                        <?php echo e(old('veranda', $annonce->veranda) ? 'checked' : ''); ?>>
                    <label class="form-check-label" for="veranda">Veranda</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="terrasse" name="terrasse" value="1"
                        <?php echo e(old('terrasse', $annonce->terrasse) ? 'checked' : ''); ?>>
                    <label class="form-check-label" for="terrasse">Terrasse</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="cuisine" name="cuisine" value="1"
                        <?php echo e(old('cuisine', $annonce->cuisine) ? 'checked' : ''); ?>>
                    <label class="form-check-label" for="cuisine">Cuisine</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="dependance" name="dependance" value="1"
                        <?php echo e(old('dependance', $annonce->dependance) ? 'checked' : ''); ?>>
                    <label class="form-check-label" for="dependance">Dépendance</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="piscine" name="piscine" value="1"
                        <?php echo e(old('piscine', $annonce->piscine) ? 'checked' : ''); ?>>
                    <label class="form-check-label" for="piscine">Piscine</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="garage" name="garage" value="1"
                        <?php echo e(old('garage', $annonce->garage) ? 'checked' : ''); ?>>
                    <label class="form-check-label" for="garage">Garage</label>
                </div>
            </div>

            <!-- Localité -->
            <div class="form-group">
                <label for="localite">Localité</label>
                <input type="text" class="form-control" id="localite" name="localite"
                    value="<?php echo e(old('localite', $annonce->localite)); ?>" required>
            </div>

            <!-- Titre Foncier -->
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="titreFoncier" name="titreFoncier" value="1"
                    <?php echo e(old('titreFoncier', $annonce->titreFoncier) ? 'checked' : ''); ?>>
                <label class="form-check-label" for="titreFoncier">Titre Foncier</label>
            </div>

            <!-- Localisation -->
            <div class="form-group">
                <label for="localisation">Localisation (Latitude, Longitude)</label>
                <input type="text" class="form-control" id="localisation" name="localisation"
                    value="<?php echo e(old('localisation', $annonce->localisation)); ?>">
            </div>

            <!-- Détails -->
            <div class="form-group">
                <label for="details">Détails supplémentaires</label>
                <textarea class="form-control" id="details" name="details" rows="4"><?php echo e(old('details', $annonce->details)); ?></textarea>
            </div>

            <!-- Type de Transaction -->
            <div class="form-group">
                <label for="typeTransaction">Type de Transaction</label>
                <select class="form-control" id="typeTransaction" name="typeTransaction" required>
                    <option value="A vendre" <?php echo e($annonce->typeTransaction == 'A vendre' ? 'selected' : ''); ?>>A vendre
                    </option>
                    <option value="A louer" <?php echo e($annonce->typeTransaction == 'A louer' ? 'selected' : ''); ?>>A louer
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="images">Images existantes</label>
                <div id="existingImagesPreview" class="mt-2">
                    <?php $__currentLoopData = $annonce->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="existing-image">
                            <img src="<?php echo e(Storage::url($image->path)); ?>" alt="Image"
                                style="max-width: 100px; margin: 5px;">
                            <label>
                                <input type="checkbox" name="remove_images[]" value="<?php echo e($image->id); ?>"> Supprimer
                            </label>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <!-- Localisation -->
            <div class="form-group">
                <label for="localisation">Localisation (cliquez sur la carte)</label>
                <div id="map" style="height: 400px;"></div>
                <input type="hidden" id="latitude" name="latitude" value="<?php echo e(old('latitude', $annonce->latitude)); ?>">
                <input type="hidden" id="longitude" name="longitude"
                    value="<?php echo e(old('longitude', $annonce->longitude)); ?>">
            </div>

            <!-- Images existantes -->
            <div class="form-group">
                <label>Images existantes</label>
                <div>
                    <?php $__currentLoopData = $annonce->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div style="display: inline-block; margin: 5px; text-align: center;">
                            <img src="<?php echo e(asset('storage/' . $image->path)); ?>" style="max-width: 100px;">
                            <br>
                            <input type="checkbox" name="remove_images[]" value="<?php echo e($image->id); ?>"> Supprimer
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <!-- Ajouter de nouvelles images -->
            <div class="form-group">
                <label for="newImages">Ajouter de nouvelles images</label>
                <input id="newImages" type="file" class="form-control-file" name="new_images[]" accept="image/*"
                    multiple onchange="previewNewImages(event)">
                <div id="newImagesPreview" class="mt-2"></div>
            </div>

            <!-- Bouton de soumission -->
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>

        <script>
            function initMap() {
                const defaultCenter = {
                    lat: parseFloat(document.getElementById('latitude').value) || 0,
                    lng: parseFloat(document.getElementById('longitude').value) || 0
                };

                const map = new google.maps.Map(document.getElementById('map'), {
                    center: defaultCenter,
                    zoom: 8,
                });

                // Ajouter un marqueur initial si des coordonnées existent
                const marker = new google.maps.Marker({
                    position: defaultCenter,
                    map: map,
                });

                google.maps.event.addListener(map, 'click', function(event) {
                    const lat = event.latLng.lat();
                    const lng = event.latLng.lng();

                    // Mettre à jour le marqueur
                    marker.setPosition({
                        lat,
                        lng
                    });

                    // Mettre à jour les champs cachés
                    document.getElementById('latitude').value = lat;
                    document.getElementById('longitude').value = lng;
                });
            }

            function previewNewImages(event) {
                const previewContainer = document.getElementById('newImagesPreview');
                const files = event.target.files;

                previewContainer.innerHTML = ''; // Réinitialiser l'aperçu

                Array.from(files).forEach(file => {
                    const img = document.createElement('img');
                    img.src = URL.createObjectURL(file);
                    img.style.maxWidth = '100px';
                    img.style.margin = '5px';
                    previewContainer.appendChild(img);
                });
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBrntgALGzUGdJNxYhC5Nb_rOmSxhuRsZM&callback=initMap" async
            defer></script>



    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layout.agence_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/espokeys/BBI/client/web/BBIAPP/BBI/resources/views/Layout/Backend/Agence_dashboard/annonce-edit-page.blade.php ENDPATH**/ ?>