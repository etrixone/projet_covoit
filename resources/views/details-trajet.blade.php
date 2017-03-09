@extends('layouts.app2')

@section('content')    

<section class="container small-container">

	<h4><strong>Etes-vous sûr de réserver ce trajet ?</strong></h4>
	
	
	<div class="details-user">
		<div class="inner">
		<img src="{{ asset('/images/Utilisateur2.gif') }}" style="margin-left:-11px; margin-top:-8px;">
		</div>
		<p class="details-prenom">Benoit</p>
		<p class="details-nom">Feltro</p>
		<hr class="details-hr">
		<p class="voiture">Clio - Renault</p>
		<p class="couleur">Couleur blanche</p>
		<hr class="details-hr">
		<p class="voiture">Fumeur : non</p>
		<p class="couleur">Animaux : non</p>
	</div>
	<div class="form-horizontal form-details">
		<form class= method="POST" action="" accept-charset="UTF-8">
			<div class="row">
				<div class="col-sm-6">
					<p>26/04/2017</p>
				</div>
				<div class="col-sm-offset-2 col-sm-4">
					<p>Temps total du trajet : 2h30 min</p>
				</div>
			</div><br>
			<div class="row">
				<div class="col-sm-6">
					<p>1 • Départ : Bordeaux</p>
				</div>
				<div class="col-sm-offset-1 col-sm-5">
					<p>Places disponibles : 3</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<p>8 : 00</p>
				</div>
				<div class="col-sm-offset-1 col-sm-5">
					<p>Prix demandé : 12€</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="glyphicon glyphicon-arrow-down"></div>
				</div>
				<div class="col-sm-offset-1 col-sm-5">
					<p>Flexibilité : 15 minutes</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<p>2 • Étape(s) : Agen</p>
				</div>
				<div class="col-sm-offset-1 col-sm-5">
					<p>Taille des bagages : petit</p>
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
					<p>3 • Arrivée : Balma</p>
					<div class="col-sm-6">
						<p>10 : 30</p>
					</div>
				</div>
				<div class="col-sm-offset-1 col-sm-5">
					<textarea class="form-control" name="informations" rows="5"></textarea>
				</div>
			</div>
		</form>
	</div>

</section>


@endsection
