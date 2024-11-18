<!-- Navbar Start -->
<div class="container-fluid bg-dark">
    <div class="row px-xl-5">
        <!-- Masquer la barre de navigation verticale sur les petits écrans -->
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn d-flex align-items-center justify-content-between w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px; background-color:#318093">
                <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                <div class="navbar-nav w-100">
                    <div class="nav-item dropdown dropright">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Auberges <i class="fa fa-angle-right float-right mt-1"></i></a>
                        <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                            <a href="" class="dropdown-item">Chambre Privée</a>
                            <a href="" class="dropdown-item">Chambre partagée</a>
                            <a href="" class="dropdown-item">Auberges de charme</a>
                            <a href="" class="dropdown-item">éco-responsables</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown dropright">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Restaurants <i class="fa fa-angle-right float-right mt-1"></i></a>
                        <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                            <a href="" class="dropdown-item">Traditionnels</a>
                            <a href="" class="dropdown-item">Cuisine raffinée</a>
                            <a href="" class="dropdown-item">Végétariens</a>
                            <a href="" class="dropdown-item">Plats simples et rapides</a>
                            <a href="" class="dropdown-item">Restaurants de spécialité</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown dropright">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Hotels <i class="fa fa-angle-right float-right mt-1"></i></a>
                        <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                            <a href="" class="dropdown-item">Chambres confortables</a>
                            <a href="" class="dropdown-item">Hôtels de luxe</a>
                            <a href="" class="dropdown-item">Hôtels pour sportifs</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown dropright">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Caves à vin <i class="fa fa-angle-right float-right mt-1"></i></a>
                        <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                            <a href="" class="dropdown-item">Cave à vin à éclairage LED</a>
                            <a href="" class="dropdown-item">Cave à vin polyvalente</a>
                            <a href="" class="dropdown-item">Dégustation du vin</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Masquer la barre de navigation horizontale sur les petits écrans -->
        <div class="col-lg-9 d-none d-lg-block">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <div class="" style="width: 200px; height: 80px;">
                        <img class="img-fluid" src="Generales/img/logo2.jpg" alt="">
                    </div>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="/" class="nav-item nav-link active" style="color: #318093">Home</a>
                        <a href="" class="nav-item nav-link">
                            <i class="fa fa-tag" aria-hidden="true"></i>
                            Offre
                        </a>
                        <a href="" class="nav-item nav-link">
                            <i class="fa fa-map" aria-hidden="true"></i>
                            Carte
                        </a>
                        <a href="{{ route('filtre.page') }}" class="nav-item nav-link">
                            <i class="fa fa-filter" aria-hidden="true"></i>
                            Filtre
                        </a>
                        <a href="{{ route('signUpPage') }}" class="nav-item nav-link">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            Agent
                        </a>
                        <a href="" class="nav-item nav-link">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                            Paramètre
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Navbar End -->
