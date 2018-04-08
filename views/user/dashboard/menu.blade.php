<div class="row tabcont">
    <ul class="nav nav-tabs pt-3 mt-5">
        <li class="nav-item mbr-fonts-style">
            <a class="nav-link @if($current == 'home') active @endif show display-7" href="{{ route('user.dashboard') }}">
                Tableau de bord
            </a>
        </li>
        <li class="nav-item mbr-fonts-style">
            <a class="nav-link @if($current == 'trips') active @endif show display-7" href="{{ route('user.dashboard.trips') }}">
                Trajets publiés
            </a>
        </li>
        <li class="nav-item mbr-fonts-style">
            <a class="nav-link @if($current == 'reservations') active @endif show display-7" href="{{ route('user.dashboard.reservations') }}">
                Mes réservations
            </a>
        </li>
        <li class="nav-item mbr-fonts-style">
            <a class="nav-link @if($current == 'profile') active @endif show display-7" href="{{ route('user.dashboard.profile') }}">
                Mon profil
            </a>
        </li>
    </ul>
</div>