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
        <div class="container">
            <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2" style="padding-top: 65px;">
                Bonjour {{ ucfirst(user()->first_name)  }},
            </h2>
        </div>
        <div class="container-fluid">
            @include('user.dashboard.menu', ['current' => 'home'])
        </div>
        <div class="container">
            <div class="row px-1">
                <div class="tab-content">
                    <div class="tab-pane in active mbr-table">
                        @if ($notifs->count() > 0)
                        <section class="mbr-section article content12 cid-qOgSE2PoFL">
                            <div class="container">
                                <h2 class="mbr-section-title pb-3 align-left mbr-fonts-style display-2">
                                    Notifications ({{ $notifs->count() }})
                                </h2>
                                <div class="media-container-row">
                                    <div class="mbr-text counter-container col-12 col-md-12 mbr-fonts-style display-7">
                                        <ul>
                                            @foreach ($notifs->get() as $notif)
                                            <li><strong>{{ $notif['title'] }}</strong> - {{ $notif['message'] }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </section>
                        @endif
                        <section class="counters2 counters cid-qOgREAtAA8" id="counters2-v">
                            <div class="container pt-4 mt-2">
                                <div class="media-container-row">
                                    <div class="media-block" style="width: 50%;">
                                        <h2 class="mbr-section-title pb-3 align-left mbr-fonts-style display-2">
                                            Tableau de bord
                                        </h2>
                                        <h3 class="mbr-section-subtitle pb-5 align-left mbr-fonts-style display-5">
                                            Mes informations essentielles.
                                        </h3>
                                        <div class="mbr-figure">
                                            <img src="{{ asset('resources/images/account.jpg') }}">
                                        </div>
                                    </div>
                                    <div class="cards-block">
                                        <div class="cards-container">
                                            <div class="card px-3 align-left col-12 col-md-6">
                                                <div class="panel-item p-3">
                                                    <div class="card-img pb-3">
                                                        <span class="mbr-iconfont pr-2 mbri-laptop"></span>
                                                        <h3 class="count py-3 mbr-fonts-style display-2">
                                                            100
                                                        </h3>
                                                    </div>
                                                    <div class="card-text">
                                                        <h4 class="mbr-content-title mbr-bold mbr-fonts-style display-7">
                                                            Nouveaux messages
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card px-3 align-left col-12 col-md-6">
                                                <div class="panel-item p-3">
                                                    <div class="card-img pb-3">
                                                        <span class="mbr-iconfont pr-2 mbri-alert"></span>
                                                        <h3 class="count py-3 mbr-fonts-style display-2">
                                                            200
                                                        </h3>
                                                    </div>
                                                    <div class="card-text">
                                                        <h4 class="mbr-content-title mbr-bold mbr-fonts-style display-7">
                                                            Alertes
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card px-3 align-left col-12 col-md-6">
                                                <div class="panel-item p-3">
                                                    <div class="card-img pb-3">
                                                        <span class="mbr-iconfont pr-2 mbri-calendar"></span>
                                                        <h3 class="count py-3 mbr-fonts-style display-2">
                                                            {{ Models\Trip::where('passengers', 'like', '%'. user()->id . '%')->afterToday('date')->count() }}
                                                        </h3>
                                                    </div>
                                                    <div class="card-text">
                                                        <h4 class="mbr-content-title mbr-bold mbr-fonts-style display-7">
                                                            Prochains réservations
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card px-3 align-left col-12 col-md-6">
                                                <div class="panel-item p-3">
                                                    <div class="card-img pb-3">
                                                        <span class="mbr-iconfont pr-2 mbri-map-pin"></span>
                                                        <h3 class="count py-3 mbr-fonts-style display-2">
                                                            {{ Models\Trip::where('driver', user()->id)->afterToday('date')->count() }}
                                                        </h3>
                                                    </div>
                                                    <div class="card-texts">
                                                        <h4 class="mbr-content-title mbr-bold mbr-fonts-style display-7">
                                                            Prochains trajets
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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