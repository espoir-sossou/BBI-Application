<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <h2>Mon Panier</h2>

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
        <div class="row">
            <?php $__currentLoopData = $annonces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $annonce): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?php echo e(asset('storage/' . $annonce->image)); ?>" class="card-img-top" alt="<?php echo e($annonce->titre); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($annonce->titre); ?></h5>
                            <p class="card-text"><?php echo e(number_format($annonce->montant, 0, ',', ' ')); ?> XOF</p>
                            <a href="<?php echo e(route('annonce.details', $annonce->annonce_id)); ?>" class="btn btn-info">Voir les détails</a>

                            <!-- Bouton pour supprimer l'annonce du panier -->
                            <form action="<?php echo e(route('panier.supprimer', $annonce->annonce_id)); ?>" method="POST" style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm mt-2">Supprimer du panier</button>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layout.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/espokeys/BBI/client/web/BBIAPP/BBI/resources/views/panier.blade.php ENDPATH**/ ?>