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
        <div class="container">
            <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2" style="padding-top: 65px;">
                Bonjour <?php echo e(ucfirst(user()->first_name)); ?>,
            </h2>
        </div>
        <div class="container-fluid">
            <?php echo $__env->make('user.dashboard.menu', ['current' => 'home'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="container">
            <div class="row px-1">
                <div class="tab-content">
                    <div class="tab-pane in active mbr-table">
                        <?php if($notifs->count() > 0): ?>
                        <section class="mbr-section article content12 cid-qOgSE2PoFL">
                            <div class="container">
                                <h2 class="mbr-section-title pb-3 align-left mbr-fonts-style display-2">
                                    Notifications (<?php echo e($notifs->count()); ?>)
                                </h2>
                                <div class="media-container-row">
                                    <div class="mbr-text counter-container col-12 col-md-12 mbr-fonts-style display-7">
                                        <ul>
                                            <?php $__currentLoopData = $notifs->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notif): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><strong><?php echo e($notif['title']); ?></strong> - <?php echo e($notif['message']); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <?php endif; ?>
                        <section class="counters2 counters cid-qOgREAtAA8" id="counters2-v">
                            <div class="container pt-4 mt-2">
                                <div class="media-container-row">
                                    <div class="media-block" style="width: 50%;">
                                        <h2 class="mbr-section-title pb-3 align-left mbr-fonts-style display-2">
                                            Tableau de bord
                                        </h2>
                                        <h3 class="mbr-section-subtitle pb-5 align-left mbr-fonts-style display-5">
                                            Mes informations essentielles.
                                        </h3>
                                        <div class="mbr-figure">
                                            <img src="<?php echo e(asset('resources/images/account.jpg')); ?>">
                                        </div>
                                    </div>
                                    <div class="cards-block">
                                        <div class="cards-container">
                                            <div class="card px-3 align-left col-12 col-md-6">
                                                <div class="panel-item p-3">
                                                    <div class="card-img pb-3">
                                                        <span class="mbr-iconfont pr-2 mbri-laptop"></span>
                                                        <h3 class="count py-3 mbr-fonts-style display-2">
                                                            100
                                                        </h3>
                                                    </div>
                                                    <div class="card-text">
                                                        <h4 class="mbr-content-title mbr-bold mbr-fonts-style display-7">
                                                            Nouveaux messages
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card px-3 align-left col-12 col-md-6">
                                                <div class="panel-item p-3">
                                                    <div class="card-img pb-3">
                                                        <span class="mbr-iconfont pr-2 mbri-alert"></span>
                                                        <h3 class="count py-3 mbr-fonts-style display-2">
                                                            200
                                                        </h3>
                                                    </div>
                                                    <div class="card-text">
                                                        <h4 class="mbr-content-title mbr-bold mbr-fonts-style display-7">
                                                            Alertes
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card px-3 align-left col-12 col-md-6">
                                                <div class="panel-item p-3">
                                                    <div class="card-img pb-3">
                                                        <span class="mbr-iconfont pr-2 mbri-calendar"></span>
                                                        <h3 class="count py-3 mbr-fonts-style display-2">
                                                            <?php echo e(Models\Trip::where('passengers', 'like', '%'. user()->id . '%')->afterToday('date')->count()); ?>

                                                        </h3>
                                                    </div>
                                                    <div class="card-text">
                                                        <h4 class="mbr-content-title mbr-bold mbr-fonts-style display-7">
                                                            Prochains réservations
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card px-3 align-left col-12 col-md-6">
                                                <div class="panel-item p-3">
                                                    <div class="card-img pb-3">
                                                        <span class="mbr-iconfont pr-2 mbri-map-pin"></span>
                                                        <h3 class="count py-3 mbr-fonts-style display-2">
                                                            <?php echo e(Models\Trip::where('driver', user()->id)->afterToday('date')->count()); ?>

                                                        </h3>
                                                    </div>
                                                    <div class="card-texts">
                                                        <h4 class="mbr-content-title mbr-bold mbr-fonts-style display-7">
                                                            Prochains trajets
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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