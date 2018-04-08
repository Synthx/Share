<?php $__env->startSection('title', 'Se connecter'); ?>

<?php $__env->startSection('content'); ?>
<section class="header1 headerCredentials mbr-parallax-background">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="mbr-white col-md-10">
                <h1 class="mbr-section-title align-center mbr-bold pb-3 mbr-fonts-style display-1"></h1>
                <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-1">
                    Mon compte
                </h3>
                <p class="mbr-text align-center pb-3 mbr-fonts-style display-5">
                    Accéder à mon espace personnel.
                </p>
            </div>
        </div>
    </div>
</section>
<section class="cid-qLZfaVbajL">
    <div class="container-fluid">
        <div class="row tabcont">
            <ul class="nav nav-tabs pt-3 mt-5">
                <li class="nav-item mbr-fonts-style">
                    <a class="nav-link active show display-7">
                        SE CONNECTER
                    </a>
                </li>
                <li class="nav-item mbr-fonts-style">
                    <a class="nav-link show display-7" href="<?php echo e(route('user.register')); ?>">
                        S'INSCRIRE
                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>
<section class="mbr-section form1 cid-qLZfO1r5jo">
    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-6">
                <form class="mbr-form" action="<?php echo e(route('user.login')); ?>" method="post" autocomplete="off">
                    <?php echo csrf(); ?>

                    <div class="row row-sm-offset">
                        <div class="col-md-12">
                            <?php if($errors->count() > 0): ?>
                            <div data-form-alert>
                                <div class="alert alert-form alert-danger text-xs-center">
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($error); ?><br />
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <?php elseif(flashExist('error')): ?>
                            <div data-form-alert>
                                <div class="alert alert-form alert-danger text-xs-center">
                                    <?php echo e(flashGet('error')); ?>

                                </div>
                            </div>
                            <?php elseif(flashExist('success')): ?>
                            <div data-form-alert>
                                <div class="alert alert-form alert-success text-xs-center">
                                    <?php echo e(flashGet('success')); ?>

                                </div>
                            </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <label class="form-control-label mbr-fonts-style display-7">E-mail</label>
                                <input type="email" class="form-control" name="login_email" value="<?php echo e(old('login_email')); ?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label mbr-fonts-style display-7">Mot de passe</label>
                                <input type="password" class="form-control" name="login_password" value="<?php echo e(old('login_password')); ?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="checkbox" name="remember" value="1"> Se souvenir de moi
                            </div>
                        </div>
                    </div>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary btn-form display-4">
                            <span class="mbri-success mbr-iconfont mbr-iconfont-btn"></span>
                            VALIDER
                        </button>
                    </span>
                </form>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>