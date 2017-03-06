@extends('layouts.app2')

@section('content')    
 
<section class="container small-container">
   <h4><strong>Proposez votre trajet</strong></h4>
    <form class="form-horizontal" method="POST" action="{!! url('home') !!}" accept-charset="UTF-8">
    	<div class="col-sm-6">
    		<div class="col-sm-4">
    			<label for="date">Date</label>
    		</div>
    		<div class="col-sm-8">
    			<input type="date" class="form-control input-sm" id="exampleInputName2" placeholder="jj/mm/aaaa">	
    		</div>
  		</div>
  		<div class="col-sm-6">
   		<div class="col-sm-4">
    		<label for="exampleInputEmail2">Temps total du trajet</label>
    		</div>
    		<div class="col-sm-8">
    		<input type="text" class="form-control input-sm" id="exampleInputEmail2" placeholder="exemple : 2h30">
    		</div>
  		</div>
  		<div class="col-sm-6">
   			<br><div class="col-sm-4">
    		<label for="exampleInputEmail2">Votre départ</label>
    		</div>
    		<div class="col-sm-8">
    		<input type="text" class="form-control" id="exampleInputEmail2" placeholder="exemple : Bordeaux">
    		</div>
  		</div>
  		<div class="col-sm-6">
   			<br><div class="col-sm-4">
    		<label for="exampleInputEmail2">Places disponibles</label>
    		</div>
    		<div class="col-sm-8">
    		<input type="text" class="form-control" id="exampleInputEmail2" placeholder="exemple : 3">
    		</div>
  		</div>
  		<div class="col-sm-6">
   			<br><div class="col-sm-4">
    		<label for="exampleInputEmail2">Heure prévue</label>
    		</div>
    		<div class="col-sm-8">
    		<input type="text" class="form-control" id="exampleInputEmail2" placeholder="exemple : 12h00">
    		</div>
  		</div>
   </form> 
</section>
@endsection
