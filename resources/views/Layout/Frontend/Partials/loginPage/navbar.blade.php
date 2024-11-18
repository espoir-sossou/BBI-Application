

<!-- Navbar Start -->
<div class="container-fluid mt-3 p-0">
    <div class="row d-flex align-items-center justify-content-between px-xl-5">
      <!-- Logo Section -->
      <div class="col-6 col-md-6 text-center text-md-left">
        <a href="/">
          <img class="img-fluid" src="Frontend/Home/assets/imgs/logo_bbi.png" alt=""
            style="width: 100px; height: auto;">
        </a>
      </div>

      <!-- Aide Section -->
      <div class="col-6 col-md-6 text-center text-md-right">
        <div class="btn-group">
          <a class="text-body mr-3" href=""><i class="fa fa-question-circle" aria-hidden="true" title="Aide"
              style="font-size:27px"></i></a>
          <span>Aide</span>
        </div>
      </div>
    </div>
  </div>
  <!-- Navbar End -->
<!-- Bottom Navbar for small screens -->
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
        <a href="{{ route('filtre.page') }}" class="bottom-nav-item">
            <i class="fa fa-filter"></i>
            <span>Filtre</span>
        </a>
        <a href="{{ route('signUpPage') }}" class="bottom-nav-item">
            <i class="fa fa-user"></i>
            <span>Agent</span>
        </a>
        <a href="#" class="bottom-nav-item">
            <i class="fa fa-cogs"></i>
            <span>Paramètre</span>
        </a>
    </div>
</div>

<style>
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
        justify-content: space-between;
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

    /* Style spécifique à la barre de navigation principale */
    .container-fluid .row .btn-group .fa-question-circle {
        font-size: 27px;
        color: #318093;
    }

    .container-fluid .row .btn-group span {
        font-size: 16px;
        color: #318093;
    }
</style>

