@extends('master')

@section('title', 'Rechercher un trajet')

@section('content')
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
                                <h3 class="mbr-section-subtitle mbr-light pb-3 mbr-fonts-style mbr-white align-center display-5">
                                    {{ $total }} trajets disponibles.
                                </h3>
                                <div class="col-md-12 testimonials-container">
                                    <div class="align-right">
                                        <span>Trier par</span>

                                    </div>
                                    @foreach ($trips as $trip)
                                    @php
                                    $driver = Models\User::find($trip->driver);
                                    @endphp
                                    <div class="testimonials-item">
                                        <div class="user row">
                                            <div class="col-lg-3 col-md-4">
                                                <div class="user_image">
                                                    @if (empty($driver->image))
                                                    <img style="border-radius: 50%;" src="{{ asset('resources/images/avatar/' . $driver->sex . '.png') }}">
                                                    @else

                                                    @endif
                                                </div>
                                                <p class="mbr-fonts-style display-7" style="margin-left: 2rem;">
                                                    <b>{{ $driver->first_name }}</b><br />
                                                    {{ date('Y') - $driver->birth_year }} ans
                                                </p>
                                            </div>
                                            <div class="testimonials-caption col-lg-6 col-md-8">
                                                <div class="user_text">
                                                    <p class="mbr-fonts-style display-7">
                                                        <span style="font-size: 1.3rem;">
                                                            <b>Le @datetime(new DateTime($trip->date))</b><br />
                                                            {{ $trip->origin_city }} → {{ $trip->destination_city }}<br /><br/>
                                                        </span>
                                                        • {{ $trip->origin }}<br />
                                                        • {{ $trip->destination }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="testimonials-caption col-lg-3 align-right">
                                                <div class="user_text">
                                                    <p class="mbr-fonts-style display-7">
                                                        <span style="font-size: 2rem;">{{ $trip->price }}</span>€<br />
                                                        par place<br />
                                                        <span style="font-size: 1.8rem;">{{ $trip->remaining }}</span> place(s) restante(s)
                                                    </p>
                                                </div>
                                                <a class="btn btn-primary display-4" style="margin: .0rem;" href="{{ route('trip.view') }}?id={{ $trip->id }}">
                                                    <span class="mbri-success mbr-iconfont mbr-iconfont-btn" style="font-size: 1rem;"></span>
                                                    RÉSERVER
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="align-left">
                                        <a class="btn btn-primary display-4" style="margin: 25px 0px;" href="{{ route('trip.search') }}">
                                            <span class="mbri-left mbr-iconfont mbr-iconfont-btn" style="font-size: 1rem;"></span>
                                            RETOUR
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection