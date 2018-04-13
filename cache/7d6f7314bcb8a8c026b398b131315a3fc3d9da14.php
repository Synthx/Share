<?php $__env->startSection('title', 'Tableau de bord'); ?>

<?php $__env->startSection('content'); ?>
    <section class="header1 headerManage mbr-parallax-background">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="mbr-white col-md-10">
                    <h1 class="mbr-section-title align-center mbr-bold pb-3 mbr-fonts-style display-1"></h1>
                    <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-1">
                        Gestion de compte
                    </h3>
                    <p class="mbr-text align-center pb-3 mbr-fonts-style display-5">
                        Tableau de bord.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="cid-qMLwByGj9A">
        <div class="container-fluid">
            <?php echo $__env->make('user.dashboard.menu', ['current' => 'profile'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="container">
            <div class="row px-1">
                <div class="tab-content">
                    <div class="tab-pane in active mbr-table">
                        <section class="mbr-section form1 cid-qLZfO1r5jo">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="media-container-column col-lg-8">
                                        <form class="mbr-form" action="<?php echo e(route('user.dashboard.profile')); ?>" method="post" autocomplete="off">
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
                                                    <?php endif; ?>
                                                </div>
                                                <h2 class="mbr-section-title pb-3 mbr-fonts-style display-2">
                                                    Informations personnelles
                                                </h2>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label mbr-fonts-style display-7">Nom</label>
                                                        <input type="text" class="form-control" value="<?php echo e(user()->first_name); ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label mbr-fonts-style display-7">Prénom</label>
                                                        <input type="text" class="form-control" value="<?php echo e(user()->last_name); ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-control-label mbr-fonts-style display-7">Sexe</label>
                                                        <input type="text" class="form-control" value="<?php if(user()->sex == 'f'): ?> Femme <?php else: ?> Homme <?php endif; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-control-label mbr-fonts-style display-7">E-mail</label>
                                                        <input type="email" class="form-control" value="<?php echo e(user()->email); ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-control-label mbr-fonts-style display-7">Année de naissance</label>
                                                        <input type="number" class="form-control" value="<?php echo e(user()->birth_year); ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-control-label mbr-fonts-style display-7">Numéro de téléphone</label>
                                                        <input type="tel" placeholder="06 XX XX XX XX" class="form-control" name="phone" value="<?php echo e(user()->phone); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-control-label mbr-fonts-style display-7">Minibio</label>
                                                        <textarea name="minibio" class="form-control" rows="4" placeholder="Que faites-vous dans votre temps libre ? Où allez-vous le plus souvent ? Qu'est-ce qui fait de vous une personne avec qui il est agréable de voyager ?"><?php echo e(user()->minibio); ?></textarea>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>