<?php $__env->startSection('content'); ?>
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
            style="background-image: url('<?php echo e(asset('Frontend/Home/assets/imgs/property-05.jpg')); ?>');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                <h2>Mon Panier</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Mon Panier</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->
        <div class="container mt-5 mb-5">

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

                                <img src="<?php echo e($imagePath); ?>" class="card-img-top" alt="<?php echo e($annonce->titre); ?>"
                                    style="height: 200px">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo e($annonce->titre); ?></h5>
                                    <p class="card-text"><?php echo e(number_format($annonce->montant, 0, ',', ' ')); ?> XOF</p>

                                    <div class="d-flex align-items-center mt-2">
                                        <span class="badge" data-bs-toggle="modal"
                                            data-bs-target="#paymentModal<?php echo e($annonce->annonce_id); ?>"
                                            style="background-color: <?php echo e($annonce->typeTransaction === 'A louer' ? '#318093' : ($annonce->typeTransaction === 'A vendre' ? '#4CAF50' : '#318093')); ?>;
                                           color: white;
                                           cursor: pointer;">
                                            <?php echo e($annonce->typeTransaction === 'A vendre' ? 'Acheter' : $annonce->typeTransaction); ?>

                                        </span>

                                        <!-- Lien pour retirer l'annonce du panier -->
                                        <form action="<?php echo e(route('panier.supprimer', $annonce->annonce_id)); ?>" method="POST"
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

                        <!-- Modal pour choisir le type de paiement -->
                        <div class="modal fade" id="paymentModal<?php echo e($annonce->annonce_id); ?>" tabindex="-1"
                            aria-labelledby="paymentModalLabel<?php echo e($annonce->annonce_id); ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="paymentModalLabel<?php echo e($annonce->annonce_id); ?>">Options de
                                            Paiement pour <?php echo e($annonce->titre); ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Choisissez la méthode de paiement pour cette annonce :</p>
                                        <form action="<?php echo e(route('panier.payer', $annonce->annonce_id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="payment_option"
                                                    id="paymentOption1<?php echo e($annonce->annonce_id); ?>" value="total" checked>
                                                <label class="form-check-label"
                                                    for="paymentOption1<?php echo e($annonce->annonce_id); ?>">
                                                    Paiement en totalité
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="payment_option"
                                                    id="paymentOption2<?php echo e($annonce->annonce_id); ?>" value="installments">
                                                <label class="form-check-label"
                                                    for="paymentOption2<?php echo e($annonce->annonce_id); ?>">
                                                    Paiement par tranches
                                                </label>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Annuler</button>
                                        <button type="submit" class="btn btn-primary">Suivant</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <p>Votre panier est vide.</p>
            <?php endif; ?>
        </div>
    </main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layout.lending_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/espokeys/BBI/client/web/BBIAPP/BBI/resources/views/Layout/Frontend/Annonce/panier.blade.php ENDPATH**/ ?>