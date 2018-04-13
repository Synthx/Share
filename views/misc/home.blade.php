@extends('master')

@section('title', 'Accueil')

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('resources/datepicker/css/datepicker.min.css') }}">
@endsection

@section('content')
    <section class="header13 cid-qLPGU3P1sE mbr-fullscreen" data-bg-video="https://www.youtube.com/watch?v=Xub1gtr-etE">
        <div class="container">
            <h1 class="mbr-section-title align-center pb-3 mbr-white mbr-bold mbr-fonts-style display-1">
                Découvrez de nouveaux horizons
            </h1>
            <h3 class="mbr-section-subtitle mbr-fonts-style display-5">
                Vous allez adorer covoiturer
            </h3>
            <div class="container mt-5 pt-5 pb-5">
                <div class="media-container-column">
                    <form class="form-inline" action="{{ route('trip.list') }}" method="get">
                        {!! csrf() !!}
                        <div class="form-group">
                            <input id="origin" type="text" class="form-control input-sm input-inverse" placeholder="De" name="origin">
                        </div>
                        <div class="form-group">
                            <input id="destination" type="text" class="form-control input-sm input-inverse" placeholder="À" name="destination">
                        </div>
                        <div class="form-group">
                            <input id="date" type="text" class="form-control input-sm input-inverse" placeholder="Date" name="date">
                        </div>
                        <div class="buttons-wrap">
                            <button class="btn btn-primary display-4" type="submit">
                                <span class="mbri-search mbr-iconfont mbr-iconfont-btn"></span>
                                RECHERCHER
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="mbr-arrow hidden-sm-down" aria-hidden="true">
            <a href="#next">
                <i class="mbri-down mbr-iconfont"></i>
            </a>
        </div>
    </section>
    <section class="features15 cid-qLYTRy8ku1" id="features15-1e">
        <div class="container">
            <h2 class="mbr-section-title pb-3 align-center mbr-fonts-style display-2">
                Allez où vous voulez. D'où vous voulez.
            </h2>
            <div class="media-container-row container pt-5 mt-2">
                <div class="col-12 col-md-6 mb-4 col-lg-4">
                    <div class="card flip-card p-5 align-center">
                        <div class="card-front card_cont">
                            <img src="resources/images/jumbotron/practical.jpg">
                        </div>
                        <div class="card_back card_cont">
                            <h4 class="card-title display-5 py-2 mbr-fonts-style">
                                Pratique
                            </h4>
                            <p class="mbr-text mbr-fonts-style display-7">
                                <br />Trouvez rapidement un covoiturage à proximité parmi les milliers de trajets proposés.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-4 col-lg-4">
                    <div class="card flip-card p-5 align-center">
                        <div class="card-front card_cont">
                            <img src="resources/images/jumbotron/simple.jpg">
                        </div>
                        <div class="card_back card_cont">
                            <h4 class="card-title py-2 mbr-fonts-style display-5">
                                Simple
                            </h4>
                            <p class="mbr-text mbr-fonts-style display-7">
                                <br />Réservez le trajet parfait ! Il suffit d'entrer votre adresse exacte et de choisir avec qui vous voulez voyager.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-4 col-lg-4">
                    <div class="card flip-card p-5 align-center">
                        <div class="card-front card_cont">
                            <img src="resources/images/jumbotron/direct.jpg">
                        </div>
                        <div class="card_back card_cont">
                            <h4 class="card-title py-2 mbr-fonts-style display-5">
                                Direct
                            </h4>
                            <p class="mbr-text mbr-fonts-style display-7">
                                <br />Vous arrivez à l'adresse exacte de votre destination sans perdre de temps sur le quai ou dans les files d'attente.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="features1 cid-qLTUUiNImF" id="features1-v">
        <div class="container">
            <div class="media-container-row">
                <div class="card p-3 col-12 col-md-6 col-lg-4">
                    <div class="card-img pb-3">
                        <span class="mbr-iconfont mbri-map-pin"></span>
                    </div>
                    <div class="card-box">
                        <h4 class="card-title py-3 mbr-fonts-style display-5">Partout en France</h4>
                        <p class="mbr-text mbr-fonts-style display-7">
                            Trouvez des trajets dans toute la France et à destination de n'importes quelles villes. Soyez libre.
                        </p>
                    </div>
                </div>
                <div class="card p-3 col-12 col-md-6 col-lg-4">
                    <div class="card-img pb-3">
                        <span class="mbr-iconfont mbri-hot-cup"></span>
                    </div>
                    <div class="card-box">
                        <h4 class="card-title py-3 mbr-fonts-style display-5">Prenez le temps</h4>
                        <p class="mbr-text mbr-fonts-style display-7">
                            Avec {{ config('name') }}, finis les longues et interminables files d'attente. Réservez votre place à l'avance et profitez.
                        </p>
                    </div>
                </div>
                <div class="card p-3 col-12 col-md-6 col-lg-4">
                    <div class="card-img pb-3">
                        <span class="mbr-iconfont mbri-update"></span>
                    </div>
                    <div class="card-box">
                        <h4 class="card-title py-3 mbr-fonts-style display-5">Recommencez</h4>
                        <p class="mbr-text mbr-fonts-style display-7">
                            {{ config('name') }} est un site de covoiturage totalement gratuit, alors c'est pour quand votre prochain voyage ?
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mbr-section info2 cid-qLPIoN4qLd" id="info2-7">
        <div class="container">
            <div class="row main justify-content-center">
                <div class="media-container-column col-12 col-lg-3 col-md-4">
                    <div class="mbr-section-btn align-left py-4">
                        <a class="btn btn-primary display-4" href="{{ route('trip.search') }}">
                            <span class="mbri-plus mbr-iconfont mbr-iconfont-btn"></span>
                            GO
                        </a>
                    </div>
                </div>
                <div class="media-container-column title col-12 col-lg-7 col-md-6">
                    <h2 class="align-right mbr-bold mbr-white pb-3 mbr-fonts-style display-2">Dites-nous où vous allez !</h2>
                    <h3 class="mbr-section-subtitle align-right mbr-light mbr-white mbr-fonts-style display-5">
                        Profitez d'un trajet à moindre frais.
                    </h3>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('resources/playervimeo/vimeo_player.js') }}"></script>
    <script src="{{ asset('resources/ytplayer/jquery.mb.ytplayer.min.js') }}"></script>
    <script src="{{ asset('resources/vimeoplayer/jquery.mb.vimeo_player.js') }}"></script>
    <script src="{{ asset('resources/datepicker/js/datepicker.min.js') }}"></script>
    <script src="{{ asset('resources/datepicker/js/i18n/datepicker.fr.js') }}"></script>
    <script type="text/javascript">
        $('#date').datepicker({
            language: 'fr',
            autoClose: true,
            minDate: new Date()
        });
        function initMap()
        {
            var options = {
                types: ['(cities)'],
                componentRestrictions: {country: 'fr'}
            };
            var origin = new google.maps.places.Autocomplete(document.getElementById('origin'), options);
            var destination = new google.maps.places.Autocomplete(document.getElementById('destination'), options);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('maps.key') }}&libraries=places&callback=initMap&language=fr" async defer></script>
@endsection