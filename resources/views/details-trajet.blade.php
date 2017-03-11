@extends('layouts.app2') @section('content')

<section class="container small-container">

    <h4><strong>Details du trajet</strong></h4>



    <div class="form-horizontal form-details">
        <div class="details-user">
            <div class="inner">
                <img src="{{ asset('/images/Utilisateur2.gif') }}" style="margin-left:-11px; margin-top:-8px;">
            </div>
            <p class="details-prenom"><strong>{{ $user->surname }}</strong></p>
            <p class="details-nom"><strong>{{ $user->name }}</strong></p>
            <hr class="details-hr">
            <p class="voiture">Marque : <strong>{{ $voiture->MRQ_NOM}}</strong></p>
            <p class="couleur">Couleur : <strong>{{ $voiture->CLR_NOM}}</strong></p>
            <hr class="details-hr">
            <p class="voiture">Fumeur : <strong>@if ($voiture->VTR_FURMEUR == 0) non @else oui @endif</strong></p>
            <p class="couleur">Animaux : <strong>@if ($voiture->VTR_ANIMAUX == 0) non @else oui @endif</strong></strong></p>
        </div>
        <form class=m ethod="POST" action="" accept-charset="UTF-8">

            <div class="row">
                <div class="col-sm-6" style="text-align:center;">
                    <div class="col-sm-12">
                        <p>{{ Carbon\Carbon::parse($trajet->TRJ_DATE_DEPART)->format('d-m-Y')  }}</p>
                    </div>
                    <div class="col-sm-12">
                        <p>1 • <span class="rouge"><strong>Départ</strong></span> : <strong>{{ $trajet->TRJ_DEPART }}</strong></p>
                    </div>
                    <div class="col-sm-12">
                        <p>{{ Carbon\Carbon::parse($trajet->TRJ_HEURE_DEPART)->format('H:i') }}</p>
                    </div>
                    <div class="col-sm-12">
                        <div class="glyphicon glyphicon-arrow-down"></div>
                    </div>
                    <div class="col-sm-12">
                        <p>2 • <span class="rouge"><strong>Étape(s)</strong></span> :
                    </div>
                    @if(!empty($trajet->TRJ_ETAPE1))
                        <div class="col-sm-12">
                            <strong>{{ $trajet->TRJ_ETAPE1}} </strong></p>
                        </div>
                    @elseif (!empty($trajet->TRJ_ETAPE2))
                        <div class="col-sm-12">
                            <strong>{{ $trajet->TRJ_ETAPE2}}</strong></p>
                        </div>
                    @else
                        <div class="col-sm-12">
                            <strong>Pas d'étapes</strong></p>
                        </div>
                    @endif
                    <div class="col-sm-12">
                        <div class="glyphicon glyphicon-arrow-down"></div>
                    </div>
                    <div class="col-sm-12">
                        <p>3 • <span class="rouge"><strong>Arrivée</strong></span> : <strong>{{ $trajet->TRJ_DESTINATION}}</strong></p>
                    </div>
                    <div class="col-sm-12">
                        <p>{{ Carbon\Carbon::parse($trajet->TRJ_HEURE_DESTINATION)->format('H:i') }}</p>
                    </div>
                </div>
                <div class="col-sm-6" style="padding-left:20px;">
                    <div class="col-sm-12">
                        <p>Temps total du trajet : <strong>{{ $duree }}</strong></p>
                    </div>
                    <div class="col-sm-12">
                        <p>Places disponibles : <strong>{{ $trajet->TRJ_PLACES }}</strong></p>
                    </div>
                    <div class="col-sm-12">
                        <p>Prix demandé : <strong>{{ $trajet->TRJ_PRIX}}</strong></p>
                    </div>
                    <div class="col-sm-12">
                        <p>Flexibilité : <strong>{{ $trajet->TRJ_FLEXIBLE }}</strong></p>
                    </div>
                    <div class="col-sm-12">
                        <p>Taille des bagages : <strong>{{ $trajet->TRJ_BAGAGE}}</strong></p>
                    </div>
                    <div class="col-sm-12">
                        <hr class="hr-details">
                    </div>
                    <div class="col-sm-12">
                        <textarea class="form-control" name="informations" rows="5">{{ $trajet->TRJ_INFO}}</textarea>
                    </div>
                </div>
            </div>
            <!--<div class="row">
				<div class="col-sm-6">
					<p>26/04/2017</p>
				</div>
				<div class="col-sm-offset-1 col-sm-5">
					<p>Temps total du trajet : <strong>2h30 min</strong></p>
				</div>
			</div><br>
			<div class="row">
				<div class="col-sm-6">
					<p>1 • <span class="rouge"><strong>Départ</strong></span> : <strong>Bordeaux</strong></p>
				</div>
				<div class="col-sm-offset-1 col-sm-5">
					<p>Places disponibles : <strong>3</strong></p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<p>8 : 00</p>
				</div>
				<div class="col-sm-offset-1 col-sm-5">
					<p>Prix demandé : <strong>12€</strong></p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="glyphicon glyphicon-arrow-down"></div>
				</div>
				<div class="col-sm-offset-1 col-sm-5">
					<p>Flexibilité : <strong>15 minutes</strong></p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<p>2 • <span class="rouge"><strong>Étape(s)</strong></span> : <strong>Agen</strong></p>
				</div>
				<div class="col-sm-offset-1 col-sm-5">
					<p>Taille des bagages : <strong>petit</strong></p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="glyphicon glyphicon-arrow-down"></div>
				</div>
				<div class="col-sm-offset-1 col-sm-5">
					<hr class="hr-details">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<p>3 • <span class="rouge"><strong>Arrivée</strong></span> : <strong>Balma</strong></p>
					<div class="col-sm-6">
						<p>10 : 30</p>
					</div>
				</div>
				<div class="col-sm-offset-1 col-sm-5">
					<textarea class="form-control" name="informations" rows="5"></textarea>
				</div>
			</div>-->
    </div>
    <div class="col-sm-6 col-sm-push-2">
    	<!--<a href="#">
		<input type="button" class="btn" value="Retour à la recherche" name="retourTrajet">
   		</a>-->
    </div>
    <div class="col-sm-6">
       <a href="{{ route('details_trajet',['id' => $trajet->ID]) }}"> <input type="submit" class="btn proposer" value="Réserver ce trajet" name="proposerTrajet">
    </div>
    </form>
</section>


@endsection