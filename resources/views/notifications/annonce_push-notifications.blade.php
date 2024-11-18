<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <style>
        .toast {
            position: fixed;
            top: 10px;
            right: 10px;
            background-color: #ff9800;
            color: white;
            padding: 10px;
            border-radius: 5px;
            opacity: 0.9;
            transition: opacity 1s ease-out;
        }
    </style>
</head>
<body>

    <div id="notifications-container"></div>

    <script>
        function showNotification(message) {
            const notificationElement = document.createElement('div');
            notificationElement.classList.add('toast');
            notificationElement.textContent = message;
            document.getElementById('notifications-container').appendChild(notificationElement);

            // Faire disparaître la notification après 5 secondes
            setTimeout(() => {
                notificationElement.remove();
            }, 5000);
        }

        // Simuler la réception d'une notification push
        showNotification('Une nouvelle annonce a été créée !');
    </script>
</body>
</html>
