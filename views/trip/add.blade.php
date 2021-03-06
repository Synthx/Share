@extends('master')

@section('title', 'Proposer un trajet')

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('resources/datepicker/css/datepicker.min.css') }}">
@endsection

@section('content')
<section class="header1 headerAddTrip mbr-parallax-background">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="mbr-white col-md-10">
                <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-1">
                    Proposer un trajet
                </h3>
                <p class="mbr-text align-center pb-3 mbr-fonts-style display-5">
                    Publier une annonce.
                </p>
            </div>
        </div>
    </div>
</section>
<section class="cid-qNNlS2SzeQ">
    <div class="container-fluid">
        <div class="row tabcont">
            <ul class="nav nav-tabs pt-3 mt-5">
                <li class="nav-item mbr-fonts-style">
                    <span id="tab0" class="nav-link display-7">
                        1 - Votre itinéraire
                    </span>
                </li>
                <li class="nav-item mbr-fonts-style">
                    <span id="tab1" class="nav-link display-7">
                        2 - Votre annonce
                    </span>
                </li>
                <li class="nav-item mbr-fonts-style">
                    <span id="tab2" class="nav-link display-7">
                        3 - Validation
                    </span>
                </li>
            </ul>
        </div>
    </div>
    <form class="mbr-form" method="post" action="{{ route('trip.add') }}">
        {!! csrf() !!}
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="row px-1">
                        <div class="tab-content">
                            <div class="tab tab-pane mbr-table">
                                <section class="mbr-section form4 cid-qNNebuK87A">
                                    <div class="container">
                                        <div class="row">
                                            <h5 class="align-left mbr-fonts-style display-7">
                                                Votre itinéraire :
                                            </h5>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    @if($errors->has('origin'))
                                                    <div data-form-alert>
                                                        <div class="alert alert-form alert-danger text-xs-center">
                                                            {{ $errors->get('origin') }}
                                                        </div>
                                                    </div>
                                                    @endif
                                                    <label class="form-control-label mbr-fonts-style display-7">D'où partez-vous ?</label>
                                                    <input id="origin" type="text" class="form-control input" value="{{ old('origin') }}" name="origin" placeholder="Exemple : 58 Rue du Moulin">
                                                </div>
                                                <div class="col-md-12">
                                                    @if($errors->has('destination'))
                                                    <div data-form-alert>
                                                        <div class="alert alert-form alert-danger text-xs-center">
                                                            {{ $errors->get('destination') }}
                                                        </div>
                                                    </div>
                                                    @endif
                                                    <label class="form-control-label mbr-fonts-style display-7">Où allez-vous ?</label>
                                                    <input id="destination" type="text" class="form-control input" value="{{ old('destination') }}" name="destination" placeholder="Exemple : 58 Rue du Moulin">
                                                </div>
                                                <div class="col-md-12">
                                                    @if($errors->has('date'))
                                                    <div data-form-alert>
                                                        <div class="alert alert-form alert-danger text-xs-center">
                                                            {{ $errors->get('date') }}
                                                        </div>
                                                    </div>
                                                    @endif
                                                    <label class="form-control-label mbr-fonts-style display-7">Quand ?</label>
                                                    <input id="date" type="text" class="form-control input" value="{{ old('date') }}" name="date" placeholder="JJ/MM/AAAA HH:MM">
                                                </div>
                                                <div class="input-group-btn col-md-12" style="margin-top: 10px;">
                                                    <a onclick="changeTab(1)" class="btn btn-primary btn-form display-4">
                                                        <span class="mbri-right mbr-iconfont mbr-iconfont-btn"></span>
                                                        CONTINUER
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <div class="tab tab-pane mbr-table">
                                <section class="mbr-section form4 cid-qNNebuK87A">
                                    <div class="container">
                                        <div class="row">
                                            <h5 class="align-left mbr-fonts-style display-7">
                                                Votre annonce :
                                            </h5>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    @if($errors->has('price'))
                                                    <div data-form-alert>
                                                        <div class="alert alert-form alert-danger text-xs-center">
                                                            {{ $errors->get('price') }}
                                                        </div>
                                                    </div>
                                                    @endif
                                                    <label class="form-control-label mbr-fonts-style display-7">Prix par passager :</label>
                                                    <input id="price" type="number" onchange="verifyPrice()" min="1" class="form-control input" value="{{ old('price') }}" name="price" placeholder="Exemple : 15">
                                                </div>
                                                <div class="col-md-12">
                                                    @if($errors->has('places'))
                                                    <div data-form-alert>
                                                        <div class="alert alert-form alert-danger text-xs-center">
                                                            {{ $errors->get('places') }}
                                                        </div>
                                                    </div>
                                                    @endif
                                                    <label class="form-control-label mbr-fonts-style display-7">Nombre de places :</label>
                                                    <input id="places" type="number" onchange="verifyPlaces()" min="1" max="4" class="form-control input" value="{{ old('places') }}" name="places" placeholder="Exemple : 3">
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-control-label mbr-fonts-style display-7">Avez-vous d'autres précisions à apporter sur votre trajet ? (facultatif)</label>
                                                    <textarea id="comment" class="form-control input" placeholder="Vous êtes flexible sur le lieu et l'heure du rendez-vous ? Vous ne prenez pas l'autoroute ? Vous n'avez pas beaucoup de place dans votre coffre ? Informez-en vos passagers." rows="4" name="comment">{{ old('comment') }}</textarea>
                                                </div>
                                                <div class="input-group-btn col-md-12" style="margin-top: 10px;">
                                                    <a onclick="changeTab(-1)" class="btn btn-secondary btn-form display-4">
                                                        <span class="mbri-left mbr-iconfont mbr-iconfont-btn"></span>
                                                        PRÉCÉDENT
                                                    </a>
                                                    <a onclick="changeTab(1)" class="btn btn-primary btn-form display-4">
                                                        <span class="mbri-right mbr-iconfont mbr-iconfont-btn"></span>
                                                        CONTINUER
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <div class="tab tab-pane">
                                <section class="mbr-section form4 cid-qNNebuK87A">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h5 class="align-left mbr-fonts-style display-7">
                                                    Récapitulatif :
                                                </h5>
                                                <div id="res"></div>
                                            </div>
                                            <div class="input-group-btn col-md-12" style="margin-top: 10px;">
                                                <a onclick="changeTab(-1)" class="btn btn-secondary btn-form display-4">
                                                    <span class="mbri-left mbr-iconfont mbr-iconfont-btn"></span>
                                                    PRÉCÉDENT
                                                </a>
                                                <button type="submit" class="btn btn-primary btn-form display-4">
                                                    <span class="mbri-success mbr-iconfont mbr-iconfont-btn"></span>
                                                    VALIDER
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div id="g_map"></div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection

