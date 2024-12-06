<?php $__env->startSection('content'); ?>
    <section>
        <div class="container py-5">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center bg-info text-white">
                            <a href="<?php echo e(route('chat.index')); ?>" class="text-white"><i class="fas fa-arrow-left"></i></a>
                            <p class="mb-0"><?php echo e($receiver->nom); ?></p>
                        </div>

                        <div class="card-body" id="chatBox">
                            <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div
                                    class="d-flex <?php echo e($message->sender_id === auth()->id() ? 'justify-content-end' : 'justify-content-start'); ?> mb-4">

                                    <div class="p-3 <?php echo e($message->sender_id === auth()->id() ? 'bg-body-tertiary' : 'bg-info text-white'); ?>"
                                        style="border-radius: 15px;">
                                        <p class="small mb-0"><?php echo e($message->content); ?></p>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div class="card-footer">
                            <form action="<?php echo e(route('messages.send', $receiver->user_id)); ?>" method="POST"
                                class="d-flex align-items-center">
                                <?php echo csrf_field(); ?>
                                <textarea name="content" class="form-control me-2" rows="3" placeholder="Écrivez votre message..."></textarea>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <style>
        .list-group-item {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 12px;
            margin-bottom: 10px;
        }

        .list-group-item:hover {
            background-color: #f1f1f1;
        }

        .rounded-circle {
            border-radius: 50%;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
        }

        .card-body {
            max-height: 400px;
            overflow-y: auto;
        }

        textarea {
            resize: none;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layout.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/espokeys/BBI/client/web/BBIAPP/BBI/resources/views/messages/chat-show.blade.php ENDPATH**/ ?>