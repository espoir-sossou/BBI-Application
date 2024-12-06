<?php $__env->startSection('content'); ?>
    <div class="container py-5">
        <div class="card" id="chatBox" style="border-radius: 15px;">
            <!-- Header -->
            <div class="card-header d-flex justify-content-between align-items-center p-3 bg-info text-white">
                <p class="mb-0 fw-bold">Chat avec <?php echo e($receiver->prenom); ?> (<?php echo e($receiver->email); ?>)</p>
            </div>

            <!-- Affichage des messages -->
            <div class="card-body" id="messagesContainer"
                style="max-height: 400px; overflow-y: auto; scroll-behavior: smooth;">
                <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="message <?php echo e($message->sender_id === session('user_id') ? 'sent' : 'received'); ?>">
                        <p><?php echo e($message->content); ?></p>
                        <small><?php echo e($message->created_at->format('d/m/Y H:i')); ?></small>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <!-- Formulaire d'envoi -->
            <div class="card-footer">
                <form action="<?php echo e(route('agence.messages.send', ['receiver_id' => $receiver->user_id])); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <textarea name="content" rows="3" class="form-control" placeholder="Écrivez votre message..." required></textarea>
                    <button type="submit" class="btn btn-primary mt-2"><i class="fas fa-paper-plane"></i></button>
                </form>
            </div>
        </div>
    </div>

    <style>
        #chatBox {
            border-radius: 15px;
            background-color: #ffffff;
        }

        #messagesContainer {
            max-height: 400px;
            overflow-y: auto;
            scroll-behavior: smooth;
            padding-bottom: 10px;
        }

        .message {
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .sent {
            background-color: #f0f0f0;
            text-align: right;
            margin-left: 50px;
        }

        .received {
            background-color: #e1f5fe;
            text-align: left;
            margin-right: 50px;
        }

        textarea.form-control {
            font-size: 1rem;
        }

        .card-footer form {
            display: flex;
            align-items: center;
        }

        .card-footer form button {
            margin-left: 10px;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layout.agence_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/espokeys/BBI/client/web/BBIAPP/BBI/resources/views/messages/Agence/chat.blade.php ENDPATH**/ ?>