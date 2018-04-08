<?php $__env->startSection('title', 'Erreur 404'); ?>

<?php $__env->startSection('content'); ?>
<section class="header10 cid-qMLMYzYMFY mbr-fullscreen mbr-parallax-background">
    <div class="mbr-overlay" style="opacity: 0.2; background-color: rgb(0, 0, 0);"></div>
    <div class="container">
        <div class="media-container-column mbr-white col-lg-8 col-md-10 ml-auto">
            <h1 class="mbr-section-title align-right mbr-bold pb-3 mbr-fonts-style display-1">
                Erreur 404
            </h1>
            <h3 class="mbr-section-subtitle align-right mbr-light pb-3 mbr-fonts-style display-2">
                La page que vous recherchez n'existe pas.
            </h3>
            <p class="mbr-text align-right pb-3 mbr-fonts-style display-5">La page que vous avez demandée n’a pas été trouvée. Il se peut que le lien que vous avez utilisé soit rompu ou que vous ayez tapé l’adresse incorrectement.&nbsp;</p>
            <div class="mbr-section-btn align-right">
                <a class="btn btn-md btn-primary display-4" href="<?php echo e(route('home')); ?>">
                    <span class="mbri-left mbr-iconfont mbr-iconfont-btn"></span>
                    Retourner à l'accueil
                </a>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>