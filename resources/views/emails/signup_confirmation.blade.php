<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation d'Inscription</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Arial', sans-serif;
        }

        .card {
            border-radius: 10px;
            overflow: hidden;
        }

        .card-header {
            background-color: #28a745;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .card-body {
            padding: 30px;
        }

        .card-body h2 {
            color: #333;
            font-size: 24px;
            font-weight: bold;
        }

        .card-body p {
            font-size: 16px;
            color: #555;
        }

        .btn-custom {
            background-color: #28a745;
            color: white;
            padding: 10px 30px;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-custom:hover {
            background-color: #218838;
        }

        .logo {
            width: 150px;
            margin-bottom: 20px;
        }

        .footer {
            text-align: center;
            font-size: 14px;
            color: #888;
            margin-top: 40px;
        }

        .footer a {
            color: #28a745;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <div class="container py-5">
        <div class="card shadow-lg">
            <div class="card-header">
                <img src="Frontend/Home/assets/imgs/logo_bbi.png" alt="Logo" class="logo">
                <h3>Bienvenue chez Bolivie Business Inter !</h3>
            </div>
            <div class="card-body text-center">
                <h2 class="text-success">Bonjour {{ $prenom }} !</h2>
                <p class="my-3">Votre compte a été créé avec succès sur notre plateforme.</p>
                <p><strong>Email :</strong> {{ $email }}</p>
                <p><strong>Mot de passe :</strong> {{ $password }}</p>
                <a href="{{ url('/login-page') }}" class="btn-custom mt-3">Se connecter</a>
            </div>
        </div>

        <div class="footer">
            <p>Si vous avez des questions, n'hésitez pas à <a href="mailto:support@societe.com">nous contacter</a>.</p>
        </div>
    </div>

</body>

</html>
