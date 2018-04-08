@extends('master')

@section('title', 'Qui sommes-nous ?')

@section('content')
<section class="header1 headerAbout mbr-parallax-background" id="header1-i">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="mbr-white col-md-10">
                <h1 class="mbr-section-title align-center mbr-bold pb-3 mbr-fonts-style display-1"></h1>
                <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-1">
                    Qui sommes-nous ?
                </h3>
                <p class="mbr-text align-center pb-3 mbr-fonts-style display-5">
                    Nous décrire en quelques mots...
                </p>
            </div>
        </div>
    </div>
</section>
<section class="mbr-section article content11 cid-qLTLilfb9L" id="content11-m">
    <div class="container">
        <div class="media-container-row">
            <div class="mbr-text counter-container col-12 col-md-8 mbr-fonts-style display-7">
                <ol>
                    <li><strong>DYNAMIQUE</strong> - Que ce soit sur mobile ou ordinateur, vous pouvez accéder à la totalité des fonctions qu'offre {{ config('name') }}. Vous n'avez plus d'excuse pour réserver vos prochains trajets.</li>
                    <li><strong>FACILE &amp; SIMPLE</strong>&nbsp;- Conçu pour être le plus simple d'utilisation possible, il n'a jamais été aussi simple de chercher, réserver ou bien proposer un trajet.</li>
                    <li><strong>COMMUNAUTAIRE</strong>&nbsp;- Parce que le covoiturage ne serait rien sans vous, {{ config('name') }} s'engage à vous fournir une utilisation aussi simple que possible et à améliorer continuellement les services qui vous sont proposés.</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="counters2 counters cid-qLTPIaf59N" id="counters2-n">
    <div class="container pt-4 mt-2">
        <div class="media-container-row">
            <div class="media-block" style="width: 50%;">
                <h2 class="mbr-section-title pb-3 align-left mbr-fonts-style display-2">
                    {{ strtoupper(config('name')) }}
                </h2>
                <h3 class="mbr-section-subtitle pb-5 align-left mbr-fonts-style display-5">
                    En quelques chiffres...
                </h3>
                <div class="mbr-figure">
                    <img src="{{ asset('resources/images/about.jpg') }}">
                </div>
            </div>
            <div class="cards-block">
                <div class="cards-container">
                    <div class="card px-3 align-left col-12 col-md-6">
                        <div class="panel-item p-3">
                            <div class="card-img pb-3">
                                <span class="mbr-iconfont pr-2 mbri-flag"></span>
                                <h3 class="count py-3 mbr-fonts-style display-2">
                                    200
                                </h3>
                            </div>
                            <div class="card-text">
                                <h4 class="mbr-content-title mbr-bold mbr-fonts-style display-7">
                                    Trajets
                                </h4>
                                <p class="mbr-content-text mbr-fonts-style display-7">
                                    Pour vous accompagnez dans tous vos déplacements.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card px-3 align-left col-12 col-md-6">
                        <div class="panel-item p-3">
                            <div class="card-img pb-3">
                                <span class="mbr-iconfont pr-2 mbri-users"></span>
                                <h3 class="count py-3 mbr-fonts-style display-2">
                                    100
                                </h3>
                            </div>
                            <div class="card-text">
                                <h4 class="mbr-content-title mbr-bold mbr-fonts-style display-7">
                                    Membres
                                </h4>
                                <p class="mbr-content-text mbr-fonts-style display-7">
                                    Une communauté qui grandit de jour en jour.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card px-3 align-left col-12 col-md-6">
                        <div class="panel-item p-3">
                            <div class="card-img pb-3">
                                <span class="mbr-iconfont pr-2 mbri-map-pin"></span>
                                <h3 class="count py-3 mbr-fonts-style display-2">
                                    45
                                </h3>
                            </div>
                            <div class="card-text">
                                <h4 class="mbr-content-title mbr-bold mbr-fonts-style display-7">
                                    Villes
                                </h4>
                                <p class="mbr-content-text mbr-fonts-style display-7">
                                    Voyagez n'importe où en France.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card px-3 align-left col-12 col-md-6">
                        <div class="panel-item p-3">
                            <div class="card-img pb-3">
                                <span class="mbr-iconfont pr-2 mbri-alert"></span>
                                <h3 class="count py-3 mbr-fonts-style display-2">12</h3>
                            </div>
                            <div class="card-text">
                                <h4 class="mbr-content-title mbr-bold mbr-fonts-style display-7">
                                    Personnes
                                </h4>
                                <p class="mbr-content-text mbr-fonts-style display-7">
                                    Le nombre de personne derrière {{ config('name') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="features16 cid-qLTL4NMPHQ" id="features16-k">
    <div class="container align-center">
        <h2 class="pb-3 mbr-fonts-style mbr-section-title display-2">
            NOTRE ÉQUIPE
        </h2>
        <h3 class="pb-5 mbr-section-subtitle mbr-fonts-style mbr-light display-5">
            Celles et ceux qui sont derrières {{ config('name') }}.
        </h3>
        <div class="row media-row">
            @foreach ($teams as $member)
            <div class="team-item col-lg-3 col-md-6">
                <div class="item-image">
                    <img src="{{ asset('resources/images/team/' . $member->id . '.jpg') }}">
                </div>
                <div class="item-caption py-3">
                    <div class="item-name px-2">
                        <p class="mbr-fonts-style display-5">
                            {{ $member->name }}
                        </p>
                    </div>
                    <div class="item-role px-2">
                        <p>{{  $member->job }}</p>
                    </div>
                    <div class="item-social pt-2">
                        <a href="https://twitter.com/mobirise" target="_blank">
                            <span class="p-1 socicon-twitter socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                        <a href="https://www.facebook.com/pages/Mobirise/1616226671953247" target="_blank">
                            <span class="p-1 socicon-facebook socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                        <a href="https://plus.google.com/u/0/+Mobirise" target="_blank">
                            <span class="p-1 socicon-googleplus socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                        <a href="https://www.linkedin.com/in/mobirise" target="_blank">
                            <span class="p-1 socicon-linkedin socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<section class="cid-qM1dNK46i3" id="social-buttons3-1u">
    <div class="container">
        <div class="media-container-row">
            <div class="col-md-8 align-center">
                <h2 class="pb-3 mbr-section-title mbr-fonts-style display-5">
                    SUIVEZ-NOUS SUR LES RÉSEAUX
                </h2>
                <div>
                    <div class="mbr-social-likes">
                        @if (config('social.twitter') != '')
                        <a href="{{ config('social.twitter') }}" target="_blank">
                            <span class="btn btn-social socicon-bg-twitter mx-2">
                                <i class="socicon socicon-twitter"></i>
                            </span>
                        </a>
                        @endif
                        @if (config('social.facebook') != '')
                        <a href="{{ config('social.facebook') }}" target="_blank">
                            <span class="btn btn-social socicon-bg-facebook mx-2">
                                <i class="socicon socicon-facebook"></i>
                            </span>
                        </a>
                        @endif
                        @if (config('social.youtube') != '')
                        <a href="{{ config('social.youtube') }}" target="_blank">
                            <span class="btn btn-social socicon-bg-pinterest mx-2">
                                <i class="socicon socicon-youtube"></i>
                            </span>
                        </a>
                        @endif
                        @if (config('social.instagram') != '')
                        <a href="{{ config('social.instagram') }}" target="_blank">
                            <span class="btn btn-social socicon-bg-odnoklassniki mx-2">
                                <i class="socicon socicon-instagram"></i>
                            </span>
                        </a>
                        @endif
                        @if (config('social.gplus') != '')
                        <a href="{{ config('social.gplus') }}" target="_blank">
                            <span class="btn btn-social socicon-bg-googleplus mx-2">
                                <i class="socicon socicon-googleplus"></i>
                            </span>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection