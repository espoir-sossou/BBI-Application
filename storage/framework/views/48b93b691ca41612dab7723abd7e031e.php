<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bolivie Business Inter</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('Frontend/Home/assets/imgs/logo_bbi.png')); ?>">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Villa Bootstrap core CSS -->
    <link href="<?php echo e(asset('Generales/Villa/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="<?php echo e(asset('Generales/Villa/assets/css/fontawesome.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('Generales/Villa/assets/css/templatemo-villa-agency.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('Generales/Villa/assets/css/owl.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('Generales/Villa/assets/css/animate.css')); ?>">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />


    <link rel="stylesheet" href="<?php echo e(asset('Auberge/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('Auberge/css/responsive.css')); ?>">


    <!-- Favicon -->
    <link href="<?php echo e(asset('Generales/img/favicon.ico')); ?>" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo e(asset('Generales/lib/animate/animate.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('Generales/lib/owlcarousel/assets/owl.carousel.min.css')); ?>" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo e(asset('Generales/css/style.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('Frontend/Lending/assets/img/apple-touch-icon.png')); ?>" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">


    <!-- Vendor CSS Files -->
    <link href="<?php echo e(asset('Frontend/Lending/assets/vendor/bootstrap-icons/bootstrap-icons.css')); ?>" rel="stylesheet">



    <!-- Template Main CSS File
    <link href="<?php echo e(asset('Frontend/Lending/assets/css/main.css')); ?>" rel="stylesheet">
-->

    <style>
        /* Masquer la section Vendor sur les petits écrans (mobile) */
        @media (max-width: 768px) {
            .container-fluid.py-5 {
                display: none;
                /* Masquer la section Vendor sur les petits écrans */
            }
        }

        /* Afficher la section Vendor sur les grands écrans */
        @media (min-width: 769px) {
            .container-fluid.py-5 {
                display: block;
                /* Afficher la section Vendor sur les écrans de taille normale */
            }
        }

        /* Masquer les éléments sur les petits écrans */
        @media (max-width: 768px) {
            .container-fluid .row .col-lg-3 {
                display: none;
                /* Masque les éléments sur les petits écrans */
            }

        }

        /* Masquer l'élément sur les petits écrans */
        @media (max-width: 768px) {
            .col-lg-4 .info-table {
                display: none !important;
                /* Masque cet élément sur les petits écrans */
            }
        }

        /* Sur les petits écrans */
        @media (max-width: 768px) {
            .carousel {
                height: 25vh !important;
                /* Réduit la hauteur à 30% de la hauteur de l'écran */
                margin-bottom: 0 !important;
                /* Supprime toute marge en bas de l'image */
            }
        }

        /* Sur les petits écrans */
        @media (max-width: 768px) {
            .single-property.section {
                top: 10px;
                /* Ajuste la valeur du top sur les petits écrans */
            }
        }

        @media (max-width: 768px) {
            .col-lg-8 {
                display: none;
                /* Masque le contenu sur les écrans de petite taille */
            }
        }

        /* Règle pour petits écrans */
        @media (max-width: 768px) {
            .section.properties {
                margin-top: 120px;
                /* Augmentez la valeur négative pour aller encore plus haut */
                position: relative;
                top: 120px;
                /* Ajustez cette valeur selon vos besoins */
            }
        }

        .carousel-item {
            transition: transform 0.5s ease, opacity 0.5s ease;
        }

        .carousel-item-next,
        .carousel-item-prev,
        .carousel-item.active {
            display: block;
        }

        .carousel-inner {
            overflow: hidden;
        }

        @media (max-width: 576px) {

            .section.properties.annonce {
                margin-top: 0px;
                /* Augmentez la valeur négative pour aller encore plus haut */
                position: relative;
                top: 0px;
                /* Ajustez cette valeur selon vos besoins */
            }
        }

        .favorite-icon {
            position: absolute;
            bottom: 10px;
            right: 10px;
            z-index: 10;
        }

        .favorite-icon .btn {
            background: none;
            border: none;
            padding: 0;
        }

        .favorite-icon .btn:hover i {
            color: #ff0000;
            /* Couleur de l'icône quand elle est cliquée */
        }

        .item .btn i {
            transition: color 0.3s ease;
        }

        .item .btn:hover i {
            color: darkred;
        }
    </style>
</head>

<body>
    <!-- *****
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  Preloader End ***** -->

    <?php echo $__env->make('Layout.Frontend.Partials.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('Layout.Frontend.Partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->make('Layout.Frontend.Partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="<?php echo e(asset('Frontend/Lending/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('Frontend/Lending/assets/vendor/aos/aos.js')); ?>"></script>
    <script src="<?php echo e(asset('Frontend/Lending/assets/vendor/glightbox/js/glightbox.min.js')); ?>"></script>
    <script src="<?php echo e(asset('Frontend/Lending/assets/vendor/isotope-layout/isotope.pkgd.min.js')); ?>"></script>
    <script src="<?php echo e(asset('Frontend/Lending/assets/vendor/swiper/swiper-bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('Frontend/Lending/assets/vendor/purecounter/purecounter_vanilla.js')); ?>"></script>
    <script src="<?php echo e(asset('Frontend/Lending/assets/vendor/php-email-form/validate.js')); ?>"></script>

    <!-- Template Main JS File -->
    <script src="<?php echo e(asset('Frontend/Lending/assets/js/main.js')); ?>"></script>


</body>

</html>
<?php /**PATH /home/espokeys/BBI/client/web/BBIAPP/BBI/resources/views/Layout/home.blade.php ENDPATH**/ ?>