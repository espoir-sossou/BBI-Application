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
                            <img src="<?php echo e(Storage::url($image->path)); ?>" alt="Image" style="max-width: 100px; margin: 5px;">
                            <label>
                                <input type="checkbox" name="remove_images[]" value="<?php echo e($image->id); ?>"> Supprimer
                            </label>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <div class="form-group">
                <label for="newImages">Ajouter de nouvelles images</label>
                <input id="newImages" type="file" class="form-control-file" name="new_images[]" accept="image/*" multiple onchange="previewNewImages(event)">
                <div id="newImagesPreview" class="mt-2"></div>
                <?php $__errorArgs = ['new_images.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <script>
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


            <!-- Boutons -->
            <button type="submit" class="btn btn-primary mt-3">Mettre à jour l'annonce</button>
            <a href="<?php echo e(route('annonce.liste')); ?>" class="btn btn-secondary mt-3">Annuler</a>
        </form>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layout.agence_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/espokeys/BBI/client/web/BBIAPP/BBI/resources/views/Layout/Backend/Agence_dashboard/annonce-edit-page.blade.php ENDPATH**/ ?>