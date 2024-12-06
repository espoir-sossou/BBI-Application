@extends('Layout.lending_layout')

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
            style="background-image: url('{{ asset('Frontend/Lending/assets/img/breadcrumbs-bg.jpg') }}');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                <h2>Carte des Annonces</h2>
                <ol>
                    <li><a href="index.html">Offre</a></li>
                    <li>Carte</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->

        <div class="container-fluid " style="margin-bottom:450px">
            <h1 class="text-center my-4">Carte </h1>
            <div id="map" style="height: 800px;"></div>
        </div>

        <script>
            function initMap() {
                // Initialisation de la carte
                const map = new google.maps.Map(document.getElementById("map"), {
                    center: {
                        lat: 0,
                        lng: 0
                    }, // Coordonnées centrales par défaut
                    zoom: 2, // Zoom initial
                });

                // Récupérer les annonces depuis le contrôleur
                const annonces = @json($annonces); // Conversion des annonces PHP en format JavaScript

                // Ajout des marqueurs pour chaque annonce validée
                annonces.forEach(annonce => {
                    if (annonce.latitude && annonce.longitude) {
                        const marker = new google.maps.Marker({
                            position: {
                                lat: parseFloat(annonce.latitude),
                                lng: parseFloat(annonce.longitude)
                            },
                            map: map,
                            title: annonce.titre,
                        });

                        // Ajouter une infobulle pour chaque annonce
                        const infoWindow = new google.maps.InfoWindow({
                            content: `
                        <h5>${annonce.titre}</h5>
                        <p>${annonce.description}</p>
                        <p><strong>Localité :</strong> ${annonce.localite}</p>
                        <p><strong>Montant :</strong> ${annonce.montant} FCFA</p>
                    `,
                        });

                        marker.addListener("click", () => {
                            infoWindow.open(map, marker);
                        });
                    }
                });
            }
        </script>

        <!-- Script Google Maps avec votre clé API -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBrntgALGzUGdJNxYhC5Nb_rOmSxhuRsZM&callback=initMap" async
            defer></script>

    </main>
@endsection
