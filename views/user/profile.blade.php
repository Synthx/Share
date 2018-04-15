@extends('master')

@section('title', 'Voir un profil')

@section('content')
    <section class="header1 headerProfile mbr-parallax-background">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="mbr-white col-md-10">
                    <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-1">
                        Voir un profil
                    </h3>
                    <p class="mbr-text align-center pb-3 mbr-fonts-style display-5">
                        Pour mieux connaître nos membres.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="mbr-section article content1 cid-qPiTqkNo2w">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <p class="mbr-text mbr-fonts-style display-4">
                        <b>Activité</b><br />
                        Annonces publiées : {{ $user->number_trips }}<br />
                        Dernière connexion le @date(new DateTime($user->login_date))<br />
                        Membre depuis @datemonth(new DateTime($user->register_date))<br /><br />
                    </p>
                    <hr />
                    <p class="mbr-text mbr-fonts-style display-4">
                        <br />
                        <b>Véhicule</b><br />
                        @if ($user->car)
                        {{ $user->car }}<br />
                        Couleur : {{ $user->car_color }}<br /><br />
                        @else
                        Non renseigné<br /><br />
                        @endif
                    </p>
                    <hr />
                    <br />
                    <div class="align-center">
                        <a class="btn btn-primary display-4" style="margin: .0rem;" href="#">
                            <span class="mbri-cust-feedback mbr-iconfont mbr-iconfont-btn"></span>
                            CONTACTER
                        </a>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-4">
                            @if (empty($user->image))
                            <img style="border-radius: 50%;" src="{{ asset('resources/images/avatar/' . $user->sex . '.png') }}">
                            @else

                            @endif
                        </div>
                        <div class="col-md-8">
                            <p class="mbr-text mb-4 pt-3 mbr-light mbr-fonts-style display-5">
                                <b>{{ ucfirst($user->first_name) }} {{ ucfirst(substr($user->last_name, 0, 1)) }}</b><br />
                                {{ date('Y') - $user->birth_year }} ans
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="mbr-text mb-4 pt-3 mbr-light mbr-fonts-style display-5">
                                @if ($user->recommendation)
                                Avis moyen :
                                <svg viewBox="0 0 24 24" class="icon-star">
                                    <path d="M23.717,8.832c-0.153-0.157-0.354-0.259-0.57-0.291L23.145,8.54l-7.08-1.028L12.9,1.1
	                                            c-0.291-0.496-0.928-0.662-1.424-0.371c-0.153,0.09-0.281,0.217-0.371,0.371l-3.17,6.412l-7.08,1.03
	                                            C0.31,8.622-0.069,9.13,0.011,9.676c0.032,0.216,0.133,0.416,0.289,0.569l5.125,4.994l-1.21,7.053
	                                            c-0.093,0.544,0.272,1.062,0.816,1.155c0.217,0.037,0.441,0.002,0.636-0.102L12,20.018l6.333,3.33
	                                            c0.489,0.256,1.094,0.066,1.351-0.422c0.102-0.194,0.137-0.416,0.1-0.633l-1.208-7.053l5.125-4.994
	                                            C24.096,9.86,24.103,9.227,23.717,8.832z">
                                    </path>
                                </svg>
                                {{ $user->recommendation }}/5 - {{ $user->number_recommendation }} avis<br />
                                @endif
                                Préférences : <br/>
                                @if ($user->pref_bla) <span class='prefs blablabla'></span> @else <span class='prefs bla'></span> @endif
                                @if ($user->pref_music) <span class='prefs music'></span> @else <span class='prefs no-music'></span> @endif
                                @if ($user->pref_smoke) <span class='prefs smoking'></span> @else <span class='prefs no-smoking'></span> @endif
                                @if ($user->pref_pet) <span class='prefs pet'></span> @else <span class='prefs no-pet'></span> @endif
                            </p>
                            <br /><br />
                            <div class="member-bio padding clearfix">
                                <span class="bio-bubble"></span>
                                @if ($user->minibio)
                                <h2>En quelques mots...</h2>
                                <p>"{{ $user->minibio }}"</p>
                                @else
                                <p>Je n'ai pas encore rédigé de minibio</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection