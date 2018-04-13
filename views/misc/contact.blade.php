@extends('master')

@section('title', 'Nous contacter')

@section('content')
    <section class="header1 headerContact mbr-parallax-background">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="mbr-white col-md-10">
                    <h1 class="mbr-section-title align-center mbr-bold pb-3 mbr-fonts-style display-1"></h1>
                    <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-1">
                        Nous contacter
                    </h3>
                    <p class="mbr-text align-center pb-3 mbr-fonts-style display-5">
                        Car nous sommes toujours à l'écoute de vos problèmes.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="mbr-section form1 cid-qLUVPx3Ulm">
        <div class="container">
            <div class="row justify-content-center">
                <div class="media-container-column col-lg-10">
                    <form class="mbr-form" action="{{ route('contact') }}" method="post">
                        {!! csrf() !!}
                        @if ($errors->count() > 0)
                        <div data-form-alert>
                            <div class="alert alert-form alert-danger text-xs-center">
                                @foreach($errors->all() as $error)
                                {{ $error }}<br />
                                @endforeach
                            </div>
                        </div>
                        @elseif (flashExist('success'))
                        <div data-form-alert>
                            <div class="alert alert-form alert-success text-xs-center">
                                {{  flashGet('success') }}
                            </div>
                        </div>
                        @endif
                        @if(guest())
                        <div class="row row-sm-offset">
                            <div class="col-md-4 multi-horizontal">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7">Nom</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="col-md-4 multi-horizontal">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7">Prénom</label>
                                    <input type="text" class="form-control" name="fisrtname" value="{{ old('firstname') }}">
                                </div>
                            </div>
                            <div class="col-md-4 multi-horizontal">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7">E-mail</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="form-group">
                            <label class="form-control-label mbr-fonts-style display-7">Message</label>
                            <textarea type="text" class="form-control" name="message" rows="7">{{ old('message') }}</textarea>
                        </div>
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary btn-form display-4">
                                <span class="mbri-paper-plane mbr-iconfont mbr-iconfont-btn"></span>
                                ENVOYER
                            </button>
                        </span>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection