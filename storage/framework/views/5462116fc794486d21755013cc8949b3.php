<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <h1 class="text-center my-4">Carte de l'Annonce</h1>
    <div id="map" style="height: 500px;"></div>
</div>

<script>
    function initMap() {
        // Initialisation de la carte
        const map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: <?php echo e($annonceDetail->latitude); ?>, lng: <?php echo e($annonceDetail->longitude); ?> },
            zoom: 15, // Zoom sur l'annonce
        });

        // Ajout du marqueur pour l'annonce spécifique
        const marker = new google.maps.Marker({
            position: {
                lat: parseFloat(<?php echo e($annonceDetail->latitude); ?>),
                lng: parseFloat(<?php echo e($annonceDetail->longitude); ?>)
            },
            map: map,
            title: "<?php echo e($annonceDetail->titre); ?>",
        });

        // Ajouter une infobulle pour l'annonce
        const infoWindow = new google.maps.InfoWindow({
            content: `
                <h5><?php echo e($annonceDetail->titre); ?></h5>
                <p><?php echo e($annonceDetail->description); ?></p>
                <p><strong>Localité :</strong> <?php echo e($annonceDetail->localite); ?></p>
                <p><strong>Montant :</strong> <?php echo e(number_format($annonceDetail->montant, 0, ',', ' ')); ?> XOF</p>
            `,
        });

        marker.addListener("click", () => {
            infoWindow.open(map, marker);
        });
    }
</script>

<!-- Script Google Maps avec votre clé API -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBrntgALGzUGdJNxYhC5Nb_rOmSxhuRsZM&callback=initMap" async defer></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layout.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/espokeys/BBI/client/web/BBIAPP/BBI/resources/views/map/show-annonce-carte.blade.php ENDPATH**/ ?>