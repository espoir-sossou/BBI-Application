<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bolivie Business Inter</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('Frontend/Home/assets/imgs/logo_bbi.png') }}">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Villa Bootstrap core CSS -->
    <link href="Generales/Villa/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="Generales/Villa/assets/css/fontawesome.css">
    <link rel="stylesheet" href="Generales/Villa/assets/css/templatemo-villa-agency.css">
    <link rel="stylesheet" href="Generales/Villa/assets/css/owl.css">
    <link rel="stylesheet" href="Generales/Villa/assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />


    <link rel="stylesheet" href="Auberge/css/style.css">
    <link rel="stylesheet" href="Auberge/css/responsive.css">


    <!-- Favicon -->
    <link href="Generales/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="Generales/lib/animate/animate.min.css" rel="stylesheet">
    <link href="Generales/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="Generales/css/style.css" rel="stylesheet">
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
                margin-top: -20px;
                /* Augmentez la valeur négative pour aller encore plus haut */
                position: relative;
                top: -20px;
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

    @include('Layout.Frontend.Partials.topbar')

    @include('Layout.Frontend.Partials.navbar')

    @yield('content')

    @include('Layout.Frontend.Partials.footer')

    <!-- Back to Top -->
    <a href="#" class="btn  back-to-top" style="background-color:#fd7e14; color:white"><i
            class="fa fa-angle-double-up"></i></a>


</body>

</html>
