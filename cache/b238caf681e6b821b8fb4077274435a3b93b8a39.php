<?php $__env->startSection('title', 'Rechercher un trajet'); ?>

<?php $__env->startSection('content'); ?>
    <section class="header1 headerTrip mbr-parallax-background">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="mbr-white col-md-10">
                    <h1 class="mbr-section-title align-center mbr-bold pb-3 mbr-fonts-style display-1"></h1>
                    <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-1">
                        Rechercher un trajet
                    </h3>
                    <p class="mbr-text align-center pb-3 mbr-fonts-style display-5">
                        Trouvez celui qui vous corresponds le mieux.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="cid-qMLwByGj9A">
        <div class="container">
            <div class="row px-1">
                <div class="tab-content">
                    <div class="tab-pane in active mbr-table">
                        <section class="testimonials4 cid-qNiBy6X3PI" id="testimonials4-n">
                            <div class="container">
                                <?php if($total > 0): ?>
                                <h3 class="mbr-section-subtitle mbr-light pb-3 mbr-fonts-style mbr-white align-center display-5">
                                    <?php echo e($total); ?> trajets disponibles. Trier par :
                                </h3>
                                <div class="align-center">
                                    <a class="btn <?php if($request->order === '' || $request->order === 'date'): ?> btn-primary <?php else: ?> btn-outline-primary <?php endif; ?> display-4" style="margin: .0rem;" href="<?php echo e(route('trip.list')); ?>?origin=<?php echo e(urlencode($request->origin)); ?>&destination=<?php echo e(urlencode($request->destination)); ?>&date=<?php echo e(urlencode($request->date)); ?>&order=date">
                                        <span class="mbri-clock mbr-iconfont mbr-iconfont-btn"></span>
                                        Date
                                    </a>
                                    <a class="btn <?php if($request->order === 'price'): ?> btn-primary <?php else: ?> btn-outline-primary <?php endif; ?> display-4" style="margin: .0rem;" href="<?php echo e(route('trip.list')); ?>?origin=<?php echo e(urlencode($request->origin)); ?>&destination=<?php echo e(urlencode($request->destination)); ?>&date=<?php echo e(urlencode($request->date)); ?>&order=price">
                                        <span class="mbri-cash mbr-iconfont mbr-iconfont-btn"></span>
                                        Prix
                                    </a>
                                </div>
                                <div class="col-md-12 testimonials-container">
                                    <?php $__currentLoopData = $trips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                    $driver = Models\User::find($trip->driver);
                                    ?>
                                    <div class="testimonials-item">
                                        <div class="user row">
                                            <div class="col-lg-3 col-md-4">
                                                <div class="user_image">
                                                    <?php if(empty($driver->image)): ?>
                                                    <img style="border-radius: 50%;" src="<?php echo e(asset('resources/images/avatar/' . $driver->sex . '.png')); ?>">
                                                    <?php else: ?>

                                                    <?php endif; ?>
                                                </div>
                                                <p class="mbr-fonts-style display-7" style="margin-left: 2rem;">
                                                    <b><?php echo e($driver->first_name); ?></b><br />
                                                    <?php echo e(date('Y') - $driver->birth_year); ?> ans
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
                                                <a class="btn btn-primary display-4" style="margin: .0rem;" href="<?php echo e(route('trip.view')); ?>?id=<?php echo e($trip->id); ?>">
                                                    <span class="mbri-success mbr-iconfont mbr-iconfont-btn"></span>
                                                    RÉSERVER
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <div class="align-left">
                                        <a class="btn btn-primary display-4" style="margin: 25px 0px;" href="<?php echo e(route('trip.search')); ?>">
                                            <span class="mbri-left mbr-iconfont mbr-iconfont-btn"></span>
                                            RETOUR
                                        </a>
                                    </div>
                                </div>
                                <?php else: ?>
                                <h3 class="mbr-section-subtitle mbr-light pb-3 mbr-fonts-style mbr-white align-center display-5">
                                    Il n'y a pas de trajets disponible selon vos critères.
                                </h3>
                                <div class="col-md-12">
                                    <div class="align-center">
                                        <a class="btn btn-primary display-4" href="<?php echo e(route('trip.search')); ?>">
                                            <span class="mbri-left mbr-iconfont mbr-iconfont-btn"></span>
                                            RETOUR
                                        </a>
                                    </div>
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