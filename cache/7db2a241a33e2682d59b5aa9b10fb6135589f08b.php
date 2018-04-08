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
            <?php echo $__env->make('user.dashboard.menu', ['current' => 'trips'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="container">
            <div class="row px-1">
                <div class="tab-content">
                    <div class="tab-pane in active mbr-table">
                        <section class="timeline1 cid-qOh6nK6SzK" id="timeline1-y">
                            <div class="container align-center">
                                <h2 class="mbr-section-title pb-3 mbr-fonts-style display-2">
                                    Trajets publiés
                                </h2>
                                <?php if(empty($trips)): ?>
                                    <h3 class="mbr-section-subtitle pb-5 mbr-fonts-style display-5">
                                        Vous n'avez aucun trajet de prévu.
                                    </h3>
                                <?php else: ?>
                                    <h3 class="mbr-section-subtitle pb-5 mbr-fonts-style display-5">
                                        Mes 5 prochains trajets prévus.
                                    </h3>
                                    <div class="container timelines-container">
                                        <?php $__currentLoopData = $trips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="row timeline-element separline">
                                                <div class="timeline-date-panel col-xs-12 col-md-4  align-left">
                                                    <div class="time-line-date-content">
                                                        <p class="mbr-timeline-date mbr-fonts-style display-5">
                                                            <?php echo strftime("%e %B %Y à %Hh%M", with(new DateTime($trip->date))->getTimestamp()); ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <span class="iconBackground"></span>
                                                <div class="col-xs-12 col-md-8 align-left">
                                                    <div class="timeline-text-content">
                                                        <h4 class="mbr-timeline-title pb-3 mbr-fonts-style display-5">
                                                            <?php echo e($trip->origin_city); ?> → <?php echo e($trip->destination_city); ?>

                                                        </h4>
                                                        <p class="mbr-timeline-text mbr-fonts-style display-7">
                                                            <?php echo e($trip->origin); ?><br />
                                                            <?php echo e($trip->destination); ?><br />
                                                            <?php echo e($trip->price); ?>€<br />
                                                            (<?php echo e($trip->remaining); ?> place(s) restante(s))
                                                        </p>
                                                        <br />
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