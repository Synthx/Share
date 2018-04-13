@extends('master')

@section('title', 'Voyagez en toute confiance')

@section('content')
<section class="header1 headerTrust mbr-parallax-background">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="mbr-white col-md-10">
                <h1 class="mbr-section-title align-center mbr-bold pb-3 mbr-fonts-style display-1">Voyagez en toute confiance</h1>
                <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-2">Une communauté de confiance</h3>
            </div>
        </div>
    </div>
</section>
<section class="mbr-section article content9 cid-qP862UOd24">
    <div class="container">
        <div class="inner-container" style="width: 100%;">
            <hr class="line" style="width: 25%;">
            <div class="section-text align-center mbr-fonts-style display-5">
                {{ config('name') }} compte des milliers de membres. Nous avons vérifié leurs profils, un par un.
            </div>
            <hr class="line" style="width: 25%;">
        </div>
    </div>
</section>
<section class="mbr-section content6 cid-qP85WIp79T">
    <div class="container">
        <div class="media-container-row">
            <div class="col-12 col-md-8">
                <div class="media-container-row">
                    <div class="mbr-figure" style="width: 60%;">
                        <img src="{{ asset('resources/images/trust/authenticity.png') }}">
                    </div>
                    <div class="media-content">
                        <div class="mbr-section-text">
                            <p class="mbr-text mb-0 mbr-fonts-style display-7"><br><strong>Voyagez avec qui vous voudrezs</strong><br><strong><br></strong>Sur le profil de nos membres, découvrez combien d'amis ils ont sur Facebook et combien de relations ils ont sur LinkedIn. Choisissez des membres chevronnés grâce aux niveaux d'expérience.<br></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mbr-section content6 cid-qP85WIp79T">
    <div class="container">
        <div class="media-container-row">
            <div class="col-12 col-md-8">
                <div class="media-container-row">
                    <div class="media-content">
                        <div class="mbr-section-text">
                            <p class="mbr-text align-right mb-0 mbr-fonts-style display-7"><strong>Consultez les avis des autres membres</strong><br><strong><br></strong>Les autres membres vous conseillent avec qui voyager à travers les avis. Choisissez les covoitureurs qui vous conviennent.<br></p>
                        </div>
                    </div>
                    <div class="mbr-figure" style="width: 70%;">
                        <img style="padding-left: 30px;" src="{{ asset('resources/images/trust/eval.png') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mbr-section content6 cid-qP85WIp79T">
    <div class="container">
        <div class="media-container-row">
            <div class="col-12 col-md-8">
                <div class="media-container-row">
                    <div class="mbr-figure" style="width: 60%;">
                        <img src="{{ asset('resources/images/trust/freedom.png') }}">
                    </div>
                    <div class="media-content">
                        <div class="mbr-section-text">
                            <p class="mbr-text mb-0 mbr-fonts-style display-7"><strong>Découvrez vos covoitureurs</strong><br><strong><br></strong>Faites vous une idée sur les personnes avec qui vous allez voyager grâce à leurs préférences et minibio.<br></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mbr-section content6 cid-qP85WIp79T">
    <div class="container">
        <div class="media-container-row">
            <div class="col-12 col-md-8">
                <div class="media-container-row">
                    <div class="media-content">
                        <div class="mbr-section-text">
                            <p class="mbr-text align-right mb-0 mbr-fonts-style display-7"><strong>Nous modérons les profils</strong><br><strong><br></strong>Les profils, photos, avis et annonces font l'objet d'une modération pour garantir confiance et respect.<br></p>
                        </div>
                    </div>
                    <div class="mbr-figure" style="width: 70%;">
                        <img style="padding-left: 30px;" src="{{ asset('resources/images/trust/moderation.png') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mbr-section content6 cid-qP85WIp79T">
    <div class="container">
        <div class="media-container-row">
            <div class="col-12 col-md-8">
                <div class="media-container-row">
                    <div class="mbr-figure" style="width: 60%;">
                        <img src="{{ asset('resources/images/trust/contact.png') }}">
                    </div>
                    <div class="media-content">
                        <div class="mbr-section-text">
                            <p class="mbr-text mb-0 mbr-fonts-style display-7"><strong>Prenez contact avant le voyage</strong><br><br>Utilisez notre messagerie sécurisée avant le trajet pour vous mettre d'accord sur le lieu de rendez-vous ou régler d'autres détails.<br></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mbr-section content6 cid-qP85WIp79T">
    <div class="container">
        <div class="media-container-row">
            <div class="col-12 col-md-8">
                <div class="media-container-row">
                    <div class="media-content">
                        <div class="mbr-section-text">
                            <p class="mbr-text align-right mb-0 mbr-fonts-style display-7"><strong>Vous pouvez compter sur nous</strong><br><strong><br></strong>Notre équipe Community Relations est disponible tous les jours pour vous aider à utiliser au mieux BlaBlaCar ! Même les samedis, dimanches et jours fériés.<br></p>
                        </div>
                    </div>
                    <div class="mbr-figure" style="width: 70%;">
                        <img style="padding-left: 30px;" src="{{ asset('resources/images/trust/team.jpg') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection