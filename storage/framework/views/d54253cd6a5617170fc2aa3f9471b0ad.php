<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <div class="row g-4 align-items-center">
            <!-- Image de l'annonce -->
            <div class="col-md-6 d-flex justify-content-center">
                <img src="<?php echo e(asset('storage/' . $annonce->image)); ?>" alt="<?php echo e($annonce->titre); ?>"
                    class="img-fluid rounded shadow" style="max-height: 500px; object-fit: cover; width: 100%;">
            </div>

            <!-- Détails de l'annonce -->
            <div class="col-md-6">
                <h4 class="mb-3"><?php echo e($annonce->titre); ?></h4>
                <h3 class="text-success mb-3"><?php echo e(number_format($annonce->montant, 0, ',', ' ')); ?> XOF</h3>
                <p>
                    <strong>Type de transaction :</strong>
                    <span style="color: <?php echo e($annonce->typeTransaction === 'A louer' ? 'green' : '#17a2b8'); ?>">
                        <?php echo e($annonce->typeTransaction); ?>

                    </span>
                </p>

                <!-- Liste des informations -->
                <ul class="list-unstyled mt-4">
                    <li><strong>Description :</strong> <?php echo e($annonce->description); ?></li>
                    <li><strong>Type de propriété :</strong> <?php echo e($annonce->typePropriete); ?></li>
                    <li><strong>Superficie :</strong> <?php echo e($annonce->superficie); ?> m²</li>
                    <li><strong>Nombre de chambres :</strong> <?php echo e($annonce->nbChambres); ?></li>
                    <li><strong>Nombre de salles de bain :</strong> <?php echo e($annonce->nbSalleDeDouche); ?></li>
                    <li><strong>Véranda :</strong> <?php echo e($annonce->veranda ? 'Oui' : 'Non'); ?></li>
                    <li><strong>Terrasse :</strong> <?php echo e($annonce->terrasse ? 'Oui' : 'Non'); ?></li>
                    <li><strong>Cuisine :</strong> <?php echo e($annonce->cuisine ? 'Oui' : 'Non'); ?></li>
                    <li><strong>Dépendance :</strong> <?php echo e($annonce->dependance ? 'Oui' : 'Non'); ?></li>
                    <li><strong>Piscine :</strong> <?php echo e($annonce->piscine ? 'Oui' : 'Non'); ?></li>
                    <li><strong>Garage :</strong> <?php echo e($annonce->garage ? 'Oui' : 'Non'); ?></li>
                    <li><strong>Titre foncier :</strong> <?php echo e($annonce->titreFoncier ? 'Oui' : 'Non'); ?></li>
                    <li><strong>Localité :</strong> <?php echo e($annonce->localite); ?></li>
                </ul>

                <!-- Boutons -->
                <div class="mt-4 d-flex gap-2">
                    <a href="#" class="btn btn-success btn-lg" style="border-radius: 25px;">
                        <i class="fas fa-check-circle me-2"></i>A Louer
                    </a>
                    <a href="#" class="btn btn-info btn-lg" style="border-radius: 25px;">
                        <i class="fas fa-shopping-cart me-2"></i>Acheter
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom CSS -->
    <style>
        @media (max-width: 768px) {
            .row.g-4>div {
                margin-bottom: 1.5rem;
            }
        }

        .btn-lg {
            font-size: 1rem;
            padding: 0.75rem 1.5rem;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layout.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/espokeys/BBI/client/web/BBIAPP/BBI/resources/views/Annonce/annonces-details.blade.php ENDPATH**/ ?>