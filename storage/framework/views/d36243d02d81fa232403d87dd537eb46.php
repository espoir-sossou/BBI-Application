<?php $__env->startSection('content'); ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Liste des Offres en vedette</h1>
        <p class="mb-4">Voici toutes les Offres en vedette disponibles dans la base de données.</p>

        <!-- DataTables Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Liste des Offres en vedette</h6>
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
                    <?php if(!$hasOffres): ?>
                        <div class="alert alert-warning">
                            <strong>Aucune offre en vedette disponible.</strong>
                            <p>Commencez à promouvoir vos propriétés en ajoutant des offres en vedette !</p>
                            <a href="<?php echo e(route('offreEnVedette.add.page')); ?>" class="btn btn-primary">Créer une offre en vedette</a>
                        </div>
                    <?php else: ?>
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
                                    <?php $__currentLoopData = $offresEnVedette; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($offre->offre_en_vedettes_id); ?></td>
                                            <td><?php echo e($offre->titre); ?></td>
                                            <td><?php echo e($offre->description); ?></td>
                                            <td><?php echo e($offre->typePropriete); ?></td>
                                            <td><?php echo e($offre->montant); ?></td>
                                            <td><?php echo e($offre->superficie); ?></td>
                                            <td><?php echo e($offre->nbChambres); ?></td>
                                            <td><?php echo e($offre->nbSalleDeDouche); ?></td>
                                            <td><?php echo e($offre->veranda ? 'Oui' : 'Non'); ?></td>
                                            <td><?php echo e($offre->terrasse ? 'Oui' : 'Non'); ?></td>
                                            <td><?php echo e($offre->cuisine ? 'Oui' : 'Non'); ?></td>
                                            <td><?php echo e($offre->dependance ? 'Oui' : 'Non'); ?></td>
                                            <td><?php echo e($offre->piscine ? 'Oui' : 'Non'); ?></td>
                                            <td><?php echo e($offre->garage ? 'Oui' : 'Non'); ?></td>
                                            <td><?php echo e($offre->titreFoncier ? 'Oui' : 'Non'); ?></td>
                                            <td><?php echo e($offre->localite); ?></td>
                                            <td><?php echo e($offre->localisation); ?></td>
                                            <td><?php echo e($offre->details); ?></td>
                                            <td><?php echo e($offre->typeTransaction); ?></td>
                                            <td><?php echo e($offre->visite360); ?></td>
                                            <td><?php echo e($offre->video); ?></td>
                                            <td>
                                                <?php if($offre->image): ?>
                                                    <?php
                                                        // Vérifier si l'image existe dans le disque public
                                                        $imageUrl = Storage::disk('public')->exists($offre->image)
                                                            ? Storage::disk('public')->url($offre->image)
                                                            : asset('default-image.jpg'); // Image par défaut
                                                    ?>
                                                    <img src="<?php echo e($imageUrl); ?>" alt="Image offre" width="50">
                                                <?php else: ?>
                                                    Aucun
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($offre->validee ? 'Oui' : 'Non'); ?></td>
                                            <td class="text-right">
                                                <a href="<?php echo e(route('offreEnVedette.edit', $offre->offre_en_vedettes_id)); ?>" class="btn btn-warning btn-sm ml-2">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action="<?php echo e(route('offreEnVedette.destroy', $offre->offre_en_vedettes_id)); ?>" method="POST" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette offre ?')">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
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

<?php echo $__env->make('Layout.agence_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/espokeys/BBI/client/web/BBIAPP/BBI/resources/views/Layout/Backend/Agence_dashboard/Offre_en_vedette/annonce-liste.blade.php ENDPATH**/ ?>