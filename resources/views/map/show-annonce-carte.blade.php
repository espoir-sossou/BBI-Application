@extends('Layout.home')

@section('content')

<div class="container-fluid">
    <h1 class="text-center my-4">Carte de l'Annonce</h1>
    <div id="map" style="height: 500px;"></div>
</div>

<script>
    function initMap() {
        // Initialisation de la carte
        const map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: {{ $annonceDetail->latitude }}, lng: {{ $annonceDetail->longitude }} },
            zoom: 15, // Zoom sur l'annonce
        });

        // Ajout du marqueur pour l'annonce spécifique
        const marker = new google.maps.Marker({
            position: {
                lat: parseFloat({{ $annonceDetail->latitude }}),
                lng: parseFloat({{ $annonceDetail->longitude }})
            },
            map: map,
            title: "{{ $annonceDetail->titre }}",
        });

        // Ajouter une infobulle pour l'annonce
        const infoWindow = new google.maps.InfoWindow({
            content: `
                <h5>{{ $annonceDetail->titre }}</h5>
                <p>{{ $annonceDetail->description }}</p>
                <p><strong>Localité :</strong> {{ $annonceDetail->localite }}</p>
                <p><strong>Montant :</strong> {{ number_format($annonceDetail->montant, 0, ',', ' ') }} XOF</p>
            `,
        });

        marker.addListener("click", () => {
            infoWindow.open(map, marker);
        });
    }
</script>

<!-- Script Google Maps avec votre clé API -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBrntgALGzUGdJNxYhC5Nb_rOmSxhuRsZM&callback=initMap" async defer></script>

@endsection
