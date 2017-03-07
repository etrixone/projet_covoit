@extends('layouts.app2')

@section('content')    

<section class="container small-container">
    <h4><strong>Proposez votre trajet</strong></h4>
    <form class="form-horizontal" method="POST" action="{!! url('home') !!}" accept-charset="UTF-8">
        <div class="col-sm-6">
            <div class="col-sm-4">
                <label for="dateL">Date</label>
            </div>
            <div class="col-sm-7">
                <input type="text" class="form-control input-sm" name="date" placeholder="jj/mm/aaaa">	
            </div>
        </div>
        <div class="col-sm-6">
            <div class="col-sm-4">
                <label for="tempsTrajetL">Temps total du trajet</label>
            </div>
            <div class="col-sm-7">
                <input type="text" class="form-control input-sm" name="tempsTrajet" placeholder="exemple : 2h30">
            </div>
        </div>
        <div class="col-sm-6">
            <br><div class="col-sm-4">
                <label for="departL">Votre départ</label>
            </div>
            <div class="col-sm-7">
                <input type="text" class="form-control input-sm" id="depart" name="departN" placeholder="exemple : Bordeaux">
            </div>
        </div>
        <div class="col-sm-6">
            <br><div class="col-sm-4">
                <label for="placesL">Places disponibles</label>
            </div>
            <div class="col-sm-7">
                <input type="text" class="form-control input-sm" name="places" placeholder="exemple : 3">
            </div>
        </div>
        <div class="col-sm-6">
            <br><div class="col-sm-4">
                <label for="heureDepartL">Heure prévue</label>
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control input-sm" name="heurePrevue" placeholder="exemple : 12h00">
            </div>
        </div>
        <div class="col-sm-6">
            <br><div class="col-sm-4">
                <label for="prixDemandeL">Prix demandé</label>
            </div>
            <div class="col-sm-7">
                <input type="text" class="form-control input-sm" name="prix" placeholder="exemple : 10€">
            </div>
        </div>
        <div class="col-sm-6">
            <br>
            <div class="glyphicon glyphicon-arrow-down"></div>
        </div>
        <div class="col-sm-6">
            <br><div class="col-sm-4">
                <label for="tailleBagagesL">Taille des bagages</label>
            </div>
            <div class="col-sm-7">
                <input type="text" class="form-control input-sm" name="tailleBagages" placeholder="exemple : 3 valises">
            </div>
        </div>
        <div class="col-sm-6">
            <br><div class="col-sm-4">
                <label for="etapesL">Votre étape</label>
            </div>
            <div class="col-sm-7">
                <input type="text" class="form-control input-sm" id="etape1" name="etape1N" placeholder="exemple : Agen">
            </div>
        </div>
        <div class="col-sm-6">
            <br>
            <hr class="barre-infos">
        </div>
        <div class="col-sm-6">
            <div class="col-sm-7 col-sm-offset-4">
                <input type="text" class="form-control input-sm" id="etape2" name="etape2N" placeholder="">
            </div>
            <div class="col-sm-7 col-sm-offset-4"><br>
                <input type="text" class="form-control input-sm" id="etape3" name="etape3N" placeholder="">
            </div>
        </div>
        <div class="col-sm-6">
            <fieldset>Informations complémentaires :</fieldset>
            <textarea class="form-control" name="informations" rows="3" placeholder="Exemple : Je pars de la place de la victoire à bordeaux, je fais une étape à 10h30 au péage d'Agen et je termine le trajet au lycée Saliège à Balma"></textarea>
        </div>
        <div class="col-sm-6">
            <div class="glyphicon glyphicon-arrow-down"></div>
        </div>
        <div class="col-sm-6">
            <br><br>
        </div>
        <div class="col-sm-6">
            <div class="col-sm-4">
                <label for="arriveeL">Votre arrivée</label>
            </div>
            <div class="col-sm-7">
                <input type="text" class="form-control input-sm" id="arrivee" name="arriveeN" placeholder="exemple : Balma">
            </div>
        </div>
        <div class="col-sm-6">
            <br><br>
        </div>
        <div class="col-sm-6">
            <br><div class="col-sm-4">
                <label for="heureArriveeL">Heure prévue</label>
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control input-sm" name="heureArrivee" placeholder="exemple : 12h00">
            </div>
        </div>   
    </form> 
    <div class="col-sm-offset-8">
        <input type="submit" class="btn proposer" value="Proposer un trajet" name="proposerTrajet">
    </div>
</section>
@endsection
