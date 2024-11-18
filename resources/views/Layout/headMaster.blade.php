<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Bolivie Business Inter</title>
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('Frontend/Home/assets/imgs/logo_bbi.png') }}">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free HTML Templates" name="keywords">
        <meta content="Free HTML Templates" name="description">



    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="Generales/Villa/assets/css/fontawesome.css">
    <link rel="stylesheet" href="Generales/Villa/assets/css/templatemo-villa-agency.css">
    <link rel="stylesheet" href="Generales/Villa/assets/css/owl.css">
    <link rel="stylesheet" href="Generales/Villa/assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>



    <link rel="stylesheet" href="Auberge/css/style.css">
    <link rel="stylesheet" href="Auberge/css/responsive.css">




        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-GLhlTQ8iK7ZWiPhedFtL0tcve5T9SAn5CkL1nK8n9tiD7FmW/6Z/hRTt8+pR6L4N" crossorigin="anonymous">



        <script src="Generales/js/headMaster_style.js" defer></script>

        <!-- Libraries Stylesheet -->
        <link href="Generales/lib/animate/animate.min.css" rel="stylesheet">
        <link href="Generales/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="Generales/css/style.css" rel="stylesheet">
        <link href="Generales/css/headMaster_style.css" rel="stylesheet">

         <!-- Font Awesome -->
         <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
         <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12" ></script>
         <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


         <script src="Hotels/js/style.js" defer></script>


    </head>
<body>


@include('Layout.Frontend.Partials.loginPage.navbar')

@yield('content')

<!-- Back to Top -->
<a href="#" class="btn  back-to-top" style="background-color:#fd7e14; color:white"><i class="fa fa-angle-double-up"></i></a>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>-->

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $('document').ready(function(){
            $('#LatitudeArea').addClass('d-none');
            $('#LongitudeArea').addClass('d-none');
        });

        function initialize() {
            var input = document.getElementById('autocomplete');
            var autocomplete = new google.maps.places.Autocomplete(input);

            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();
                $('#Latitude').val(place.geometry.location.lat());
                $('#Longitude').val(place.geometry.location.lng());

                $('#LatitudeArea').removeClass('d-none');
                $('#LongitudeArea').removeClass('d-none');
            });
        }

        // Chargement de l'API Google Maps avec un rappel
        function loadGoogleMapsScript() {
            var script = document.createElement('script');
            script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAz3Q9nPrMRUSzdHHngY-LFdOWe_EGNVeM&libraries=places&callback=initialize';
            script.async = true;
            script.defer = true;
            document.head.appendChild(script);
        }

        // Appel de la fonction pour charger l'API
        loadGoogleMapsScript();
    </script>

   <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

</body>
</html>
