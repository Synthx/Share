<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <title>@yield('title') | {{ config('name') }} | {{ config('title') }}</title>
    <link rel="shortcut icon" href="{{ asset('resources/images/favicon.png') }}" type="image/x-icon">
    <meta name="description" content="{{ config('title') }}">
    <meta name="author" content="Rémi Taniel">
    <link rel="stylesheet" href="{{ asset('resources/web/assets/mobirise-icons/mobirise-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/tether/tether.min.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/bootstrap/css/bootstrap-grid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/bootstrap/css/bootstrap-reboot.min.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/dropdown/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/socicon/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/animatecss/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/theme/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/mobirise/css/mbr-additional.css') }}">
    @yield('stylesheet')
</head>
<body>
    <section class="menu cid-qLPFIklsSH">
        <nav class="navbar navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="menu-logo">
                <div class="navbar-brand">
                        <span class="navbar-logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('resources/images/favicon.png') }}" alt="{{ config('name') }}" style="height: 3.8rem;">
                            </a>
                        </span>
                    <span class="navbar-caption-wrap">
                            <a class="navbar-caption text-primary display-4" href="{{ route('home') }}">{{ strtoupper(config('name')) }}</a>
                        </span>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
                    <li class="nav-item">
                        <a class="nav-link link text-primary display-4" href="{{ route('home') }}">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link text-primary display-4" href="{{ route('trip.search') }}">Rechercher un trajet</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link text-primary display-4" href="{{ route('trip.add') }}">Proposer un trajet</a>
                    </li>
                    <li class="nav-item dropdown open">
                        <a class="nav-link link text-primary dropdown-toggle display-4" data-toggle="dropdown-submenu" aria-expanded="true">Aide</a>
                        <div class="dropdown-menu">
                            <a class="text-primary dropdown-item display-4" href="{{ route('how-it-work') }}">Comment ça marche</a>
                            <a class="text-primary dropdown-item display-4" href="{{ route('faq') }}">Foire Aux Questions</a>
                            <a class="text-primary dropdown-item display-4" href="{{ route('charter') }}">Charte de bonne conduite</a>
                            <a class="text-primary dropdown-item display-4" href="{{ route('trust') }}">Confiance et sérénité</a>
                        </div>
                    </li>
                </ul>
                <div class="navbar-buttons mbr-section-btn">
                    @if (auth())
                    <a class="btn btn-sm btn-primary display-4" href="{{ route('user.dashboard') }}">
                        <span class="mbri-user mbr-iconfont mbr-iconfont-btn"></span>Mon compte
                    </a>
                    @else
                    <a class="btn btn-sm btn-primary display-4" href="{{ route('user.login') }}">
                        <span class="mbri-login mbr-iconfont mbr-iconfont-btn"></span>Se connecter
                    </a>
                    @endif
                </div>
                @if (auth())
                <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
                    <li class="nav-item">
                        <a class="nav-link link text-primary display-4" href="{{ route('user.logout') }}">Se déconnecter</a>
                    </li>
                </ul>
                @endif
            </div>
        </nav>
    </section>
    @yield('content')
    <section class="cid-qLTRPq6GeR">
        <div class="container">
            <div class="media-container-row">
                <div class="col-md-3">
                    <div class="media-wrap">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('resources/images/favicon.png') }}" alt="{{ config('name') }}">
                        </a>
                    </div>
                </div>
                <div class="col-md-9">
                    <p class="mbr-text align-right links mbr-fonts-style display-7">
                        <a href="{{ route('about') }}">QUI SOMMES-NOUS ?</a>&nbsp; &nbsp; &nbsp;
                        <a href="{{ route('contact') }}">CONTACT</a>
                    </p>
                </div>
            </div>
            <div class="footer-lower">
                <div class="media-container-row">
                    <div class="col-md-12">
                        <hr>
                    </div>
                </div>
                <div class="media-container-row mbr-white">
                    <div class="col-md-6 copyright">
                        <p class="mbr-text mbr-fonts-style display-7">
                            © Copyright {{ date('Y') }} {{ config('name') }} - Tous droits réservés.<br />
                            Uniquement à but pédagogique.
                        </p>
                    </div>
                    <div class="col-md-6">
                        <div class="social-list align-right">
                            @if (config('social.twitter') != '')
                            <div class="soc-item">
                                <a href="{{ config('social.twitter') }}" target="_blank">
                                    <span class="socicon-twitter socicon mbr-iconfont mbr-iconfont-social"></span>
                                </a>
                            </div>
                            @endif
                            @if (config('social.facebook') != '')
                            <div class="soc-item">
                                <a href="{{ config('social.facebook') }}" target="_blank">
                                    <span class="socicon-facebook socicon mbr-iconfont mbr-iconfont-social"></span>
                                </a>
                            </div>
                            @endif
                            @if (config('social.youtube') != '')
                            <div class="soc-item">
                                <a href="{{ config('social.youtube') }}" target="_blank">
                                    <span class="socicon-youtube socicon mbr-iconfont mbr-iconfont-social"></span>
                                </a>
                            </div>
                                @endif
                            @if (config('social.instagram') != '')
                            <div class="soc-item">
                                <a href="{{ config('social.instagram') }}" target="_blank">
                                    <span class="socicon-instagram socicon mbr-iconfont mbr-iconfont-social"></span>
                                </a>
                            </div>
                            @endif
                            @if (config('social.gplus') != '')
                            <div class="soc-item">
                                <a href="{{ config('social.gplus') }}" target="_blank">
                                    <span class="socicon-googleplus socicon mbr-iconfont mbr-iconfont-social"></span>
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('resources/web/assets/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('resources/popper/popper.min.js') }}"></script>
    <script src="{{ asset('resources/tether/tether.min.js') }}"></script>
    <script src="{{ asset('resources/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('resources/smoothscroll/smooth-scroll.js') }}"></script>
    <script src="{{ asset('resources/dropdown/js/script.min.js') }}"></script>
    <script src="{{ asset('resources/touchswipe/jquery.touch-swipe.min.js') }}"></script>
    <script src="{{ asset('resources/viewportchecker/jquery.viewportchecker.js') }}"></script>
    <script src="{{ asset('resources/parallax/jarallax.min.js') }}"></script>
    @yield('script')
    <script src="{{ asset('resources/theme/js/script.js') }}"></script>
    <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i></i></a></div>
</body>
</html>