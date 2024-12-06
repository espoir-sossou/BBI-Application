<?php $__env->startSection('content'); ?>
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
            style="background-image: url('<?php echo e(asset('Frontend/Home/assets/imgs/aub1.jpg')); ?>');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                <h2>Mes Favoris</h2>
                <ol>
                    <li><a href="index.html">Offre</a></li>
                    <li>Mes Favoris</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->
        <div class="container mt-5 mb-5" >

            <?php if(session('message')): ?>
                <div class="alert alert-info">
                    <?php echo e(session('message')); ?>

                </div>
            <?php elseif(session('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <?php if(count($annonces) > 0): ?>
                <div class="row mt-5" style="margin-bottom: 250px;">
                    <?php $__currentLoopData = $annonces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $annonce): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <?php
                                    $firstImage = $annonce->images->first(); // Récupère la première image de la relation 'images'
                                    $imagePath = $firstImage
                                        ? Storage::url($firstImage->path)
                                        : asset('Frontend/Home/assets/imgs/default.jpg');
                                ?>

                                <img src="<?php echo e($imagePath); ?>" class="card-img-top" alt="<?php echo e($annonce->titre); ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo e($annonce->titre); ?></h5>
                                    <p class="card-text"><?php echo e(number_format($annonce->montant, 0, ',', ' ')); ?> XOF</p>
                                    <div class="d-flex align-items-center mt-2">
                                        <span class="badge"> <a href="<?php echo e(route('annonce.details', $annonce->annonce_id)); ?>"
                                                class="text-info" style="font-size: 16px">Voir les
                                                détails</a>
                                        </span>

                                        <!-- Lien pour retirer l'annonce du panier -->
                                        <form action="<?php echo e(route('favoris.supprimer', $annonce->annonce_id)); ?>" method="POST"
                                            style="display: inline;">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <span class="text-danger ms-3" style="cursor: pointer;"
                                                onclick="this.closest('form').submit()">
                                                Retirer
                                                <i class="fa fa-trash ms-1"></i>
                                            </span>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <p>Vous n'avez pas encore ajouté de favoris.</p>
            <?php endif; ?>
        </div>
    </main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layout.lending_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/espokeys/BBI/client/web/BBIAPP/BBI/resources/views/Layout/Frontend/Annonce/favoris.blade.php ENDPATH**/ ?>