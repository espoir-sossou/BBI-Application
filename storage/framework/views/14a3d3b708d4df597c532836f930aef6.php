<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Bolivie Business Inter</title>

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('Frontend/Home/assets/imgs/logo_bbi.png')); ?>">


    <!-- Custom fonts for this template-->
    <link href="<?php echo e(asset('Frontend/Home/assets/vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet"
        type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="<?php echo e(asset('Frontend/Home/assets/css/sb-admin-2.min.css')); ?>" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php echo $__env->make('Layout.Backend.User_dashboard.Partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php echo $__env->make('Layout.Backend.User_dashboard.Partials.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>
            <!-- End of Main Content -->

            <?php echo $__env->make('Layout.Backend.User_dashboard.Partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

   <!-- Modal de déconnexion -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="logoutModalLabel">Prêt à partir ?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            Cliquez sur "Déconnexion" ci-dessous si vous êtes prêt à terminer votre session actuelle.
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">
                Annuler
            </button>
            <a class="btn btn-primary" href="<?php echo e(route('authLogout')); ?>"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Déconnexion
            </a>
            <!-- Formulaire de déconnexion caché pour l'appel POST -->
            <form id="logout-form" action="<?php echo e(route('authLogout')); ?>" method="POST" style="display: none;">
                <?php echo csrf_field(); ?>
            </form>
        </div>
    </div>
</div>
</div>
</body>

</html>
<?php /**PATH /home/espokeys/BBI/client/web/BBIAPP/BBI/resources/views/Layout/user_layout.blade.php ENDPATH**/ ?>