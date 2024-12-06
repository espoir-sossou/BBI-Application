<?php $__env->startSection('content'); ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Liste des Annonces</h1>
        <p class="mb-4">Voici toutes les annonces disponibles dans la base de données.</p>

        <!-- DataTables Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Liste des Annonces</h6>
            </div>
            <div class="card-body">
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
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Titre</th>
                                    <th>Description</th>
                                    <th>Type de Propriété</th>
                                    <th>Montant</th>
                                    <th>Superficie</th>
                                    <th>Nb Chambres</th>
                                    <th>Nb Salles de Douche</th>
                                    <th>Véranda</th>
                                    <th>Terrasse</th>
                                    <th>Cuisine</th>
                                    <th>Dépendance</th>
                                    <th>Piscine</th>
                                    <th>Garage</th>
                                    <th>Titre Foncier</th>
                                    <th>Localité</th>
                                    <th>Localisation</th>
                                    <th>Détails</th>
                                    <th>Type de Transaction</th>
                                    <th>Visite 360°</th>
                                    <th>Vidéo</th>
                                    <th>Image</th>
                                    <th>Valider</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $OffreEnVedette; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $OffreEnVedette): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($OffreEnVedette->offre_en_vedettes_id); ?></td>
                                        <td><?php echo e($OffreEnVedette->titre); ?></td>
                                        <td><?php echo e($OffreEnVedette->description); ?></td>
                                        <td><?php echo e($OffreEnVedette->typePropriete); ?></td>
                                        <td><?php echo e($OffreEnVedette->montant); ?></td>
                                        <td><?php echo e($OffreEnVedette->superficie); ?></td>
                                        <td><?php echo e($OffreEnVedette->nbChambres); ?></td>
                                        <td><?php echo e($OffreEnVedette->nbSalleDeDouche); ?></td>
                                        <td><?php echo e($OffreEnVedette->veranda ? 'Oui' : 'Non'); ?></td>
                                        <td><?php echo e($OffreEnVedette->terrasse ? 'Oui' : 'Non'); ?></td>
                                        <td><?php echo e($OffreEnVedette->cuisine ? 'Oui' : 'Non'); ?></td>
                                        <td><?php echo e($OffreEnVedette->dependance ? 'Oui' : 'Non'); ?></td>
                                        <td><?php echo e($OffreEnVedette->piscine ? 'Oui' : 'Non'); ?></td>
                                        <td><?php echo e($OffreEnVedette->garage ? 'Oui' : 'Non'); ?></td>
                                        <td><?php echo e($OffreEnVedette->titreFoncier ? 'Oui' : 'Non'); ?></td>
                                        <td><?php echo e($OffreEnVedette->localite); ?></td>
                                        <td><?php echo e($OffreEnVedette->localisation); ?></td>
                                        <td><?php echo e($OffreEnVedette->details); ?></td>
                                        <td><?php echo e($OffreEnVedette->typeTransaction); ?></td>
                                        <td><?php echo e($OffreEnVedette->visite360); ?></td>
                                        <td><?php echo e($OffreEnVedette->video); ?></td>
                                        <td>
                                            <?php if($OffreEnVedette->image): ?>
                                                <?php
                                                    // Vérifier si l'image existe dans le disque public
                                                    $imageUrl = Storage::disk('public')->exists($OffreEnVedette->image)
                                                        ? Storage::disk('public')->url($OffreEnVedette->image)
                                                        : asset('default-image.jpg'); // Image par défaut
                                                ?>
                                                <img src="<?php echo e($imageUrl); ?>" alt="Image OffreEnVedette" width="50">
                                            <?php else: ?>
                                                Aucun
                                            <?php endif; ?>
                                        </td>


                                        <td><?php echo e($OffreEnVedette->validee ? 'Oui' : 'Non'); ?></td>
                                        <td class="text-right">
                                            <div class="button-container d-flex justify-content-end">
                                                <!-- Formulaire pour Valider / Annuler la validation -->
                                                <?php if($OffreEnVedette->validee): ?>
                                                    <form
                                                        action="<?php echo e(route('admin.OffreEnVedette.valider', $OffreEnVedette->offre_en_vedettes_id)); ?>"
                                                        method="POST" style="display:inline;">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('POST'); ?>
                                                        <input type="hidden" name="action" value="unvalidate">
                                                        <button type="submit" class="btn btn-success btn-sm mx-1"> <!-- Ajout de 'mx-1' pour marges -->
                                                           <span> <i class="fa fa-check-circle"></i> Retirer</span>
                                                        </button>
                                                    </form>
                                                <?php else: ?>
                                                    <form
                                                        action="<?php echo e(route('admin.OffreEnVedette.valider', $OffreEnVedette->offre_en_vedettes_id)); ?>"
                                                        method="POST" style="display:inline;">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('POST'); ?>
                                                        <input type="hidden" name="action" value="validate">
                                                        <button type="submit" class="btn btn-warning btn-sm mx-1"> <!-- Ajout de 'mx-1' pour marges -->
                                                          <span>  <i class="fa fa-times-circle"></i>Approuver</span>
                                                        </button>
                                                    </form>
                                                <?php endif; ?>
                                                <!-- Formulaire pour Supprimer -->
                                                <form
                                                    action="<?php echo e(route('admin.offreEnVedette.destroy', $OffreEnVedette->offre_en_vedettes_id)); ?>"
                                                    method="POST" style="display:inline;"
                                                    onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette annonce ?')">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-danger btn-sm mx-1"> <!-- Ajout de 'mx-1' pour marges -->
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>

                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

            <!-- Bootstrap core JavaScript-->
            <script src="<?php echo e(asset('Frontend/Home/assets/vendor/jquery/jquery.min.js')); ?>"></script>
            <script src="<?php echo e(asset('Frontend/Home/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

            <!-- Core plugin JavaScript-->
            <script src="<?php echo e(asset('Frontend/Home/assets/vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>

            <!-- Custom scripts for all pages-->
            <script src="<?php echo e(asset('Frontend/Home/assets/js/sb-admin-2.min.js')); ?>"></script>

            <!-- Page level plugins -->
            <script src="<?php echo e(asset('Frontend/Home/assets/vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
            <script src="<?php echo e(asset('Frontend/Home/assets/vendor/datatables/dataTables.bootstrap4.min.js')); ?>"></script>

            <!-- Page level custom scripts -->
            <script src="<?php echo e(asset('Frontend/Home/assets/js/demo/datatables-demo.js')); ?>"></script>
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('Layout.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/espokeys/BBI/client/web/BBIAPP/BBI/resources/views/Layout/Backend/Admin_dashboard/Offre_en_vedette/annonce-liste.blade.php ENDPATH**/ ?>