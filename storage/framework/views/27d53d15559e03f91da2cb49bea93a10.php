<?php $__env->startSection('meta_title', $annonceDetail->titre); ?>
<?php $__env->startSection('meta_description', Str::limit($annonceDetail->description, 150)); ?>
<?php $__env->startSection('meta_keywords', 'immobilier, ' . $annonceDetail->typePropriete . ', annonces'); ?>
<?php $__env->startSection('og_title', $annonceDetail->titre); ?>
<?php $__env->startSection('og_description', Str::limit($annonceDetail->description, 150)); ?>
<?php $__env->startSection('og_url', url()->current()); ?>
<?php $__env->startSection('og_image', $annonceDetail->images->isNotEmpty() ? Storage::url($annonceDetail->images->first()->path) :
    asset('Frontend/Home/assets/imgs/default.jpg')); ?>


<?php $__env->startSection('content'); ?>
    <div class="container mt-5 mb-5">
        <div class="row g-4">
            <!-- Galerie d'images avec favoris -->
            <div class="col-md-7 position-relative">
                <h4 class="mb-3">Galerie d'images</h4>
                <div class="row g-2">
                    <?php if($annonceDetail->images->isNotEmpty()): ?>
                        <?php $__currentLoopData = $annonceDetail->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-6 col-md-4">
                                <a href="<?php echo e(Storage::url($image->path)); ?>" data-bs-toggle="lightbox" data-gallery="gallery">
                                    <img src="<?php echo e(Storage::url($image->path)); ?>" class="img-fluid rounded shadow"
                                        alt="Image <?php echo e($loop->index + 1); ?>" style="height: 150px; object-fit: cover;">
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="col-12">
                            <img src="<?php echo e(asset('Frontend/Home/assets/imgs/default.jpg')); ?>" alt="Image par défaut"
                                class="img-fluid rounded shadow" style="width: 100%; object-fit: cover;">
                        </div>
                    <?php endif; ?>
                </div>


            </div>

            <!-- Détails de l'annonce -->
            <div class="col-md-5">
                <h5><?php echo e($annonceDetail->titre); ?></h5>
                <h3 class="text-success"><?php echo e(number_format($annonceDetail->montant, 0, ',', ' ')); ?> XOF</h3>
                <p>
                    <strong>Type de transaction :</strong>
                    <span style="color: <?php echo e($annonceDetail->typeTransaction === 'A louer' ? 'green' : '#17a2b8'); ?>">
                        <?php echo e($annonceDetail->typeTransaction); ?>

                    </span>
                </p>
                <ul class="list-unstyled">
                    <li><strong>Titre :</strong> <?php echo e($annonceDetail->titre); ?></li>
                    <li><strong>Description :</strong> <?php echo e($annonceDetail->description); ?></li>
                    <li><strong>Type de propriété :</strong> <?php echo e($annonceDetail->typePropriete); ?></li>
                    <li><strong>Montant :</strong> <?php echo e($annonceDetail->montant); ?></li>
                    <li><strong>Superficie :</strong> <?php echo e($annonceDetail->superficie); ?> m²</li>
                    <li><strong>Nombre de chambres :</strong> <?php echo e($annonceDetail->nbChambres); ?></li>
                    <li><strong>Nombre de salles de bain :</strong> <?php echo e($annonceDetail->nbSalleDeDouche); ?></li>
                    <?php if($annonceDetail->veranda): ?>
                        <li><strong>Veranda :</strong> Oui</li>
                    <?php endif; ?>

                    <?php if($annonceDetail->terrasse): ?>
                        <li><strong>Terrasse :</strong> Oui</li>
                    <?php endif; ?>

                    <?php if($annonceDetail->cuisine): ?>
                        <li><strong>Cuisine :</strong> Oui</li>
                    <?php endif; ?>

                    <?php if($annonceDetail->dependance): ?>
                        <li><strong>Dépendance :</strong> Oui</li>
                    <?php endif; ?>

                    <?php if($annonceDetail->piscine): ?>
                        <li><strong>Piscine :</strong> Oui</li>
                    <?php endif; ?>

                    <?php if($annonceDetail->garage): ?>
                        <li><strong>Garage :</strong> Oui</li>
                    <?php endif; ?>

                    <?php if($annonceDetail->titreFoncier): ?>
                        <li><strong>Titre foncier :</strong> Oui</li>
                    <?php endif; ?>

                    <li><strong>Localité :</strong> <?php echo e($annonceDetail->localite); ?></li>
                </ul>


                <!-- Boutons d'action -->
                <div class="mt-4">
                    <?php if($annonceDetail->typeTransaction === 'A vendre'): ?>
                        <form action="<?php echo e(route('ajouterAuPanier', $annonceDetail->annonce_id)); ?>" method="POST"
                            class="d-inline">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-info"
                                style="border-radius: 25px; padding: 0.75rem 1.5rem;">
                                <i class="fas fa-shopping-cart me-2"></i>Acheter
                            </button>
                        </form>
                    <?php elseif($annonceDetail->typeTransaction === 'A louer'): ?>
                        <form action="<?php echo e(route('ajouterAuPanier', $annonceDetail->annonce_id)); ?>" method="POST"
                            class="d-inline">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-info"
                                style="border-radius: 25px; padding: 0.75rem 1.5rem;">
                                <i class="fas fa-check-circle me-2"></i>Louer
                            </button>
                        </form>
                    <?php endif; ?>

                    <a href="<?php echo e(route('messages.chat', $annonceDetail->user_id)); ?>">
                        <button class="btn btn-success" style="border-radius: 25px; padding: 0.75rem 1.5rem;">
                            <i class="fas fa-comment me-2"></i>Message
                        </button>
                    </a>

                    <!--  <a href="<?php echo e(route('annonce.carte', $annonceDetail->annonce_id)); ?>">
                                                                <button class="btn btn-dark" style="border-radius: 25px; padding: 0.75rem 1.5rem;">
                                                                    <i class="fas fa-search-plus me-2"></i>Visite 360°
                                                                </button>
                                                            </a>-->
                    </a>
                    <a href="javascript:void(0);">
                        <button id="share-btn" class="btn btn-dark" data-title="<?php echo e($annonceDetail->titre); ?>"
                            data-description="<?php echo e($annonceDetail->description); ?>"
                            data-type-propriete="<?php echo e($annonceDetail->typePropriete); ?>"
                            data-montant="<?php echo e($annonceDetail->montant); ?>" data-localite="<?php echo e($annonceDetail->localite); ?>"
                            data-url="<?php echo e(url()->current()); ?>"
                            data-image="<?php echo e($annonceDetail->images->isNotEmpty() ? url(Storage::url($annonceDetail->images->first()->path)) : url(asset('Frontend/Home/assets/imgs/default.jpg'))); ?>"
                            style="border-radius: 25px; padding: 0.75rem 1.5rem;">
                            <i class="fas fa-share me-2"></i>Partager
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>


     <!-- Modal de partage -->
     <div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-bottom">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="shareModalLabel">Partager cette annonce</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex flex-row justify-content-center gap-2">
                        <a id="facebook" target="_blank" class="share-icon" style="color: #3b5998;">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a id="twitter" target="_blank" class="share-icon" style="color: #1da1f2;">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a id="whatsapp" target="_blank" class="share-icon" style="color: #25d366;">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelector('#share-btn').addEventListener('click', function(event) {
            event.preventDefault();

            const url = this.dataset.url; // URL actuelle
            const title = this.dataset.title; // Titre de l'annonce
            const description = this.dataset.description; // Description de l'annonce
            const typePropriete = this.dataset.typePropriete; // Type de propriété
            const montant = this.dataset.montant; // Montant
            const localite = this.dataset.localite; // Localité
            const image = this.dataset.image; // Image de l'annonce

            // Contenu par défaut à ajouter à la fin
            const defaultInfo = `
        https://www.bolivebusinessinter.bj/annonce/eud-788/
        Infoline : wa.me/2290196910901
        (+229) 01 9691 0901 / (+229) 01 4015 6804
        E-mail : info@bolivebusinessinter.bj`;

            // Texte complet pour WhatsApp
            const whatsappText = `
        ${title}
        ${description}
        Type de propriété : ${typePropriete}
        Montant : ${montant}
        Localité : ${localite}

        Images: ${image}

        Lien : ${url}

        ${defaultInfo}
`;

            // Lien pour WhatsApp (inclut tous les éléments formatés)
            document.getElementById('whatsapp').href =
                `https://api.whatsapp.com/send?text=${encodeURIComponent(whatsappText)}`;

            // Affiche le modal
            new bootstrap.Modal(document.getElementById('shareModal')).show();
        });
    </script>






    <style>
        /* Modal style */
        .modal-bottom .modal-content {
            border-radius: 8px;
            width: 100%;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            margin: 0;
            border-radius: 10px 10px 0 0;
            animation: slideUp 0.3s ease-in-out;
        }

        @keyframes slideUp {
            from {
                transform: translateY(100%);
            }

            to {
                transform: translateY(0);
            }
        }

        /* Social media icon style */
        .share-icon {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #555;
            margin: 0 5px;
        }

        .share-icon i {
            font-size: 30px;
            margin-right: 4px;
        }

        .modal-body a {
            width: 40px;
            height: 40px;
            padding: 5px;
            background-color: #f0f0f0;
            border-radius: 10px;
            margin: 5px;
            transition: background-color 0.3s ease;
        }

        .modal-body a:hover {
            background-color: #d1d1d1;
        }
    </style>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layout.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/espokeys/BBI/client/web/BBIAPP/BBI/resources/views/Layout/Frontend/Annonce/annonces-details.blade.php ENDPATH**/ ?>