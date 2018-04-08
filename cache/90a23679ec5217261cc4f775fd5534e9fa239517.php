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
            <?php echo $__env->make('user.dashboard.menu', ['current' => 'reservations'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="container">
            <div class="row px-1">
                <div class="tab-content">
                    <div class="tab-pane in active mbr-table">
                        <section class="testimonials4 cid-qNiBy6X3PI" id="testimonials4-n">
                            <div class="container">
                                <h2 class="pb-3 mbr-fonts-style mbr-white align-center display-2">
                                    Mes réservations
                                </h2>
                                <?php if(empty($trips)): ?>
                                <h3 class="mbr-section-subtitle mbr-light pb-3 mbr-fonts-style mbr-white align-center display-5">
                                    Vous n'avez pas de réservations de prévu.
                                </h3>
                                <?php else: ?>
                                <h3 class="mbr-section-subtitle mbr-light pb-3 mbr-fonts-style mbr-white align-center display-5">
                                    Mes 5 prochaines réservations.
                                </h3>
                                <div class="col-md-12 testimonials-container">
                                    <?php $__currentLoopData = $trips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                    $driver = Models\User::find($trip->driver);
                                    ?>
                                    <div class="testimonials-item">
                                        <div class="user row">
                                            <div class="col-lg-3 col-md-4">
                                                <div class="user_image">
                                                    <img style="border-radius: 50%;" src="<?php echo e(asset('resources/images/default.png')); ?>">
                                                </div>
                                                <p class="mbr-fonts-style display-7" style="margin-left: 2rem;">
                                                    <b>Fabrice</b> (Novice)<br />
                                                    20 ans
                                                </p>
                                            </div>
                                            <div class="testimonials-caption col-lg-6 col-md-8">
                                                <div class="user_text">
                                                    <p class="mbr-fonts-style display-7">
                                                        <span style="font-size: 1.3rem;">
                                                            <b>Le <?php echo strftime("%e %B %Y à %Hh%M", with(new DateTime($trip->date))->getTimestamp()); ?></b><br />
                                                            <?php echo e($trip->origin_city); ?> → <?php echo e($trip->destination_city); ?><br /><br/>
                                                        </span>
                                                        • <?php echo e($trip->origin); ?><br />
                                                        • <?php echo e($trip->destination); ?>

                                                    </p>
                                                </div>
                                            </div>
                                            <div class="testimonials-caption col-lg-3 align-right">
                                                <div class="user_text">
                                                    <p class="mbr-fonts-style display-7">
                                                        <span style="font-size: 2rem;"><?php echo e($trip->price); ?></span>€<br />
                                                        par place<br />
                                                        <span style="font-size: 1.8rem;"><?php echo e($trip->remaining); ?></span> place(s) restante(s)
                                                    </p>
                                                </div>
                                                <a class="btn btn-primary display-4" style="margin: .0rem;" href="#">
                                                    <span class="mbri-plus mbr-iconfont mbr-iconfont-btn" style="font-size: 1rem;"></span>
                                                    VOIR
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>