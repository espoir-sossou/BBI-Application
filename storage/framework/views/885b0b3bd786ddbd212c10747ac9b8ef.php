<?php $__env->startSection('content'); ?>
    <div class="container mt-5 mb-5" >
        <div class="row g-4 align-items-center mb-5">
            <!-- Image de l'annonce -->
            <div class="col-md-6 d-flex justify-content-center">
                <img src="<?php echo e(asset('storage/' . $annonceDetail->image)); ?>" alt="<?php echo e($annonceDetail->titre); ?>"
                    class="img-fluid rounded shadow" style="max-height: 500px; object-fit: cover; width: 100%;">
            </div>

            <!-- Détails de l'annonce -->
            <div class="col-md-6">
                <h5 class="mb-3"><?php echo e($annonceDetail->titre); ?></h5>
                <h3 class="text-success mb-3"><?php echo e(number_format($annonceDetail->montant, 0, ',', ' ')); ?> XOF</h3>
                <p>
                    <strong>Type de transaction :</strong>
                    <span style="color: <?php echo e($annonceDetail->typeTransaction === 'A louer' ? 'green' : '#17a2b8'); ?>">
                        <?php echo e($annonceDetail->typeTransaction); ?>

                    </span>
                </p>

                <!-- Liste des informations -->
                <ul class="list-unstyled mt-4">
                    <li><strong>Description :</strong> <?php echo e($annonceDetail->description); ?></li>
                    <li><strong>Type de propriété :</strong> <?php echo e($annonceDetail->typePropriete); ?></li>
                    <li><strong>Superficie :</strong> <?php echo e($annonceDetail->superficie); ?> m²</li>
                    <li><strong>Nombre de chambres :</strong> <?php echo e($annonceDetail->nbChambres); ?></li>
                    <li><strong>Nombre de salles de bain :</strong> <?php echo e($annonceDetail->nbSalleDeDouche); ?></li>
                    <li><strong>Véranda :</strong> <?php echo e($annonceDetail->veranda ? 'Oui' : 'Non'); ?></li>
                    <li><strong>Terrasse :</strong> <?php echo e($annonceDetail->terrasse ? 'Oui' : 'Non'); ?></li>
                    <li><strong>Cuisine :</strong> <?php echo e($annonceDetail->cuisine ? 'Oui' : 'Non'); ?></li>
                    <li><strong>Dépendance :</strong> <?php echo e($annonceDetail->dependance ? 'Oui' : 'Non'); ?></li>
                    <li><strong>Piscine :</strong> <?php echo e($annonceDetail->piscine ? 'Oui' : 'Non'); ?></li>
                    <li><strong>Garage :</strong> <?php echo e($annonceDetail->garage ? 'Oui' : 'Non'); ?></li>
                    <li><strong>Titre foncier :</strong> <?php echo e($annonceDetail->titreFoncier ? 'Oui' : 'Non'); ?></li>
                    <li><strong>Localité :</strong> <?php echo e($annonceDetail->localite); ?></li>
                </ul>

                <!-- Boutons -->
                <div class="mt-4 d-flex gap-2">
                    <form action="<?php echo e(route('ajouterAuPanier', $annonceDetail->annonce_id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-success btn-lg" style="border-radius: 25px;">
                            <i class="fas fa-check-circle me-2"></i>A Louer
                        </button>
                    </form>
                    <form action="<?php echo e(route('ajouterAuPanier', $annonceDetail->annonce_id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-info btn-lg" style="border-radius: 25px;">
                            <i class="fas fa-shopping-cart me-2"></i>Acheter
                        </button>
                    </form>
                </div>
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

<?php echo $__env->make('Layout.annonce_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/espokeys/BBI/client/web/BBIAPP/BBI/resources/views/annonces-details.blade.php ENDPATH**/ ?>