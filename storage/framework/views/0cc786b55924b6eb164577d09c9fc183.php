<style>
    /* Style général pour la barre de navigation mobile */
    .navbar-nav {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    /* Section du logo et de la barre de recherche sur mobile */
    .navbar .row {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    /* Le logo dans la première colonne */
    .navbar img {
        max-width: 100%;
        height: auto;
    }

    /* Barre de recherche au centre */
    .form-control {
        width: 100%;
        border-radius: 20px;
    }

    /* Deuxième ligne avec défilement horizontal des boutons */
    .scrolling-buttons {
        overflow-x: auto;
        white-space: nowrap;
        margin-top: 10px;
        margin-bottom: 20px;
        /* Ajouter un peu d'espace au bas */
    }

    .scrolling-buttons .navbar-nav {
        display: inline-flex;
    }

    .scrolling-buttons .nav-item {
        display: inline-block;
        margin-right: 10px;
    }

    .scrolling-buttons .btn {
        white-space: nowrap;
        padding: 8px 15px;
        font-size: 14px;
        border-radius: 20px;
        transition: background-color 0.3s, transform 0.3s ease;
    }

    /* Changement de couleur et effet d'agrandissement au survol des boutons */
    .scrolling-buttons .btn:hover {
        background-color: #318093;
        color: white;
        transform: scale(1.05);
    }

    /* Application de la mise en page uniquement pour les petits écrans */
    @media (max-width: 767px) {
        .navbar .row {
            display: flex;
            justify-content: space-between;
        }

        .navbar .col-4,
        .navbar .col-8 {
            padding: 0;
        }

        /* Empêcher le défilement horizontal de la page */
        body {
            overflow-x: hidden;
        }

        /* Ajustement des boutons horizontaux */
        .scrolling-buttons {
            overflow-x: auto;
            white-space: nowrap;
            margin-top: 10px;
            margin-bottom: 20px;
            /* Plus d'espace sous les boutons */
        }
    }

    /* Masquer la barre de navigation par défaut sur les grands écrans */
    .bottom-navbar {
        display: none;
    }

    /* Styles pour la barre de navigation en bas sur petits écrans */
    .bottom-navbar.d-block.d-lg-none {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        z-index: 9999;
        display: flex;
        /* Utilisation de Flexbox pour disposer les éléments horizontalement */
        justify-content: flex-start;
        /* Aligner les éléments à gauche, sans espacement */
        align-items: center;
        /* Alignement vertical centré */
        height: 60px;
        /* Ajuste la hauteur de la barre de navigation */
        padding: 0;
        /* Pas de padding */
    }

    /* Style pour les éléments de la barre de navigation */
    .bottom-nav-item {
        text-align: center;
        color: #318093;
        /* Couleur des icônes et du texte */
        text-decoration: none;
        flex: none;
        /* Ne pas étirer les éléments */
        width: auto;
        /* Largeur automatique pour les éléments */
        padding: 0 15px;
        /* Ajouter un petit espacement horizontal entre les éléments */
    }

    /* Style pour les icônes */
    .bottom-nav-item i {
        font-size: 18px;
        /* Taille des icônes */
    }

    /* Style pour les textes sous les icônes */
    .bottom-nav-item span {
        display: block;
        font-size: 12px;
    }

    /* Afficher la barre de navigation en bas sur petits écrans */
    @media (max-width: 768px) {
        .bottom-navbar {
            display: flex;
            /* Afficher la barre en bas pour petits écrans */
        }
    }

    @media (max-width: 767px) {
        .scrolling-buttons .nav-item {
            margin-right: 5px;
        }

        .scrolling-buttons .btn {
            padding: 5px 8px;
            /* Réduisez ces valeurs selon vos besoins */
            font-size: 15px;
        }
    }
</style>



<!-- Topbar Start -->
<div class="container-fluid">
    <div class="row bg-secondary py-1 px-xl-5" style="background-color: #f11562;">
        <!-- Liens et menu à gauche (desktop seulement) -->
        <div class="col-lg-6 d-none d-lg-block">
            <div class="d-inline-flex align-items-center h-100">
                <a class="text-body mr-3" href="#">Apropos</a>
                <a class="text-body mr-3" href="#">Contact</a>
                <a class="text-body mr-3" href="#">Services</a>
                <a class="text-body mr-3" href="#"><i class="fa fa-question-circle" aria-hidden="true"
                        title="aide"></i></a>
            </div>
        </div>

        <!-- Section des boutons horizontaux (pour les grands écrans) -->
        <div class="d-none d-lg-flex justify-content-end">
            <!-- Liste des boutons -->
            <div class="btn-group mx-1">
                <button type="button" class="btn btn-sm btn-light d-flex align-items-center">
                    <i class="fa fa-briefcase" aria-hidden="true" style="font-size: 20px; color: #318093"></i>
                    <span class="ml-2" style="color: #318093">BBI</span>
                </button>
            </div>

            <div class="btn-group mx-1">
                <button type="button" class="btn btn-sm btn-light d-flex align-items-center">
                    <i class="fa fa-phone" aria-hidden="true" style="font-size: 20px; color: #318093"></i>
                    <span class="ml-2" style="color: #318093">Appeler</span>
                </button>
            </div>

            <div class="btn-group mx-1">
                <button type="button" class="btn btn-sm btn-light d-flex align-items-center">
                    <i class="fa fa-comment" aria-hidden="true" style="font-size: 20px; color: #318093"></i>
                    <span class="ml-2" style="color: #318093">Messages</span>
                </button>
            </div>

            <div class="btn-group mx-1">
                <button type="button" class="btn btn-sm btn-light d-flex align-items-center">
                    <i class="fa fa-exchange-alt" aria-hidden="true" style="font-size: 20px; color: #318093"></i>
                    <span class="ml-2" style="color: #318093">Comparer</span>
                </button>
            </div>

            <div class="btn-group mx-1">
                <button type="button" class="btn btn-sm btn-light d-flex align-items-center">
                    <i class="fa fa-heart" aria-hidden="true" style="font-size: 20px; color: #318093"></i>
                    <span class="ml-2" style="color: #318093">Favori</span>
                </button>
            </div>

            <div class="btn-group mx-1">
                <a href="<?php echo e(route('panier')); ?>">
                    <button type="button" class="btn btn-sm btn-light d-flex align-items-center">
                        <i class="fa fa-shopping-cart" aria-hidden="true" style="font-size: 20px; color: #318093"></i>
                        <span class="ml-2" style="color: #318093">Panier</span>
                    </button>
                </a>
            </div>

            <div class="btn-group mx-1">
                <button type="button" class="btn btn-sm btn-light d-flex align-items-center">
                    <i class="fa fa-bell" aria-hidden="true" style="font-size: 20px; color: #318093"></i>
                    <span class="ml-2" style="color: #318093">Notifications</span>
                </button>
            </div>

            <div class="btn-group mx-1">
                <button type="button" class="btn btn-sm btn-light dropdown-toggle d-flex align-items-center"
                    data-toggle="dropdown">
                    <i class="fa fa-user" aria-hidden="true" style="font-size: 20px; color: #318093"></i>
                    <span class="ml-2" style="color: #318093">Profil</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <?php
                        // Vérification de l'existence de l'utilisateur connecté dans la session
                        $userId = session('user_id');
                        $userRole = session('user_role');
                    ?>

                    <?php if($userId && $userRole === 'USER'): ?>
                        <!-- Si l'utilisateur est connecté et son rôle est 'USER' -->
                        <a href="<?php echo e(route('user.profil')); ?>">
                            <button class="dropdown-item" type="button" style="color: #318093">
                                Profil
                            </button>
                        </a>
                        <form id="logout-form" action="<?php echo e(route('authLogout')); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>
                        <button class="dropdown-item" type="button" style="color: #318093"
                            onclick="confirmLogout(event)">
                            Se déconnecter
                        </button>
                    <?php else: ?>
                        <!-- Si l'utilisateur n'est pas connecté, afficher les options de connexion et inscription -->
                        <a href="<?php echo e(route('loginPage')); ?>">
                            <button class="dropdown-item" type="button" style="color: #318093">Se connecter</button>
                        </a>
                        <a href="<?php echo e(route('signUpPage')); ?>">
                            <button class="dropdown-item" type="button" style="color: #318093">S'inscrire</button>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Zone de recherche et logo (pour les grands écrans) -->
<div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
    <div class="col-lg-4">
        <a href="/" class="text-decoration-none">
            <img class="img-fluid" src="<?php echo e(asset('Frontend/Home/assets/imgs/logo_bbi.png')); ?>" alt="Logo"
                style="width: 120px; height: 80px;">
        </a>
    </div>
    <div class="col-lg-4 col-6 text-left mb-2">
        <form action="">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Rechercher un produit">
                <div class="input-group-append">
                    <span class="input-group-text bg-transparent" style="color:#318093">
                        <i class="fa fa-search"></i>
                    </span>
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg-4 col-6 text-right mb-4">
        <a href="<?php echo e(route('loginPage')); ?>" class="btn btn-outline-primary"
            style="border-radius: 30px; font-weight: 700; color:white; background-color:#318093">
            <i class="fas fa-bullhorn mr-2"></i> Publier une annonce
        </a>
    </div>
</div>
<!-- Topbar End -->

<!-- Navbar Start (Mobile View) -->
<nav class="navbar navbar-expand-lg navbar-light bg-light d-lg-none">
    <!-- Première ligne avec le logo et la barre de recherche -->
    <div class="row w-100">
        <!-- Logo aligné à gauche -->
        <div class="col-4">
            <img src="Frontend/Home/assets/imgs/logo_bbi.png" alt="Logo" class="img-fluid"
                style="width: 100px; height: 80px;" />
        </div>

        <!-- Barre de recherche alignée à droite -->
        <div class="col-8">
            <input type="text" class="form-control" placeholder="Rechercher..." aria-label="Rechercher" />
        </div>
    </div>

    <!-- Section pour petits écrans : afficher les boutons sous forme de défilement horizontal -->
    <div class="d-lg-none">
        <div class="scrolling-buttons">
            <ul class="navbar-nav d-flex flex-row w-100">
                <a href="<?php echo e(route('loginPage')); ?>">
                    <li class="nav-item">
                        <button class="btn btn-light" style=" color:white; background-color:#318093">
                            <i class="fas fa-bullhorn mr-2" style=" color:white; "></i> <span>Annonces</span>
                        </button>
                    </li>
                </a>
                <li class="nav-item">
                    <button class="btn btn-light">
                        <i class="fa fa-phone" style="color: #318093;"></i>
                    </button>
                </li>

                <li class="nav-item">
                    <button class="btn btn-light">
                        <i class="fa fa-comment" style="color: #318093;"></i> <span></span>
                    </button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-light">
                        <i class="fa fa-exchange-alt" style="color: #318093;"></i> <span></span>
                    </button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-light">
                        <i class="fa fa-heart" style="color: #318093;"></i> <span></span>
                    </button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-light">
                        <i class="fa fa-bell" style="color: #318093;"></i> <span></span>
                    </button>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('panier')); ?>">
                        <button class="btn btn-light">
                            <i class="fa fa-shopping-cart" style="color: #318093;"></i>
                        </button>
                    </a>
                </li>

                <li class="nav-item">
                    <div class="btn-group mx-1">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle d-flex align-items-center"
                            data-toggle="dropdown">
                            <i class="fa fa-user" aria-hidden="true" style=" color: #318093"></i>
                            <span class="ml-2" style="color: #318093"></span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <?php
                                // Vérification de l'existence de l'utilisateur connecté dans la session
                                $userId = session('user_id');
                                $userRole = session('user_role');
                            ?>

                            <?php if($userId && $userRole === 'USER'): ?>
                                <!-- Si l'utilisateur est connecté et son rôle est 'USER' -->
                                <a href="<?php echo e(route('user.profil')); ?>">
                                    <button class="dropdown-item" type="button" style="color: #318093">
                                        Profil
                                    </button>
                                </a>
                                <form id="logout-form" action="<?php echo e(route('authLogout')); ?>" method="POST"
                                    style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>
                                <button class="dropdown-item" type="button" style="color: #318093"
                                    onclick="confirmLogout(event)">
                                    Se déconnecter
                                </button>
                            <?php else: ?>
                                <!-- Si l'utilisateur n'est pas connecté, afficher les options de connexion et inscription -->
                                <a href="<?php echo e(route('loginPage')); ?>">
                                    <button class="dropdown-item" type="button" style="color: #318093">Se
                                        connecter</button>
                                </a>
                                <a href="<?php echo e(route('signUpPage')); ?>">
                                    <button class="dropdown-item" type="button"
                                        style="color: #318093">S'inscrire</button>
                                </a>
                            <?php endif; ?>
                        </div>

                        <script>
                            // Fonction de confirmation avant la déconnexion
                            function confirmLogout(event) {
                                if (!confirm('Êtes-vous sûr de vouloir vous déconnecter ?')) {
                                    event.preventDefault();
                                } else {
                                    document.getElementById('logout-form').submit();
                                }
                            }
                        </script>

                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>


<!-- Bottom Navbar for small screens -->
<div class="bottom-navbar d-block d-lg-none">
    <div class="navbar">
        <a href="#" class="bottom-nav-item">
            <i class="fa fa-bolt"></i>
            <span>Offre</span>
        </a>
        <a href="#" class="bottom-nav-item">
            <i class="fa fa-map"></i>
            <span>Carte</span>
        </a>
        <a href="<?php echo e(route('filtre.page')); ?>" class="bottom-nav-item">
            <i class="fa fa-filter"></i>
            <span>Filtre</span>
        </a>
        <a href="<?php echo e(route('signUpPage')); ?>" class="bottom-nav-item">
            <i class="fa fa-user"></i>
            <span>Agent</span>
        </a>
        <a href="#" class="bottom-nav-item">
            <i class="fa fa-cogs"></i>
            <span>Paramètre</span>
        </a>
    </div>
</div>
<?php /**PATH /home/espokeys/BBI/client/web/BBIAPP/BBI/resources/views/Layout/Frontend/Annonce/Partials/topbar.blade.php ENDPATH**/ ?>