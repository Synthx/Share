<div class="row tabcont">
    <ul class="nav nav-tabs pt-3 mt-5">
        <li class="nav-item mbr-fonts-style">
            <a class="nav-link <?php if($current == 'home'): ?> active <?php endif; ?> show display-7" href="<?php echo e(route('user.dashboard')); ?>">
                Tableau de bord
            </a>
        </li>
        <li class="nav-item mbr-fonts-style">
            <a class="nav-link <?php if($current == 'trips'): ?> active <?php endif; ?> show display-7" href="<?php echo e(route('user.dashboard.trips')); ?>">
                Trajets publiés
            </a>
        </li>
        <li class="nav-item mbr-fonts-style">
            <a class="nav-link <?php if($current == 'reservations'): ?> active <?php endif; ?> show display-7" href="<?php echo e(route('user.dashboard.reservations')); ?>">
                Mes réservations
            </a>
        </li>
        <li class="nav-item mbr-fonts-style">
            <a class="nav-link <?php if($current == 'profile'): ?> active <?php endif; ?> show display-7" href="<?php echo e(route('user.dashboard.profile')); ?>">
                Mon profil
            </a>
        </li>
    </ul>
</div>