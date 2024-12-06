<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2>Créer une nouvelle annonce</h2>

        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('annonce.add')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <!-- Title -->
            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" class="form-control" id="titre" name="titre" value="<?php echo e(old('titre')); ?>" required>
            </div>

            <!-- Description -->
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" required><?php echo e(old('description')); ?></textarea>
            </div>

            <!-- Property Type -->
            <div class="form-group">
                <label for="typePropriete">Type de Propriété</label>
                <input type="text" class="form-control" id="typePropriete" name="typePropriete"
                    value="<?php echo e(old('typePropriete')); ?>" required>
            </div>

            <!-- Montant -->
            <div class="form-group">
                <label for="montant">Montant</label>
                <input type="number" step="0.01" class="form-control" id="montant" name="montant"
                    value="<?php echo e(old('montant')); ?>" required>
            </div>

            <!-- Superficie -->
            <div class="form-group">
                <label for="superficie">Superficie</label>
                <input type="number" step="0.1" class="form-control" id="superficie" name="superficie"
                    value="<?php echo e(old('superficie')); ?>" required>
            </div>

            <!-- Number of Rooms -->
            <div class="form-group">
                <label for="nbChambres">Nombre de Chambres</label>
                <input type="number" class="form-control" id="nbChambres" name="nbChambres" value="<?php echo e(old('nbChambres')); ?>"
                    required>
            </div>

            <!-- Number of Bathrooms -->
            <div class="form-group">
                <label for="nbSalleDeDouche">Nombre de Salles de Douche</label>
                <input type="number" class="form-control" id="nbSalleDeDouche" name="nbSalleDeDouche"
                    value="<?php echo e(old('nbSalleDeDouche')); ?>" required>
            </div>

            <!-- Veranda -->
            <div class="form-group">
                <label for="veranda">Veranda</label>
                <input type="checkbox" id="veranda" name="veranda" value="1" <?php echo e(old('veranda') ? 'checked' : ''); ?>>
            </div>

            <!-- Terrace -->
            <div class="form-group">
                <label for="terrasse">Terrasse</label>
                <input type="checkbox" id="terrasse" name="terrasse" value="1"
                    <?php echo e(old('terrasse') ? 'checked' : ''); ?>>
            </div>

            <!-- Cuisine -->
            <div class="form-group">
                <label for="cuisine">Cuisine</label>
                <input type="checkbox" id="cuisine" name="cuisine" value="1" <?php echo e(old('cuisine') ? 'checked' : ''); ?>>
            </div>

            <!-- Dependence -->
            <div class="form-group">
                <label for="dependance">Dépendance</label>
                <input type="checkbox" id="dependance" name="dependance" value="1"
                    <?php echo e(old('dependance') ? 'checked' : ''); ?>>
            </div>

            <!-- Piscine -->
            <div class="form-group">
                <label for="piscine">Piscine</label>
                <input type="checkbox" id="piscine" name="piscine" value="1" <?php echo e(old('piscine') ? 'checked' : ''); ?>>
            </div>

            <!-- Garage -->
            <div class="form-group">
                <label for="garage">Garage</label>
                <input type="checkbox" id="garage" name="garage" value="1" <?php echo e(old('garage') ? 'checked' : ''); ?>>
            </div>

            <!-- Title of the Land -->
            <div class="form-group">
                <label for="titreFoncier">Titre Foncier</label>
                <input type="checkbox" id="titreFoncier" name="titreFoncier" value="1"
                    <?php echo e(old('titreFoncier') ? 'checked' : ''); ?>>
            </div>

            <!-- Location -->
            <div class="form-group">
                <label for="localite">Localité</label>
                <input type="text" class="form-control" id="localite" name="localite" value="<?php echo e(old('localite')); ?>"
                    required>
            </div>

            <!-- Detailed Location -->
            <div class="form-group">
                <label for="localisation">Localisation (Adresse)</label>
                <input type="text" class="form-control" id="localisation" name="localisation"
                    value="<?php echo e(old('localisation')); ?>" required>
            </div>

            <!-- Image -->
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" id="image" name="image" required>
            </div>

            <!-- Submit -->
            <button type="submit" class="btn btn-primary">Créer l'Annonce</button>
        </form>


    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layout.agence_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/espokeys/BBI/client/web/BBIAPP/BBI/resources/views/Layout/Backend/Agence_dashboard/annonce.blade.php ENDPATH**/ ?>