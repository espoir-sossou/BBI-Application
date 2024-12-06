<?php $__env->startSection('content'); ?>
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" style="height: 50vh; margin-bottom:200px">
        <div class="carousel-inner h-100">
            <?php $__currentLoopData = $offresEnVedette; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $offre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="carousel-item h-100 <?php echo e($index === 0 ? 'active' : ''); ?>">
                    <?php if($offre->image): ?>
                        <?php
                            $imagePath = $offre->image
                                ? Storage::url($offre->image)
                                : asset('Frontend/Home/assets/imgs/default.jpg');
                        ?>
                        <img src="<?php echo e($imagePath); ?>" class="d-block w-100 h-100"
                            style="object-fit: cover; transition: opacity 1s ease-in-out;" alt="Image de l'offre en vedette">
                    <?php else: ?>
                        <img src="Frontend/Home/assets/imgs/default.jpg" class="d-block w-100 h-100"
                            style="object-fit: cover; transition: opacity 1s ease-in-out;" alt="Image par défaut">
                    <?php endif; ?>
                    <!-- Titre sur l'image avec ombre -->
                    <div class="text-on-image"
                        style="position: absolute; top: 10%; left: 10px; z-index: 10; background-color: rgba(0, 0, 0, 0.5); color: white; padding: 5px 10px;  border-radius: 5px;">
                        <h5 style="margin: 0; color: white"><?php echo e($offre->titre ?? 'Titre par défaut'); ?></h5>
                    </div>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <!-- Contrôles précédent et suivant -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Précédent</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Suivant</span>
        </button>
    </div>


    <div class="row" style="position: relative; top:-250px">
        <div class="col-lg-12">
            <!-- Banniere -->
            <div class="container-fluid">

                <!-- Featured Start -->
                <div class="container-fluid pt-4">
                    <div class="row px-xl-5 tags ">

                        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                            <a href="<?php echo e(route('avendre')); ?>">
                                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                                    <h1 class="fas fa-shopping-bag m-0 mr-3" style="color: #318093"></h1>
                                    <h5 class="font-weight-semi-bold m-0">Acheter</h5>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                            <a href="<?php echo e(route('alouer')); ?>">
                                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                                    <h1 class="fas fa-file-contract m-0 mr-3" style="color: #318093"></h1>
                                    <h5 class="font-weight-semi-bold m-0">Louer</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                                <h1 class="fas fa-building m-0 mr-3" style="color: #318093"></h1>
                                <h5 class="font-weight-semi-bold m-0">Gestion immobilière</h5>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                                <h1 class="fas fa-chart-line m-0 mr-3" style="color: #318093"></h1>
                                <h5 class="font-weight-semi-bold m-0">Etude d'accompagnement et de production</h5>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="section properties">
                <div class="container">
                    <div class="row properties-box">
                        <?php $__currentLoopData = $annonces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $annonce): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($annonce->typePropriete === 'Villa'): ?>
                                <!-- Filtrage des annonces "A louer" -->
                                <div class="col-lg-4 col-md-6 align-self-center mb-30 properties-items">
                                    <div class="item position-relative">
                                        <?php
                                            $firstImage = $annonce->images->first(); // Récupère la première image de la relation 'images'
                                            $imagePath = $firstImage
                                                ? Storage::url($firstImage->path)
                                                : asset('Frontend/Home/assets/imgs/default.jpg');
                                            $isFavorite = in_array($annonce->annonce_id, $userFavorites ?? []); // Vérifie si l'annonce est en favoris
                                        ?>
                                        <a href="<?php echo e(route('annonce.details', $annonce->annonce_id)); ?>">
                                            <img src="<?php echo e($imagePath); ?>" alt="Image Annonce"
                                                style="max-width: 400px; height: 200px; object-fit: cover;" class="rounded">
                                        </a>

                                        <!-- Bouton Favoris positionné directement sur l'image -->
                                        <form action="<?php echo e(route('ajouterAuxFavoris', $annonce->annonce_id)); ?>" method="POST"
                                            class="position-absolute" style="bottom: 285px; right: 30px; z-index: 10;">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="btn p-0 border-0"
                                                title="<?php echo e($isFavorite ? 'Retirer des favoris' : 'Ajouter aux favoris'); ?>">
                                                <i class="fa fa-heart"
                                                    style="font-size: 24px; color: <?php echo e($isFavorite ? 'tomato' : '#318093'); ?>; text-shadow: 0 0 5px rgba(0,0,0,0.5);">
                                                </i>
                                            </button>
                                        </form>

                                        <!-- Catégorie -->
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

                                        <!-- Informations de l'annonce -->
                                        <h6><?php echo e(number_format($annonce->montant, 0, ',', ' ')); ?> XOF</h6>
                                        <h4>
                                            <a
                                                href="<?php echo e(route('annonce.details', $annonce->annonce_id)); ?>"><?php echo e($annonce->titre); ?></a>
                                        </h4>
                                        <ul class="list-unstyled d-flex flex-wrap gap-3">
                                            <li>
                                                <i class="fa fa-bed" style="color: #318093; font-size: 24px;"
                                                    title="Nombre de chambres"></i>
                                                <span><?php echo e($annonce->nbChambres); ?></span>
                                            </li>
                                            <li>
                                                <i class="fa fa-shower" style="color: #318093; font-size: 24px;"
                                                    title="Salles de bain"></i>
                                                <span><?php echo e($annonce->nbSalleDeDouche); ?></span>
                                            </li>
                                            <li>
                                                <i class="fa fa-ruler-combined" style="color: #318093; font-size: 24px;"
                                                    title="Superficie"></i>
                                                <span><?php echo e($annonce->superficie); ?> m²</span>
                                            </li>

                                            <li>
                                                <i class="fa fa-car" style="color: #318093; font-size: 24px;"
                                                    title="Parking"></i>
                                                <span><?php echo e($annonce->garage ? '1' : '0'); ?></span>
                                            </li>
                                            <li>
                                                <i class="fa fa-file-alt" style="color: #318093; font-size: 24px;"
                                                    title="Titre foncier"></i>
                                                <span><?php echo e($annonce->garage ? 'Oui' : 'Non'); ?></span>
                                            </li>
                                            <li>
                                                <i class="fa fa-swimming-pool" style="color: #318093; font-size: 24px;"
                                                    title="Piscine"></i>
                                                <span><?php echo e($annonce->piscine ? 'Oui' : 'Non'); ?></span>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            <?php endif; ?>
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

<?php echo $__env->make('Layout.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/espokeys/BBI/client/web/BBIAPP/BBI/resources/views/Layout/Frontend/Annonce/villa-page.blade.php ENDPATH**/ ?>