@section('script')
    <script type="text/javascript">
        current = 0;
        changeTab(current);
        function changeTab(n)
        {
            current += n;
            if (current === 2)
            {
                document.getElementById('res').innerHTML = '<p>'+
                    document.getElementById('origin').value + ' → ' + document.getElementById('destination').value + '<br />' +
                    'Le '+ document.getElementById('date').value + '<br />' +
                    document.getElementById('price').value + '€ par passager (' + document.getElementById('places').value + ' places disponibles)<br />' +
                    'Commentaire : <br />' + document.getElementById('comment').value + '</p>';
            }
            var i, tabs = document.getElementsByClassName('tab');
            for (i=0; i < tabs.length; i++) {
                if (i !== current) {
                    tabs[i].style.display = 'none';
                    document.getElementById('tab'+i).classList.remove('active');
                }
                else {
                    tabs[i].style.display = 'block';
                    document.getElementById('tab'+i).classList.add('active');
                }
            }
        }
        function verifyPrice()
        {
            var input = document.getElementById('price');
            if (input.value < 1)
                input.value = 1;
        }
        function verifyPlaces()
        {
            var input = document.getElementById('places');
            if (input.value < 1)
                input.value = 1;
            else if (input.value > 4)
                input.value = 4;
        }
        function initMap()
        {
            var directionsDisplay = new google.maps.DirectionsRenderer;
            var directionsService = new google.maps.DirectionsService;
            var center = {lat: 46.52863469527167, lng: 2.43896484375};
            map = new google.maps.Map(document.getElementById('g_map'), {
                zoom: 5,
                center: center,
                mapTypeControl: false,
                scaleControl: false,
                streetViewControl: false,
                rotateControl: false
            });
            directionsDisplay.setMap(map);
            var options = {
                componentRestrictions: {country: 'fr'}
            };
            var depart_marker = new google.maps.Marker({
                map: map,
                label: {
                    text: 'A',
                    color: 'white'
                },
                title: 'Point de départ'
            });
            depart_marker.setVisible(false);
            var arrival_marker = new google.maps.Marker({
                map: map,
                label: {
                    text: 'B',
                    color: 'white'
                },
                title: 'Point d\'arrivé'
            });
            arrival_marker.setVisible(false);
            var origin = new google.maps.places.Autocomplete(document.getElementById('origin'), options);
            var destination = new google.maps.places.Autocomplete(document.getElementById('destination'), options);
            origin.addListener('place_changed', function() {
                var o_place = origin.getPlace();
                var d_place = destination.getPlace();
                if (!o_place.geometry)
                {
                    depart_marker.setVisible(false);
                    return;
                }
                drawMarker(depart_marker, o_place.geometry.location);
                if (o_place.geometry && d_place.geometry) {
                    depart_marker.setVisible(false);
                    arrival_marker.setVisible(false);
                    displayRoute(directionsService, directionsDisplay, o_place.geometry.location, d_place.geometry.location);
                }
            });
            destination.addListener('place_changed', function() {
                var o_place = origin.getPlace();
                var d_place = destination.getPlace();
                if (!d_place.geometry)
                {
                    depart_marker.setVisible(false);
                    return;
                }
                drawMarker(arrival_marker, d_place.geometry.location);
                if (d_place.geometry && o_place.geometry) {
                    depart_marker.setVisible(false);
                    arrival_marker.setVisible(false);
                    displayRoute(directionsService, directionsDisplay, o_place.geometry.location, d_place.geometry.location);
                }
            });
        }
        function drawMarker(marker, location)
        {
            marker.setVisible(false);
            marker.setPosition(location);
            marker.setVisible(true);
            map.setCenter(location);
            map.setZoom(12);
        }
        function displayRoute(directionsService, directionsDisplay, origin, destination)
        {
            directionsService.route({
                origin: origin,
                destination: destination,
                travelMode: 'DRIVING'
            }, function(response, status) {
                if (status == 'OK') {
                    directionsDisplay.setDirections(response);
                } else {
                    window.alert('Directions request failed due to ' + status);
                }
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('maps.key') }}&libraries=places&callback=initMap&language=fr" async defer></script>
    <script src="{{ asset('resources/datepicker/js/datepicker.min.js') }}"></script>
    <script src="{{ asset('resources/datepicker/js/i18n/datepicker.fr.js') }}"></script>
    <script type="text/javascript">
        $('#date').datepicker({
            timepicker: true,
            language: 'fr',
            autoClose: true,
            minDate: new Date()
        });
    </script>
@endsection