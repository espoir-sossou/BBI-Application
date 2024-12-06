<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle annonce créée</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 24px;
            color: #333333;
        }
        .content {
            margin-top: 20px;
        }
        .content p {
            font-size: 16px;
            color: #555555;
        }
        .content .highlight {
            font-weight: bold;
            color: #007bff;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 14px;
            color: #777777;
        }
        .button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Nouvelle annonce créée</h1>

        <div class="content">
            <p>Bonjour,</p>
            <p>Une nouvelle annonce a été créée par un utilisateur dans votre système. Voici les détails de cette annonce :</p>

            <ul>
                <li><span class="highlight">Titre de l'annonce :</span> <?php echo e($OffreEnVedette->titre); ?></li>
                <li><span class="highlight">Description :</span> <?php echo e($OffreEnVedette->description); ?></li>
                <li><span class="highlight">Montant :</span> <?php echo e(number_format($OffreEnVedette->prix, 2, ',', ' ')); ?> FCFA</li>
                <li><span class="highlight">Localité :</span> <?php echo e($OffreEnVedette->localite); ?></li>
                <li><span class="highlight">Type de transaction :</span> <?php echo e($OffreEnVedette->typeTransaction); ?></li>
                <li><span class="highlight">Date de création :</span> <?php echo e($OffreEnVedette->dateCreation->format('d-m-Y H:i')); ?></li>
            </ul>

            <p>Merci de vérifier l'annonce dans votre tableau de bord pour plus de détails et approbation.</p>

            <a href="" class="button">Voir l'annonce</a>
        </div>

        <div class="footer">
            <p>Si vous avez des questions, veuillez nous contacter à l'adresse <a href="mailto:support@votresite.com">support@votresite.com</a>.</p>
            <p>&copy; <?php echo e(date('Y')); ?> VotreEntreprise. Tous droits réservés.</p>
        </div>
    </div>
</body>
</html>
<?php /**PATH /home/espokeys/BBI/client/web/BBIAPP/BBI/resources/views/emails/new_offre_en_vedette_created.blade.php ENDPATH**/ ?>