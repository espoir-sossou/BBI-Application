<?php $__env->startSection('content'); ?>
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
            style="background-image: url('<?php echo e(asset('Frontend/Home/assets/imgs/img11.jpg')); ?>');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                <h2>Paiement Total</h2>
                <ol>
                    <li><a href="index.html">Offre</a></li>
                    <li>Paiement</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->
    <div class="container mt-5" style="margin-bottom: 250px">
        <h2>Paiement de l'Annonce: <?php echo e($annonce->titre); ?></h2>
        <p><strong>Montant Total:</strong> <?php echo e(number_format($annonce->montant, 0, ',', ' ')); ?> XOF</p>

        <form >
            <?php echo csrf_field(); ?>
            <!-- Ajoute ici ton formulaire de paiement -->
            <button type="submit" class="btn btn-info">Payer maintenant</button>
        </form>

        <a href="<?php echo e(route('panier')); ?>" class="btn btn-primary mt-3">Retour au Panier</a>
    </div>
</main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layout.lending_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/espokeys/BBI/client/web/BBIAPP/BBI/resources/views/Payement/payement-total.blade.php ENDPATH**/ ?>