@extends('master')

@section('title', 'Tableau de bord')

@section('content')
    <section class="header1 headerManage mbr-parallax-background">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="mbr-white col-md-10">
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
        <div class="container-fluid">
            @include('user.dashboard.menu', ['current' => 'reservations'])
        </div>
        <div class="container">
            <div class="row px-1">
                <div class="tab-content">
                    <div class="tab-pane in active mbr-table">
                        <section class="testimonials4 cid-qNiBy6X3PI">
                            <div class="container">
                                @if (flashExist('success'))
                                <div data-form-alert>
                                    <div class="alert alert-form alert-success text-xs-center">
                                        {{ flashGet('success') }}
                                    </div>
                                </div>
                                @endif
                                <h2 class="pb-3 mbr-fonts-style mbr-white align-center display-2">
                                    Mes réservations
                                </h2>
                                @if (empty($trips))
                                <h3 class="mbr-section-subtitle mbr-light pb-3 mbr-fonts-style mbr-white align-center display-5">
                                    Vous n'avez pas de réservations de prévu.
                                </h3>
                                @else
                                <h3 class="mbr-section-subtitle mbr-light pb-3 mbr-fonts-style mbr-white align-center display-5">
                                    Mes 5 prochaines réservations.
                                </h3>
                                <div class="col-md-12 testimonials-container">
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
                                                    <b>{{ ucfirst($driver->first_name) }}</b><br />
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
                                                    <span class="mbri-plus mbr-iconfont mbr-iconfont-btn" style="font-size: 1rem;"></span>
                                                    VOIR
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection