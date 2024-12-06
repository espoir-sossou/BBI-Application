<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="my-4">Modifier l'offre en Vedette</h1>

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

    <!-- Formulaire de modification de l'OffreEnVedette -->
    <form action="<?php echo e(route('offreEnVedette.update', $OffreEnVedette->offre_en_vedettes_id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" class="form-control" id="titre" name="titre" value="<?php echo e(old('titre', $OffreEnVedette->titre)); ?>" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"><?php echo e(old('description', $OffreEnVedette->description)); ?></textarea>
        </div>

        <div class="form-group">
            <label for="montant">Montant</label>
            <input type="number" class="form-control" id="montant" name="montant" value="<?php echo e(old('montant', $OffreEnVedette->montant)); ?>" required min="0">
        </div>

        <div class="form-group">
            <label for="typePropriete">Type de Propriété</label>
            <select class="form-control" id="typePropriete" name="typePropriete" required>
                <option value="Appartement" <?php echo e($OffreEnVedette->typePropriete == 'Appartement' ? 'selected' : ''); ?>>Appartement</option>
                <option value="Maison" <?php echo e($OffreEnVedette->typePropriete == 'Maison' ? 'selected' : ''); ?>>Maison</option>
                <option value="Terrain" <?php echo e($OffreEnVedette->typePropriete == 'Terrain' ? 'selected' : ''); ?>>Terrain</option>
                <option value="Autre" <?php echo e($OffreEnVedette->typePropriete == 'Autre' ? 'selected' : ''); ?>>Autre</option>
            </select>
        </div>

        <div class="form-group">
            <label for="superficie">Superficie (m²)</label>
            <input type="number" class="form-control" id="superficie" name="superficie" value="<?php echo e(old('superficie', $OffreEnVedette->superficie)); ?>" min="0">
        </div>

        <div class="form-group">
            <label for="nbChambres">Nombre de Chambres</label>
            <input type="number" class="form-control" id="nbChambres" name="nbChambres" value="<?php echo e(old('nbChambres', $OffreEnVedette->nbChambres)); ?>" min="0">
        </div>

        <div class="form-group">
            <label for="nbSalleDeDouche">Nombre de Salles de Douche</label>
            <input type="number" class="form-control" id="nbSalleDeDouche" name="nbSalleDeDouche" value="<?php echo e(old('nbSalleDeDouche', $OffreEnVedette->nbSalleDeDouche)); ?>" min="0">
        </div>

        <div class="form-group">
            <label for="localite">Localité</label>
            <input type="text" class="form-control" id="localite" name="localite" value="<?php echo e(old('localite', $OffreEnVedette->localite)); ?>" required>
        </div>

        <div class="form-group">
            <label for="localisation">Localisation (Adresse)</label>
            <input type="text" class="form-control" id="localisation" name="localisation" value="<?php echo e(old('localisation', $OffreEnVedette->localisation)); ?>">
        </div>

        <div class="form-group">
            <label for="details">Détails supplémentaires</label>
            <textarea class="form-control" id="details" name="details" rows="4"><?php echo e(old('details', $OffreEnVedette->details)); ?></textarea>
        </div>

        <div class="form-group">
            <label for="typeTransaction">Type de Transaction</label>
            <select class="form-control" id="typeTransaction" name="typeTransaction" required>
                <option value="A vendre" <?php echo e($OffreEnVedette->typeTransaction == 'A vendre' ? 'selected' : ''); ?>>A vendre</option>
                <option value="A louer" <?php echo e($OffreEnVedette->typeTransaction == 'A louer' ? 'selected' : ''); ?>>A louer</option>
            </select>
        </div>

        <div class="form-group">
            <label for="visite360">Visite 360° (URL)</label>
            <input type="url" class="form-control" id="visite360" name="visite360" value="<?php echo e(old('visite360', $OffreEnVedette->visite360)); ?>">
        </div>

        <div class="form-group">
            <label for="video">Vidéo (URL)</label>
            <input type="url" class="form-control" id="video" name="video" value="<?php echo e(old('video', $OffreEnVedette->video)); ?>">
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <!-- Vérifier si une image existe déjà et afficher la prévisualisation -->
            <div>
                <?php if($OffreEnVedette->image): ?>
                    <!-- Si l'OffreEnVedette a déjà une image, la prévisualiser -->
                    <img id="imagePreview" src="<?php echo e(asset('storage/' . $OffreEnVedette->image)); ?>" alt="Preview" class="mt-2" style="max-width: 100px;">
                <?php else: ?>
                    <img id="imagePreview" src="#" alt="Preview" class="mt-2" style="max-width: 100px; display: none;">
                <?php endif; ?>
            </div>

            <!-- Champ d'upload d'image -->
            <input type="file" class="form-control-file" id="image" name="image" accept="image/jpeg, image/png, image/gif" onchange="previewImage(event)">

            <?php $__errorArgs = ['image'];
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
            // Fonction pour prévisualiser l'image téléchargée
            function previewImage(event) {
                const preview = document.getElementById('imagePreview');
                preview.src = URL.createObjectURL(event.target.files[0]);
                preview.style.display = 'block';
            }
        </script>


        <button type="submit" class="btn btn-primary mt-3">Mettre à jour l'offre en Vedette</button>
        <a href="<?php echo e(route('offreEnVedette.liste')); ?>" class="btn btn-secondary mt-3">Annuler</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layout.agence_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/espokeys/BBI/client/web/BBIAPP/BBI/resources/views/Layout/Backend/Agence_dashboard/Offre_en_vedette/annonce-edit-page.blade.php ENDPATH**/ ?>