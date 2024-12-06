<?php $__env->startSection('content'); ?>
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
            style="background-image: url('<?php echo e(asset('Frontend/Home/assets/imgs/property-04.jpg')); ?>');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                <h2>Discutez avec l'agent</h2>
                <ol>
                    <li><a href="index.html">Offre</a></li>
                    <li>Chat</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->

        <section >
            <div class="container py-5" >
                <div class="row d-flex justify-content-center" >
                    <div class="col-md-12 col-lg-10 col-xl-9" >
                        <div class="card" id="chat1" style="border-radius: 15px; ">
                            <!-- Header -->
                            <div class="card-header d-flex justify-content-between align-items-center p-3 bg-info text-white border-bottom-0"
                                style="border-top-left-radius: 15px; border-top-right-radius: 15px;">

                                <a href="javascript:void(0);" onclick="history.back();" class="btn btn-secondary" style="border-radius: 25px; padding: 0.5rem 1rem;">
                                    <i class="fas fa-angle-left me-2"></i>Retour
                                </a>

                                <p class="mb-0 fw-bold">Chat avec <?php echo e($receiver->nom); ?> (<?php echo e($receiver->email); ?>)</p>
                                <i class="fas fa-times"></i>
                            </div>

                            <!-- Messages -->
                            <div class="card-body" id="chatBox">
                                <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div
                                        class="d-flex flex-row <?php echo e($message->sender_id === auth()->id() ? 'justify-content-end' : 'justify-content-start'); ?> mb-4">

                                        <div class="p-3 <?php echo e($message->sender_id === auth()->id() ? 'me-3 bg-body-tertiary' : 'ms-3'); ?>"
                                            style="border-radius: 15px; background-color: <?php echo e($message->sender_id === auth()->id() ? '#f0f0f0' : 'rgba(57, 192, 237, .2)'); ?>;">
                                            <p class="small mb-0"><?php echo e($message->content); ?></p>
                                        </div>

                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                            <!-- Formulaire d'envoi -->
                            <div class="card-footer">
                                <form action="<?php echo e(route('messages.send', $receiver->user_id)); ?>" method="POST"
                                    class="d-flex align-items-center">
                                    <?php echo csrf_field(); ?>
                                    <textarea name="content" class="form-control me-2" rows="3" placeholder="Écrivez votre message..." required></textarea>
                                    <button type="submit" class="btn btn-primary"><i
                                            class="fas fa-paper-plane"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <style>
            #chatBox {
                max-height: 600px;
                /* Increased chatbox height */
                overflow-y: auto;
                scroll-behavior: smooth;
            }

            .bg-body-tertiary {
                background-color: #f8f9fa;
                /* Couleur de fond neutre */
            }

            .card-header {
                font-size: 1.25rem;
                /* Larger header font size */
            }

            .card-body p {
                font-size: 1.2rem;
                /* Plus grande police pour les messages */
            }

            .card-footer form textarea {
                font-size: 1.125rem;
                /* Plus grande taille de police pour la saisie */
            }

            .btn-primary {
                font-size: 1.5rem;
                /* Plus grande taille de police pour le bouton */
            }
        </style>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layout.lending_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/espokeys/BBI/client/web/BBIAPP/BBI/resources/views/messages/chat.blade.php ENDPATH**/ ?>