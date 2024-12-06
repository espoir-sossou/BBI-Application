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
                    <?php if(!$hasAnnonces): ?>
                        <div class="alert alert-warning">
                            <strong>Vous n'avez pas encore créé d'annonce.</strong>
                            <p>Commencez dès maintenant en créant votre première annonce !</p>
                            <a href="<?php echo e(route('annonce.add.page')); ?>" class="btn btn-primary">Créer une annonce</a>
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
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Carte</th>
                                        <th>Lien Google Maps</th>
                                        <th>Détails</th>
                                        <th>Type de Transaction</th>
                                        <th>Visite 360°</th>
                                        <th>Image</th>
                                        <th>Valider</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $annonces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $annonce): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($annonce->annonce_id); ?></td>
                                            <td><?php echo e($annonce->titre); ?></td>
                                            <td><?php echo e($annonce->description); ?></td>
                                            <td><?php echo e($annonce->typePropriete); ?></td>
                                            <td><?php echo e($annonce->montant); ?></td>
                                            <td><?php echo e($annonce->superficie); ?></td>
                                            <td><?php echo e($annonce->nbChambres); ?></td>
                                            <td><?php echo e($annonce->nbSalleDeDouche); ?></td>
                                            <td><?php echo e($annonce->veranda ? 'Oui' : 'Non'); ?></td>
                                            <td><?php echo e($annonce->terrasse ? 'Oui' : 'Non'); ?></td>
                                            <td><?php echo e($annonce->cuisine ? 'Oui' : 'Non'); ?></td>
                                            <td><?php echo e($annonce->dependance ? 'Oui' : 'Non'); ?></td>
                                            <td><?php echo e($annonce->piscine ? 'Oui' : 'Non'); ?></td>
                                            <td><?php echo e($annonce->garage ? 'Oui' : 'Non'); ?></td>
                                            <td><?php echo e($annonce->titreFoncier ? 'Oui' : 'Non'); ?></td>
                                            <td><?php echo e($annonce->localite); ?></td>
                                            <td><?php echo e($annonce->latitude); ?></td>
                                            <td><?php echo e($annonce->longitude); ?></td>
                                            <td>
                                                <?php if($annonce->latitude && $annonce->longitude): ?>
                                                    <iframe width="200" height="150" frameborder="0" style="border:0;"
                                                        src="https://www.google.com/maps/embed/v1/view?key=AIzaSyBrntgALGzUGdJNxYhC5Nb_rOmSxhuRsZM&center=<?php echo e($annonce->latitude); ?>,<?php echo e($annonce->longitude); ?>&zoom=15"
                                                        allowfullscreen>
                                                    </iframe>
                                                <?php else: ?>
                                                    Non disponible
                                                <?php endif; ?>
                                            </td>

                                            <td>
                                                <?php if($annonce->latitude && $annonce->longitude): ?>
                                                    <a href="https://www.google.com/maps?q=<?php echo e($annonce->latitude); ?>,<?php echo e($annonce->longitude); ?>"
                                                        target="_blank">
                                                        Voir sur Google Maps
                                                    </a>
                                                <?php else: ?>
                                                    Non disponible
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($annonce->details); ?></td>
                                            <td><?php echo e($annonce->typeTransaction); ?></td>
                                            <td><?php echo e($annonce->visite360); ?></td>
                                            <td>
                                                <?php if($annonce->images->isNotEmpty()): ?>
                                                    <div style="display: flex; flex-wrap: wrap; gap: 5px;">
                                                        <?php $__currentLoopData = $annonce->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php
                                                                // Vérifier si le chemin de l'image existe dans le disque public
                                                                $imageUrl = Storage::disk('public')->exists($image->path)
                                                                    ? Storage::disk('public')->url($image->path)
                                                                    : asset('default-image.jpg'); // Image par défaut
                                                            ?>
                                                            <div style="width: 50px; height: 50px; overflow: hidden; border-radius: 5px;">
                                                                <img src="<?php echo e($imageUrl); ?>" alt="Image Annonce" style="width: 100%; height: 100%; object-fit: cover;">
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                <?php else: ?>
                                                    <span>Aucune image</span>
                                                <?php endif; ?>
                                            </td>


                                            <td><?php echo e($annonce->validee ? 'Oui' : 'Non'); ?></td>

                                            <td>
                                                <!-- Lien pour l'édition -->
                                                <a href="<?php echo e(route('annonce.edit', $annonce->annonce_id)); ?>"
                                                    class="btn btn-warning btn-sm ml-2">
                                                    <i class="fa fa-edit"></i> <!-- Icone d'édition -->
                                                </a>
                                                <!-- Formulaire pour Supprimer -->
                                                <form action="<?php echo e(route('annonces.destroy', $annonce->annonce_id)); ?>"
                                                    method="POST" style="display:inline;"
                                                    onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette annonce ?')">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i> <!-- Icone de suppression -->
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

<?php echo $__env->make('Layout.agence_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/espokeys/BBI/client/web/BBIAPP/BBI/resources/views/Layout/Backend/Agence_dashboard/annonce-liste.blade.php ENDPATH**/ ?>