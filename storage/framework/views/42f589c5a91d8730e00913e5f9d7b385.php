<?php $__env->startSection('content'); ?>
    <!-- Navbar-->

    <div class="container-fluid mt-3 p-0">
        <div class="row mt-3"
            style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.6)), url('<?php echo e(asset('Frontend/Home/assets/imgs/aub25.jpg')); ?>'); background-size: cover; background-repeat: no-repeat; background-position: center; height: 90vh; display: flex; align-items: center; justify-content: space-between; padding: 20px; color: #fff; ">

            <div class="col-md-12" style="margin-top: -50px;">
                <div class="containair">
                    <div class="row d-flex align-items-center justify-content-center" style="height: 80vh;">
                        <div class="col-md-3"></div>
                        <div class="col-md-6 p-5"
                            style="background-color: #fff;  border-radius: 10px;box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
                            <?php if(Session::get('success')): ?>
                                <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
                            <?php endif; ?>

                            <?php if(Session::get('fail')): ?>
                                <div class="alert alert-danger"><?php echo e(Session::get('fail')); ?></div>
                            <?php endif; ?>

                            <h4 class="">Se connecter ou s'inscrire</h4>
                            <form action="<?php echo e(route('login.post')); ?>" method="POST" class="mt-4">
                                <?php echo csrf_field(); ?>
                                <!-- Champs du formulaire -->
                                <div class="form-group mb-3">
                                    <label for="email" class="form-label text-dark">Email Address</label>
                                    <input type="text" class="form-control" name="email" id="email"
                                        aria-describedby="emailHelp"
                                        style="border: 1px solid #ccc; border-radius: 5px; padding: 10px;">
                                    <span class="text-danger">
                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <?php echo e($message); ?>

                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </span>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password" class="form-label text-dark">Mot de passe</label>
                                    <input type="text" name="password" class="form-control" id="password"
                                        style="border: 1px solid #ccc; border-radius: 5px; padding: 10px; margin-bottom: 10px;">
                                    <span class="text-danger">
                                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <?php echo e($message); ?>

                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </span>
                                </div>
                                <button type="submit" class="btn w-100 mt-3"
                                    style="background-color: #318093; color:white; border: 1px solid #ccc; border-radius: 30px; padding: 10px; margin-bottom: 10px;">
                                    Submit
                                </button>

                                <!-- Social Login -->
                                <!--           <div class="form-group col-lg-12 mx-auto">
                                    <a href="#" class="btn  btn-block py-2 btn-facebook"
                                         style="background-color: #318093; color:white; border: 1px solid #ccc;  border-radius: 30px; padding: 10px;margin-bottom: 10px;">
                                        <i class="fa fa-facebook-f mr-2"></i>
                                        <span class="font-weight-bold">Continue with Facebook</span>
                                    </a>
                                    <a href="#" class="btn btn-block py-2 btn-twitter"
                                         style="background-color: #318093; color:white; border: 1px solid #ccc;  border-radius: 30px; padding: 10px;margin-bottom: 10px;">
                                        <i class="fa fa-twitter mr-2"></i>
                                        <span class="font-weight-bold">Continue with Twitter</span>
                                    </a>
                                </div>

                                <!-- Already Registered -->
                                <div class="text-center w-100" style="font-size: 25px">
                                    <p class="text-muted font-weight-bold">Vous n'avez pas de compte ?
                                        <a href="<?php echo e(route('signUpPage')); ?>" class="ml-2" style="color:#318093;">Créer un
                                            compte</a>
                                    </p>
                                </div>

                                <!-- Ligne avec "ou" centré entre deux traits horizontaux -->
                                <div class="d-flex align-items-center my-4">
                                    <hr class="flex-grow-1" style="border: 1px solid #ccc;">
                                    <span class="px-3 text-muted" style="font-size: 18px;">ou</span>
                                    <hr class="flex-grow-1" style="border: 1px solid #ccc;">
                                </div>
                            </form>
                        </div>
                        <div class="col-md-3"></div>
                    </div>

                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        // Désactive le bouton retour après déconnexion
        if (window.history && window.history.pushState) {
            window.history.pushState(null, null, window.location.href);
            window.onpopstate = function () {
                window.history.pushState(null, null, window.location.href);
            };
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layout.headMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/espokeys/BBI/client/web/BBIAPP/BBI/resources/views/Layout/Connexion/Clients/agent_sign_in.blade.php ENDPATH**/ ?>