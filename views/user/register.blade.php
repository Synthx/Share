@extends('master')

@section('title', 'S\'inscrire')

@section('content')
<section class="header1 headerCredentials mbr-parallax-background">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="mbr-white col-md-10">
                <h1 class="mbr-section-title align-center mbr-bold pb-3 mbr-fonts-style display-1"></h1>
                <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-1">
                    Mon compte
                </h3>
                <p class="mbr-text align-center pb-3 mbr-fonts-style display-5">
                    Accéder à mon espace personnel.
                </p>
            </div>
        </div>
    </div>
</section>
<section class="cid-qLZfaVbajL">
    <div class="container-fluid">
        <div class="row tabcont">
            <ul class="nav nav-tabs pt-3 mt-5">
                <li class="nav-item mbr-fonts-style">
                    <a class="nav-link show display-7" href="{{ route('user.login') }}">
                        SE CONNECTER
                    </a>
                </li>
                <li class="nav-item mbr-fonts-style">
                    <a class="nav-link active show display-7">
                        S'INSCRIRE
                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>
<section class="mbr-section form1 cid-qLZfO1r5jo">
    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-6">
                <form class="mbr-form" action="{{ route('user.register') }}" method="post" autocomplete="off">
                    {!! csrf() !!}
                    <div class="row row-sm-offset">
                        <div class="col-md-12">
                            @if ($errors->count() > 0)
                            <div data-form-alert>
                                <div class="alert alert-form alert-danger text-xs-center">
                                    @foreach($errors->all() as $error)
                                    {{ $error }}<br />
                                    @endforeach
                                </div>
                            </div>
                            @elseif (flashExist('error'))
                            <div data-form-alert>
                                <div class="alert alert-form alert-danger text-xs-center">
                                    {{ flashGet('error') }}
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label mbr-fonts-style display-7">Nom</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label mbr-fonts-style display-7">Prénom</label>
                                <input type="text" class="form-control" name="firstname" value="{{ old('firstname') }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label mbr-fonts-style display-7">Sexe</label>
                                <select name="sex" class="form-control">
                                    <option @if (empty(old('sex'))) selected @endif></option>
                                    <option @if (old('sex') == 'f') selected @endif value="f">Femme</option>
                                    <option @if (old('sex') == 'm') selected @endif value="m">Homme</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label mbr-fonts-style display-7" >E-mail</label>
                                <input type="email" class="form-control" name="register_email" value="{{ old('register_email') }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label mbr-fonts-style display-7">Mot de passe</label>
                                <input type="password" class="form-control" name="register_password" value="{{ old('register_password') }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label mbr-fonts-style display-7">Année de naissance</label>
                                <input type="number" class="form-control" name="year" value="{{ old('year', date('Y') - 18) }}">
                            </div>
                        </div>
                    </div>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary btn-form display-4">
                            <span class="mbri-success mbr-iconfont mbr-iconfont-btn"></span>
                            VALIDER
                        </button>
                    </span>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection