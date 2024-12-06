<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0">Liste des utilisateurs ayant envoyé des messages</h4>
        </div>
        <div class="card-body">
            <?php if($usersWithMessages->isEmpty()): ?>
                <p>Aucun utilisateur n'a encore envoyé de message.</p>
            <?php else: ?>
                <ul class="list-group">
                    <?php $__currentLoopData = $usersWithMessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>
                                <strong><?php echo e($user->name); ?></strong> (<?php echo e($user->email); ?>)
                            </span>
                            <a href="<?php echo e(route('agence.messages.chat', ['receiver_id' => $user->user_id])); ?>" class="btn btn-primary btn-sm">
                                Voir les messages
                            </a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layout.agence_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/espokeys/BBI/client/web/BBIAPP/BBI/resources/views/messages/Agence/users-list.blade.php ENDPATH**/ ?>