<?php $__env->startSection('content'); ?>
    <div class="row mb-5" style="position: relative;">
        <div class="col-lg-12">

            <div class="section properties annonce ">
                <div class="container">
                    <div class="row properties-box">
                        <?php $__currentLoopData = $annonces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $annonce): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4 col-md-6 align-self-center mb-30 properties-items">
                                <div class="item">
                                    <?php
                                        $imagePath = $annonce->image
                                            ? Storage::url($annonce->image)
                                            : asset('Frontend/Home/assets/imgs/default.jpg');
                                    ?>
                                    <a href="<?php echo e(route('annonce.details', $annonce->annonce_id)); ?>">
                                        <img src="<?php echo e($imagePath); ?>" alt="Image Annonce"
                                            style="max-width: 400px; height: 200px">
                                    </a>




                                    <span class="category"
                                        style="
                                    background-color: <?php echo e($annonce->typeTransaction === 'A louer' ? 'green' : ($annonce->typeTransaction === 'A vendre' ? '#17a2b8' : 'transparent')); ?>;
                                    color: white;
                                    padding: 5px 10px;
                                    border-radius: 5px;
                                    font-size: 14px;
                                    display: inline-block;">
                                        <?php echo e($annonce->typeTransaction); ?>

                                    </span>
                                    <h6><?php echo e(number_format($annonce->montant, 0, ',', ' ')); ?> XOF</h6>
                                    <h4>
                                        <a
                                            href="<?php echo e(route('annonce.details', $annonce->annonce_id)); ?>"><?php echo e($annonce->titre); ?></a>
                                    </h4>
                                    <ul>
                                        <li>nbr Chambres : <span><?php echo e($annonce->nbChambres); ?></span></li>
                                        <li>Salles de bain : <span><?php echo e($annonce->nbSalleDeDouche); ?></span></li>
                                        <li>Superficie : <span><?php echo e($annonce->superficie); ?> m²</span></li>
                                        <li>Parking : <span><?php echo e($annonce->garage ? '1' : '0'); ?></span></li>
                                        <li>nbr Salle de douche : <span><?php echo e($annonce->nbChambres); ?></span></li>
                                        <li>titre foncier : <span><?php echo e($annonce->garage ? 'Oui' : 'Non'); ?></span></li>
                                        <li>Chambres : <span><?php echo e($annonce->nbChambres); ?></span></li>
                                        <li>Garage : <span><?php echo e($annonce->garage ? 'Oui' : 'Non'); ?></span></li>
                                        <li>Piscine : <span><?php echo e($annonce->piscine ? 'Oui' : 'Non'); ?></span></li>
                                    </ul>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

            </div>
        </div>
        <!-- villa End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="Generales/lib/easing/easing.min.js"></script>
    <script src="Generales/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="Generales/mail/jqBootstrapValidation.min.js"></script>
    <script src="Generales/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="Generales/js/main.js"></script>

    <!-- Scripts Villa-->
    <!-- Bootstrap core JavaScript -->
    <script src="Generales/Villa/vendor/jquery/jquery.min.js"></script>
    <script src="Generales/Villa/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="Generales/Villa/assets/js/isotope.min.js"></script>
    <script src="Generales/Villa/assets/js/owl-carousel.js"></script>
    <script src="Generales/Villa/assets/js/counter.js"></script>
    <script src="Generales/Villa/assets/js/custom.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layout.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/espokeys/BBI/client/web/BBIAPP/BBI/resources/views/Layout/Frontend/Annonce/offre.blade.php ENDPATH**/ ?>