@extends('layouts.app2') @section('content')

<section class="container small-container container-profil">

    <h4><strong>Votre profil</strong></h4>

    <div class="form-profil">
        <img src="{{ asset('/images/Utilisateur2.gif') }}" class="img-profil" width="130px">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="text-center">Stacy Boulanger</h2>
            </div>
        </div>
        <br>
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
                <p><strong>Marque & modèle :</strong></p>
            </div>
            <div class="col-sm-6">
                <p>Clio - Renault</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-sm-push-2">
                <p><strong>Couleur de la voiture :</strong></p>
            </div>
            <div class="col-sm-6">
                <p>Couleur blanche</p>
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
                <p><strong>Fumeur</strong> : non</p>
            </div>
            <div class="col-sm-6">
                <p><strong>Animaux</strong> : non</p>
            </div>
        </div>

    </div>
    <div class="col-sm-6">
        <input type="button" class="btn modifier" value="Modifier mon profil" name="modifierProfil">
    </div>

</section>
@endsection