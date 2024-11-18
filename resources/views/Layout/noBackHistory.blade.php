<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolivie Business Inter</title>
</head>
<body>
    <!-- Votre contenu HTML ici -->

    <!-- Ajout du script JavaScript pour empêcher l'utilisation du bouton retour -->
    <script>
        if (window.history && window.history.pushState) {
            // Désactive le bouton retour
            window.history.pushState(null, null, window.location.href);
            window.onpopstate = function () {
                window.history.pushState(null, null, window.location.href);
            };
        }
    </script>
</body>
</html>
