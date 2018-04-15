@extends('master')

@section('title', 'Réserver une place')

@section('content')
    @php
    $passengers = (empty($trip->passengers)) ? [] : explode(',', $trip->passengers)
    @endphp
    <section class="header1 headerDetail mbr-parallax-background">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="mbr-white col-md-10">
                    <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-1">
                        Réserver une place
                    </h3>
                    <p class="mbr-text align-center pb-3 mbr-fonts-style display-5">
                        Trouvez celui qui vous corresponds le mieux.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="mbr-section info1 cid-qPhbNVglFP">
        <div class="container">
            <div class="row justify-content-center content-row">
                <div class="media-container-column title col-12 col-lg-7 col-md-6">
                    <h3 class="mbr-section-subtitle align-left mbr-light pb-3 mbr-fonts-style display-5">
                        Annonce publiée le @date(new DateTime($trip->post_date))
                    </h3>
                    <h2 class="align-left mbr-bold mbr-fonts-style display-2">
                        {{ $trip->origin_city }} → {{ $trip->destination_city }}
                    </h2>
                </div>
                <div class="media-container-column col-12 col-lg-3 col-md-4">
                    <div class="mbr-section-btn align-right py-4">
                        @if (guest() || (auth() && $driver->id != user()->id) && (auth() && !in_array(user()->id, $passengers)))
                        <form method="post" action="{{ route('trip.view') }}?id={{ $trip->id }}">
                            {!! csrf() !!}
                            <button class="btn btn-primary display-4" style="margin: .0rem;">
                                <span class="mbri-success mbr-iconfont mbr-iconfont-btn"></span>
                                RÉSERVER
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="cid-qPhcWHI2SW">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="mbr-section-text">
                        <p class="mbr-text mb-4 pt-3 mbr-light mbr-fonts-style display-5">
                            Informations sur le trajet
                        </p>
                        <p class="mbr-text mbr-fonts-style display-4">
                            Départ : {{ $trip->origin }}<br />
                            Arrivé : {{ $trip->destination }}<br />
                            Date : Le @datetime(new DateTime($trip->date))<br />
                            @if (!empty($trip->comment))
                            <br />
                            Commentaire de {{ $driver->first_name }} :<br />
                            {{ $trip->comment }}
                            @endif
                        </p>
                        <div class="align-left">
                            <p class="mbr-fonts-style display-7">
                                <span style="font-size: 2rem;">{{ $trip->price }}</span>€<br />
                                par place<br />
                                <span style="font-size: 1.8rem;">{{ $trip->remaining }}</span> place(s) restante(s)
                            </p>
                            @if (guest() || (auth() && $driver->id != user()->id) && (auth() && !in_array(user()->id, $passengers)))
                            <form method="post" action="{{ route('trip.view') }}?id={{ $trip->id }}">
                                {!! csrf() !!}
                                <button class="btn btn-primary display-4" style="margin: .0rem;">
                                    <span class="mbri-success mbr-iconfont mbr-iconfont-btn"></span>
                                    RÉSERVER
                                </button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div id="g_map"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="cid-qNiBy6X3PI">
        <div class="container testimonials-container">
            <div class="col-md-12">
                <div class="testimonials-item">
                    <div class="user row">
                        <div class="col-lg-3">
                            <div class="user_image">
                                @if (empty($driver->image))
                                <img style="border-radius: 50%;" src="{{ asset('resources/images/avatar/' . $driver->sex . '.png') }}">
                                @else

                                @endif
                            </div>
                            <p class="mbr-fonts-style display-7" style="margin-left: 2rem;">
                                <b>{{ ucfirst($driver->first_name) }}</b><br />
                                {{ date('Y') - $driver->birth_year }} ans
                            </p>
                        </div>
                        <div class="testimonials-caption col-lg-2">
                            <div class="user_text">
                                <p class="mbr-fonts-style display-7">
                                    <b>Véhicule</b><br/>
                                    @if ($driver->car)
                                    {{ $driver->car }}<br />
                                    Couleur : {{ $driver->car_color }}<br /><br />
                                    @else
                                    Non renseigné<br /><br />
                                    @endif
                                    <b>Préférences</b><br />
                                    @if ($driver->pref_bla) <span class='prefs blablabla'></span> @else <span class='prefs bla'></span> @endif
                                    @if ($driver->pref_music) <span class='prefs music'></span> @else <span class='prefs no-music'></span> @endif
                                    @if ($driver->pref_smoke) <span class='prefs smoking'></span> @else <span class='prefs no-smoking'></span> @endif
                                    @if ($driver->pref_pet) <span class='prefs pet'></span> @else <span class='prefs no-pet'></span> @endif
                                </p>
                            </div>
                        </div>
                        <div class="testimonials-caption col-lg-4">
                            <div class="user_text">
                                <p class="mbr-fonts-style display-7">
                                    @if ($driver->recommendation)
                                    <b>Recommendations</b><br/>
                                    <svg viewBox="0 0 24 24" class="icon-star">
                                        <path d="M23.717,8.832c-0.153-0.157-0.354-0.259-0.57-0.291L23.145,8.54l-7.08-1.028L12.9,1.1
	                                            c-0.291-0.496-0.928-0.662-1.424-0.371c-0.153,0.09-0.281,0.217-0.371,0.371l-3.17,6.412l-7.08,1.03
	                                            C0.31,8.622-0.069,9.13,0.011,9.676c0.032,0.216,0.133,0.416,0.289,0.569l5.125,4.994l-1.21,7.053
	                                            c-0.093,0.544,0.272,1.062,0.816,1.155c0.217,0.037,0.441,0.002,0.636-0.102L12,20.018l6.333,3.33
	                                            c0.489,0.256,1.094,0.066,1.351-0.422c0.102-0.194,0.137-0.416,0.1-0.633l-1.208-7.053l5.125-4.994
	                                            C24.096,9.86,24.103,9.227,23.717,8.832z">
                                        </path>
                                    </svg>
                                    {{ $driver->recommendation }}/5<br />
                                    {{ $driver->number_recommendation }} avis<br /><br />
                                    @endif
                                    <b>Activité</b><br />
                                    Annonces publiées : {{ $driver->number_trips }}<br />
                                    Dernière connexion le @date(new DateTime($driver->login_date))<br />
                                    Membre depuis @datemonth(new DateTime($driver->register_date))
                                </p>
                            </div>
                        </div>
                        <div class="testimonials-caption col-lg-3 align-right">
                            <a class="btn btn-primary display-4" style="margin: .0rem;" href="{{ route('user.profile') }}?id={{ $driver->id }}" target="_blank">
                                <span class="mbri-plus mbr-iconfont mbr-iconfont-btn"></span>
                                VOIR
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script type="text/javascript">
        function initMap()
        {
            var directionsDisplay = new google.maps.DirectionsRenderer;
            var directionsService = new google.maps.DirectionsService;
            var geocoder = new google.maps.Geocoder();
            var map = new google.maps.Map(document.getElementById('g_map'), {
                zoom: 5,
                center: {lat: 46.52863469527167, lng: 2.43896484375},
                mapTypeControl: false,
                scaleControl: false,
                streetViewControl: false,
                rotateControl: false
            });
            directionsDisplay.setMap(map);

            var origin_address = '{{ $trip->origin }}', destination_address = '{{ $trip->destination }}';
            var origin_location, destination_location;

            geocoder.geocode({'address': origin_address}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    origin_location = results[0].geometry.location;
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });
            geocoder.geocode({'address': destination_address}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    destination_location = results[0].geometry.location;
                    displayRoute(directionsService, directionsDisplay, origin_location, destination_location);
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });
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
                    alert('Directions request failed due to ' + status);
                }
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('maps.key') }}&callback=initMap&language=fr" async defer></script>
@endsection