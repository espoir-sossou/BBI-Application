<?php $__env->startSection('content'); ?>
    <!-- Navbar-->

    <div class="container-fluid mt-3 p-0">
        <div class="row mt-3"
            style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.6)), url('<?php echo e(asset('Frontend/Home/assets/imgs/aub25.jpg')); ?>'); background-size: cover; background-repeat: no-repeat; background-position: center; height: 140vh; display: flex; align-items: center; justify-content: space-between; padding: 20px; color: #fff; ">

            <div class="col-md-12">
                <div class="containair" >
                    <div class="row d-flex align-items-center justify-content-center" style="height: 80vh;">
                        <div class="col-md-3"></div>
                        <div class="col-md-6 p-5" style="position: relative; top: -200px; background-color: #fff;  border-radius: 10px;box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
                            style="background-color: #fff;  border-radius: 10px;box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
                            <?php if(Session::get('success')): ?>
                                <div class="alert alert-success">
                                    <?php echo e(Session::get('success')); ?>

                                </div>
                            <?php endif; ?>
                            <?php if(Session::get('fail')): ?>
                                <div class="alert alert-danger">
                                    <?php echo e(Session::get('fail')); ?>

                                </div>
                            <?php endif; ?>
                            <h4 class="">Se connecter ou s'inscrire</h4>
                            <form action="<?php echo e(route('signup.user')); ?>" method="POST" class="mt-4">
                                <?php echo csrf_field(); ?>
                                <div class="form-group mb-3">
                                    <label for="lastname" class="form-label text-dark">Nom</label>
                                    <input type="text" class="form-control" name="lastname" id="lastname"
                                        style="border: 1px solid #ccc; border-radius: 5px; padding: 10px;"
                                        value="<?php echo e(old('lastname')); ?>">
                                    <span class="text-danger">
                                        <?php $__errorArgs = ['lastname'];
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
                                    <label for="firstname" class="form-label text-dark">Prénom</label>
                                    <input type="text" class="form-control" name="firstname" id="firstname"
                                        style="border: 1px solid #ccc; border-radius: 5px; padding: 10px;"
                                        value="<?php echo e(old('firstname')); ?>">
                                    <span class="text-danger">
                                        <?php $__errorArgs = ['firstname'];
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
                                    <label for="phone" class="form-label text-dark">Numéro de téléphone</label>
                                    <input type="text" class="form-control" name="phone" id="phone"
                                        style="border: 1px solid #ccc; border-radius: 5px; padding: 10px;"
                                        value="<?php echo e(old('phone')); ?>">
                                    <span class="text-danger">
                                        <?php $__errorArgs = ['phone'];
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
                                    <label for="sexe" class="form-label text-dark">Sexe</label>
                                    <select name="sexe" id="sexe" class="form-control"
                                        style="border: 1px solid #ccc; border-radius: 5px; padding: 10px;">
                                        <option value="M" <?php echo e(old('sexe') == 'M' ? 'selected' : ''); ?>>Masculin</option>
                                        <option value="F" <?php echo e(old('sexe') == 'F' ? 'selected' : ''); ?>>Féminin</option>
                                    </select>
                                    <span class="text-danger">
                                        <?php $__errorArgs = ['sexe'];
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
                                    <label for="role" class="form-label text-dark">Rôle</label>
                                    <select name="role" id="role" class="form-control"
                                        style="border: 1px solid #ccc; border-radius: 5px; padding: 10px;">
                                        <option value="VENDEUR" <?php echo e(old('role') == 'VENDEUR' ? 'selected' : ''); ?>>Vendeur
                                        </option>
                                        <option value="AGENCE" <?php echo e(old('role') == 'AGENCE' ? 'selected' : ''); ?>>Agence
                                        </option>
                                        <option value="ADMIN" <?php echo e(old('role') == 'ADMIN' ? 'selected' : ''); ?>>ADMIN
                                        </option>
                                        <option value="USER" <?php echo e(old('role') == 'USER' ? 'selected' : ''); ?>>Simple
                                            Utilisateur</option>

                                    </select>
                                    <span class="text-danger">
                                        <?php $__errorArgs = ['role'];
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
                                    <label for="email" class="form-label text-dark">Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        style="border: 1px solid #ccc; border-radius: 5px; padding: 10px;"
                                        value="<?php echo e(old('email')); ?>">
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
                                    <input type="text" class="form-control" name="password" id="password"
                                        style="border: 1px solid #ccc; border-radius: 5px; padding: 10px;">
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

                                <div class="form-group mb-3">
                                    <label for="adresse" class="form-label text-dark">Adresse</label>
                                    <textarea name="adresse" id="adresse" class="form-control" rows="3"
                                        style="border: 1px solid #ccc; border-radius: 5px; padding: 10px;"><?php echo e(old('adresse')); ?></textarea>
                                    <span class="text-danger">
                                        <?php $__errorArgs = ['adresse'];
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
                                    style="background-color: #318093; color:white; border: 1px solid #ccc; border-radius: 30px; padding: 10px;">S'inscrire</button>
                                <div class="text-center w-100 mt-3" style="font-size: 25px">
                                    <p class="text-muted font-weight-bold">Vous avez deja un compte ?
                                        <a href="<?php echo e(route('loginPage')); ?>" class="ml-2" style="color:#318093;">Se
                                            connecter</a>
                                    </p>
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

<?php echo $__env->make('Layout.headMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/espokeys/BBI/client/web/BBIAPP/BBI/resources/views/Layout/Connexion/Clients/sign_up.blade.php ENDPATH**/ ?>