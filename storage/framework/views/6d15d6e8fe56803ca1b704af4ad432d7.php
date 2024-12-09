<style>
    /* Masquer le footer sur les petits écrans (mobile) */
    @media (max-width: 768px) {
        .container-fluid.bg-dark.text-secondary {
            display: none; /* Masquer tout le footer sur les petits écrans */
        }
    }

    /* Afficher le footer sur les grands écrans */
    @media (min-width: 769px) {
        .container-fluid.bg-dark.text-secondary {
            display: block; /* Afficher le footer sur les écrans de taille normale */
        }
    }
</style>

<!-- Footer Start -->
<div class="container-fluid bg-dark text-secondary mt-5 pt-5">
    <div class="row px-xl-5 pt-5">
        <!-- Contact Section -->
        <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
            <h5 class="text-secondary text-uppercase mb-4">Bolive Business Inter</h5>
            <p class="mb-4">Bolive Business Inter, Cotonou, Bénin, 229</p>
            <p class="mb-2" style="color: white"><i class="fa fa-phone-alt " style="color:#318093"></i> +229 96 91 09 01</p>
            <p class="mb-2" style="color: white"><i class="fa fa-envelope " style="color:#318093"></i> info@bolivebusinessinter.bj</p>
            <div class="d-flex mt-3">
                <a href="https://twitter.com/BoliveInter" class="btn btn-square mr-2" style="background-color:#318093; color:white"><i class="fab fa-twitter"></i></a>
                <a href="https://www.facebook.com/BoliveBusinessInter" class="btn btn-square mr-2" style="background-color:#318093; color:white"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/BoliveBusinessInter" class="btn btn-square mr-2" style="background-color:#318093; color:white"><i class="fab fa-instagram"></i></a>
                <a href="https://www.linkedin.com/company/bolivebusinessinter" class="btn btn-square" style="background-color:#318093; color:white"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>

        <!-- Useful Links -->
        <div class="col-md-2 mb-5">
            <h5 class="text-secondary text-uppercase mb-4">Liens Utiles</h5>
            <ul class="list-unstyled">
                <li><a class="text-secondary mb-2" href="/"><i class="fa fa-angle-right mr-2"></i>Accueil</a></li>
                <li><a class="text-secondary mb-2" href="<?php echo e(route('apropos')); ?>"><i class="fa fa-angle-right mr-2"></i>À propos de nous</a></li>
                <li><a class="text-secondary mb-2" href="<?php echo e(route('service')); ?>"><i class="fa fa-angle-right mr-2"></i>Nos Services</a></li>
                <li><a class="text-secondary" href="<?php echo e(route('contact')); ?>"><i class="fa fa-angle-right mr-2"></i>Contact</a></li>
            </ul>
        </div>

        <!-- Services Section -->
        <div class="col-md-2 mb-5">
            <h5 class="text-secondary text-uppercase mb-4">Nos Services</h5>
            <ul class="list-unstyled">
                <li><a class="text-secondary mb-2" href="/"><i class="fa fa-angle-right mr-2"></i>Vente & Location Immobilière</a></li>
                <li><a class="text-secondary mb-2" href="<?php echo e(route('service')); ?>"><i class="fa fa-angle-right mr-2"></i>Location de propriété</a></li>
                <li><a class="text-secondary" href="/"><i class="fa fa-angle-right mr-2"></i>Gestion de Propriétés</a></li>
            </ul>
        </div>

        <!-- About Section -->
        <div class="col-md-2 mb-5">
            <h5 class="text-secondary text-uppercase mb-4">À propos</h5>
            <ul class="list-unstyled">
                <li><a class="text-secondary mb-2" href="<?php echo e(route('apropos')); ?>"><i class="fa fa-angle-right mr-2"></i>Notre Mission</a></li>
                <li><a class="text-secondary mb-2" href="<?php echo e(route('apropos')); ?>"><i class="fa fa-angle-right mr-2"></i>Notre Équipe</a></li>
                <li><a class="text-secondary mb-2" href="<?php echo e(route('apropos')); ?>"><i class="fa fa-angle-right mr-2"></i>Partenariats</a></li>
                <li><a class="text-secondary mb-2" href="<?php echo e(route('apropos')); ?>"><i class="fa fa-angle-right mr-2"></i>Témoignages</a></li>
                <li><a class="text-secondary" href="<?php echo e(route('apropos')); ?>"><i class="fa fa-angle-right mr-2"></i>Nos Réalisations</a></li>
            </ul>
        </div>

        <!-- Contact Link -->
        <div class="col-md-2 mb-5">
            <h5 class="text-secondary text-uppercase mb-4">Contact</h5>
            <ul class="list-unstyled">
                <li><a class="text-secondary" href="<?php echo e(route('contact')); ?>"><i class="fa fa-angle-right mr-2"></i>Contactez-nous</a></li>
            </ul>
        </div>
    </div>

    <!-- Footer Legal Section -->
    <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="col-md-6 px-xl-0">
            <p class="mb-md-0 text-center text-md-left text-secondary">
                &copy; <a href="#" style="color: #318093">Bolive Business Inter</a>. Tous droits réservés. Conçu par
                <a href="https://www.bolivebusinessinter.bj" style="color: #318093">Bolive Business Inter</a>.
            </p>
        </div>
        <div class="col-md-6 px-xl-0 text-center text-md-right">
            <img class="img-fluid" src="img/payments.png" alt="">
        </div>
    </div>
</div>
<!-- Footer End -->
<?php /**PATH /home/espokeys/BBI/client/web/BBIAPP/BBI/resources/views/Layout/Frontend/Partials/footer.blade.php ENDPATH**/ ?>