@extends('Layout.lending_layout')

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
            style="background-image: url('{{ asset('Frontend/Home/assets/imgs/aub25.jpg') }}');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                <h2>Services</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Services</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Section Services ======= -->
        <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">

                <!-- Header de la section -->
                <div class="section-header">
                    <h2>Nos Services</h2>
                    <p>Bolive Business Inter vous accompagne avec des solutions sur mesure dans l’immobilier, la location de
                        véhicules et bien plus, grâce à notre expertise internationale.</p>
                </div>

                <!-- Liste des services -->
                <div class="row gy-4">

                    <!-- Service 1 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item">
                            <div class="icon">
                                <i class="bi bi-house-door-fill"></i>
                            </div>
                            <h3>Immobilier</h3>
                            <p>
                                Vente et achat de parcelles et maisons, construction de bâtiments, location de biens
                                immobiliers (maisons, bureaux, entrepôts) pour des particuliers et des entreprises.
                            </p>
                        </div>
                    </div>

                    <!-- Service 2 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item">
                            <div class="icon">
                                <i class="bi bi-building"></i>
                            </div>
                            <h3>Immobilier Professionnel</h3>
                            <p>
                                Un large choix de biens commerciaux et industriels : locaux, terrains, fonds de commerce,
                                bureaux pour des PME, grandes entreprises et investisseurs.
                            </p>
                        </div>
                    </div>

                    <!-- Service 3 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item">
                            <div class="icon">
                                <i class="bi bi-car-front-fill"></i>
                            </div>
                            <h3>Location de Véhicules</h3>
                            <p>
                                Location de véhicules de toutes gammes avec ou sans chauffeurs, adaptés à vos besoins
                                personnels ou professionnels pour un service haut de gamme.
                            </p>
                        </div>
                    </div>

                    <!-- Service 4 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item">
                            <div class="icon">
                                <i class="bi bi-clipboard-data"></i>
                            </div>
                            <h3>Conseil et Accompagnement</h3>
                            <p>
                                Expertise en négociation, accompagnement juridique et financier, et gestion des démarches
                                jusqu'à la finalisation des actes notariés.
                            </p>
                        </div>
                    </div>

                    <!-- Service 5 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item">
                            <div class="icon">
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>
                            <h3>Dimension Internationale</h3>
                            <p>
                                Une expertise éprouvée dans plusieurs pays de la sous-région (Congo, Gabon, Bénin, etc.),
                                mobilisée pour des projets complexes avec des équipes spécialisées.
                            </p>
                        </div>
                    </div>

                    <!-- Service 6 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item">
                            <div class="icon">
                                <i class="bi bi-check2-circle"></i>
                            </div>
                            <h3>Engagement et Qualité</h3>
                            <p>
                                Un service personnalisé avec un suivi rigoureux pour garantir la satisfaction totale de nos
                                partenaires et clients.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- Fin Section Services -->



        <!-- ======= Section Cartes de Services ======= -->
        <section id="services-cards" class="services-cards">
            <div class="container" data-aos="fade-up">

                <div class="row gy-4">

                    <!-- Service : Gestion Immobilière -->
                    <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                        <h3>Gestion Immobilière</h3>
                        <p>Nous vous accompagnons dans vos projets immobiliers grâce à une expertise locale et
                            internationale.</p>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-check2"></i> <span>Achat et vente de propriétés</span></li>
                            <li><i class="bi bi-check2"></i> <span>Location de maisons et bureaux</span></li>
                            <li><i class="bi bi-check2"></i> <span>Négociation et acte notarié</span></li>
                        </ul>
                    </div><!-- Fin Élément -->

                    <!-- Service : Location de Véhicules -->
                    <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                        <h3>Location de Véhicules</h3>
                        <p>Profitez de notre service de location de véhicules haut de gamme, adaptés à vos besoins
                            professionnels.</p>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-check2"></i> <span>Véhicules avec chauffeur</span></li>
                            <li><i class="bi bi-check2"></i> <span>Options pour entreprises et particuliers</span></li>
                            <li><i class="bi bi-check2"></i> <span>Solutions flexibles et personnalisées</span></li>
                        </ul>
                    </div><!-- Fin Élément -->

                    <!-- Service : Construction et Aménagement -->
                    <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                        <h3>Construction et Aménagement</h3>
                        <p>Transformez vos idées en réalité grâce à nos solutions fiables et respectueuses de
                            l’environnement.</p>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-check2"></i> <span>Conception et construction de bâtiments</span></li>
                            <li><i class="bi bi-check2"></i> <span>Travaux d’aménagement sur mesure</span></li>
                            <li><i class="bi bi-check2"></i> <span>Expertise en matériaux durables</span></li>
                        </ul>
                    </div><!-- Fin Élément -->

                    <!-- Service : Conseil et Partenariat -->
                    <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="400">
                        <h3>Conseil et Partenariat</h3>
                        <p>Faites confiance à notre réseau international pour des solutions financières et juridiques
                            adaptées.</p>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-check2"></i> <span>Avis de valeur locatif ou de vente</span></li>
                            <li><i class="bi bi-check2"></i> <span>Partenariats avec des experts locaux</span></li>
                            <li><i class="bi bi-check2"></i> <span>Accompagnement juridique et financier</span></li>
                        </ul>
                    </div><!-- Fin Élément -->

                    <!-- Service : Expertise Technique -->
                    <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="500">
                        <h3>Expertise Technique</h3>
                        <p>Bénéficiez de notre savoir-faire technique pour des projets complexes à l'échelle internationale.
                        </p>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-check2"></i> <span>Équipes spécialisées sur le terrain</span></li>
                            <li><i class="bi bi-check2"></i> <span>Solutions adaptées aux grandes entreprises</span></li>
                            <li><i class="bi bi-check2"></i> <span>Gestion de projets internationaux</span></li>
                        </ul>
                    </div><!-- Fin Élément -->

                    <!-- Service : Services aux Investisseurs -->
                    <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="600">
                        <h3>Services aux Investisseurs</h3>
                        <p>Optimisez vos investissements grâce à nos services dédiés aux professionnels et aux entreprises.
                        </p>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-check2"></i> <span>Gestion de biens commerciaux</span></li>
                            <li><i class="bi bi-check2"></i> <span>Études de faisabilité</span></li>
                            <li><i class="bi bi-check2"></i> <span>Suivi et rentabilisation des projets</span></li>
                        </ul>
                    </div><!-- Fin Élément -->

                </div>

            </div>
        </section><!-- Fin Section Cartes de Services -->


        <!-- ======= Section Services Alternatifs 2 ======= -->
        <section id="alt-services-2" class="alt-services section-bg">
            <div class="container" data-aos="fade-up">

                <div class="row justify-content-around gy-4">
                    <div class="col-lg-5 d-flex flex-column justify-content-center">
                        <h3>Des services d’excellence pour vos projets</h3>
                        <p>Chez Bolive Business Inter, nous offrons des solutions adaptées à vos besoins, en alliant
                            innovation, expertise et engagement durable.</p>

                        <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="100">
                            <i class="bi bi-house flex-shrink-0"></i>
                            <div>
                                <h4><a href="" class="stretched-link">Gestion Immobilière</a></h4>
                                <p>Des services complets pour la location, l'achat et la vente de propriétés adaptées à vos
                                    objectifs personnels ou professionnels.</p>
                            </div>
                        </div><!-- Fin Icon Box -->

                        <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="200">
                            <i class="bi bi-car-front flex-shrink-0"></i>
                            <div>
                                <h4><a href="" class="stretched-link">Location de Véhicules</a></h4>
                                <p>Une flotte variée de véhicules de toutes gammes, disponibles avec chauffeur, pour
                                    répondre à vos besoins de mobilité.</p>
                            </div>
                        </div><!-- Fin Icon Box -->

                        <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-gear flex-shrink-0"></i>
                            <div>
                                <h4><a href="" class="stretched-link">Construction et Aménagement</a></h4>
                                <p>Un accompagnement technique de la conception à la réalisation pour des projets fiables et
                                    respectueux des normes.</p>
                            </div>
                        </div><!-- Fin Icon Box -->

                        <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-leaf flex-shrink-0"></i>
                            <div>
                                <h4><a href="" class="stretched-link">Engagement Durable</a></h4>
                                <p>Des pratiques écologiques et des partenariats responsables pour des solutions pérennes et
                                    respectueuses de l’environnement.</p>
                            </div>
                        </div><!-- Fin Icon Box -->
                    </div>

                    <div class="col-lg-6 img-bg"
                        style="background-image: url({{ asset('Frontend/Home/assets/imgs/aub21.jpg') }});"
                        data-aos="zoom-in" data-aos-delay="100"></div>
                </div>

            </div>
        </section><!-- Fin Section Services Alternatifs 2 -->

        <!-- ======= Section Témoignages ======= -->
        <section id="testimonials" class="testimonials section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Témoignages</h2>
                    <p>Ce que nos clients disent de nous témoigne de notre engagement à offrir des services de qualité
                        exceptionnelle et adaptés à leurs besoins.</p>
                </div>

                <div class="slides-2 swiper">
                    <div class="swiper-wrapper">

                        <!-- Témoignage 1 -->
                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <img src="{{ asset('Frontend/Home/assets/imgs/f5.jpg') }}" class="testimonial-img"
                                        alt="">
                                    <h3>Jean Dupont</h3>
                                    <h4>Investisseur Immobilier</h4>
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        Grâce à Bolive Business Inter, j'ai trouvé des opportunités incroyables et sécurisé
                                        mes investissements immobiliers. Un accompagnement remarquable !
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Témoignage 2 -->
                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <img src="{{ asset('Frontend/Home/assets/imgs/h6.jpg') }}" class="testimonial-img"
                                        alt="">
                                    <h3>Marie Lemoine</h3>
                                    <h4>Directrice d'Entreprise</h4>
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        Une équipe professionnelle et proactive. Ils ont compris nos besoins et trouvé les
                                        locaux parfaits pour notre activité.
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Témoignage 3 -->
                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <img src="{{ asset('Frontend/Home/assets/imgs/f13.jpg') }}" class="testimonial-img"
                                        alt="">
                                    <h3>Aliou Traoré</h3>
                                    <h4>Entrepreneur</h4>
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        Leur expertise m'a permis de réaliser mes projets immobiliers dans des délais
                                        serrés. Un service digne de confiance !
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Témoignage 4 -->
                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <img src="{{ asset('Frontend/Home/assets/imgs/h13.jpg') }}" class="testimonial-img"
                                        alt="">
                                    <h3>Sophie Martin</h3>
                                    <h4>Particulière</h4>
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        Trouver la maison idéale n'a jamais été aussi simple. Merci pour votre patience et
                                        votre professionnalisme !
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Témoignage 5 -->
                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <img src="{{ asset('Frontend/Home/assets/imgs/h15.jpg') }}" class="testimonial-img"
                                        alt="">
                                    <h3>Mohamed Diallo</h3>
                                    <h4>Manager Logistique</h4>
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        La location de véhicules a été une solution clé pour nos besoins professionnels. Un
                                        service de grande qualité, sans compromis.
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section>
        <!-- Fin Section Témoignages -->



    </main><!-- End #main -->
@endsection
