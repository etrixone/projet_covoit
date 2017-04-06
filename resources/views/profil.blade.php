@extends('layouts.app2') @section('content')

<section class="container small-container container-profil">

    <h4><strong>Votre profil</strong></h4>

    <div class="form-profil">
        <img src="{{ asset(Auth::user()->logo) }}" class="img-profil" width="130px">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="text-center">{{ Auth::user()->surname }} {{ Auth::user()->name }}</h2>
            </div>
        </div>
        <br>
        @if ($voiture == null)
              <div class="row">
                  <p>Vous ne possédez pas de voiture, vous pouvez en ajouter une en cliquant sur "modifier mon profil".<p>
              </div>
        @else
            <div class="row">
                <hr class="details-hr" style="width:390px;">
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-push-2">
                    <p class="small-text-profil">Véhicule</p>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-push-2">
                    <p><strong>Marque de la voiture:</strong></p>
                </div>
                <div class="col-sm-6">
                    <p>{{ $voiture->MRQ_NOM }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-push-2">
                    <p><strong>Couleur de la voiture:</strong></p>
                </div>
                <div class="col-sm-6">
                    <p>{{ $voiture->CLR_NOM }}</p>
                </div>
            </div>
            <div class="row">
                <hr class="details-hr" style="width:390px; margin-top:30px;">
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-push-2">
                    <p class="small-text-profil">Autres caractéristiques</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-push-2">
                    <p><strong>Fumeur</strong> : 
                        @if ($voiture->VTR_FUMEUR == 0) 
                        Non 
                        @else 
                        Oui 
                        @endif
                    </p>
                </div>
                <div class="col-sm-6">
                    <p><strong>Animaux</strong> : 
                        @if ($voiture->VTR_ANIMAUX == 0)
                        Non
                        @else
                        Oui
                        @endif
                    </p>
                </div>
            </div>
        @endif

    </div>
    <div class="col-sm-6">
        <a href="{!! url('modifier_profil') !!}"><button class="btn modifier" form="profil"> Modifier mon profil </button></a>
    </div>

</section>
@endsection