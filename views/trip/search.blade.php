@extends('master')

@section('title', 'Rechercher un trajet')

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('resources/datepicker/css/datepicker.min.css') }}">
@endsection

@section('content')
<section class="header1 headerTrip mbr-parallax-background">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="mbr-white col-md-10">
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
<section class="mbr-section form1 cid-qNq7tjufWh">
    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-12">
                @if ($errors->count() > 0)
                <div data-form-alert>
                    <div class="alert alert-form alert-danger text-xs-center">
                        @foreach($errors->all() as $error)
                        {{ $error }}<br />
                        @endforeach
                    </div>
                </div>
                @endif
                <form class="mbr-form" action="{{ route('trip.list') }}" method="get" autocomplete="off">
                    <div class="row row-sm-offset">
                        <div class="col-md-3 multi-horizontal">
                            <div class="form-group">
                                <input id="origin" type="text" class="form-control" placeholder="De" name="origin" value="{{ old('origin') }}">
                            </div>
                        </div>
                        <div class="col-md-3 multi-horizontal">
                            <div class="form-group">
                                <input id="destination" type="text" class="form-control" placeholder="À" name="destination" value="{{ old('destination') }}">
                            </div>
                        </div>
                        <div class="col-md-3 multi-horizontal">
                            <div class="form-group">
                                <input id="date" type="text" class="form-control" placeholder="Date" name="date" value="{{ old('date') }}">
                            </div>
                        </div>
                       <div class="col-md-3 multi-horizontal">
                           <span class="input-group-btn">
                               <button type="submit" class="btn btn-primary btn-form display-4">
                                   <span class="mbri-search mbr-iconfont mbr-iconfont-btn"></span>
                                   RECHERCHER
                               </button>
                           </span>
                       </div>
                    </div>
                </form>
            </div>
            <img class="image-search" src="{{ asset('resources/images/search.png') }}" />
        </div>
    </div>
</section>
@endsection

@section('script')
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