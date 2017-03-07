@extends('layouts.app2')

@section('content')    

<section class="container small-container">
    <h4><strong>Proposez votre trajet</strong></h4>
    <form class="form-horizontal" method="POST" action="{!! url('trajet') !!}" accept-charset="UTF-8">
    {!! csrf_field() !!}    
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
                <label for="tempsTrajetL">Flexibilité (en minute)</label>
            </div>
            <div class="col-sm-7">
                <input type="number" class="form-control input-sm" name="flexible" placeholder="exemple : 2h30">
            </div>
        </div>
        <div class="col-sm-6">
            <br><div class="col-sm-4">
                <label for="departL">Votre départ</label>
            </div>
            <div class="col-sm-7">
                <input type="text" class="form-control input-sm" id="depart" name="depart" placeholder="exemple : Bordeaux">
            </div>
        </div>
        <div class="col-sm-6">
            <br><div class="col-sm-4">
                <label for="placesL">Places disponibles</label>
            </div>
            <div class="col-sm-7">
                <input type="number" class="form-control input-sm" name="places" placeholder="exemple : 3">
            </div>
        </div>
        <div class="col-sm-6">
            <br><div class="col-sm-4">
                <label for="heureDepartL">Heure prévue</label>
            </div>
            <div class="col-sm-4">
                <input type="time" class="form-control input-sm" name="heureDepart" placeholder="exemple : 12h00">
            </div>
        </div>
        <div class="col-sm-6">
            <br><div class="col-sm-4">
                <label for="prixDemandeL">Prix demandé</label>
            </div>
            <div class="col-sm-7">
                <input type="number" class="form-control input-sm" name="prix" placeholder="exemple : 10€">
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
                <label for="etapesL">Vos étapes</label>
            </div>
            <div class="col-sm-7">
                <input type="text" class="form-control input-sm" id="etape1" name="etape1" placeholder="exemple : Agen">
            </div>
        </div>
        <div class="col-sm-6">
            <br>
            <hr class="barre-infos">
        </div>
        <div class="col-sm-6">
            <div class="col-sm-7 col-sm-offset-4">
                <input type="text" class="form-control input-sm" id="etape2" name="etape2" placeholder="">
            </div>
            <div class="col-sm-7 col-sm-offset-4"><br>
                <input type="text" class="form-control input-sm" id="etape3" name="etape3" placeholder="">
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
                <input type="text" class="form-control input-sm" id="destination" name="destination" placeholder="exemple : Balma">
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
                <input type="text" class="form-control input-sm" name="heureDestination" placeholder="exemple : 12h00">
            </div>
        </div>   

 
        <div class="col-sm-offset-8">
          <input type="submit" class="btn proposer" value="Proposer un trajet" name="proposerTrajet">  
          
        </div>
    </form>
    <div id="map"></div>
    </section>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

       <script>
function initMap() {
  var origin_place_id = null;
  var destination_place_id = null;
  var travel_mode = google.maps.TravelMode.WALKING;
  var map = new google.maps.Map(document.getElementById('map'), {
    mapTypeControl: false,
    center: {lat: 43.616669, lng: 1.5},
    zoom: 13
  });
  var directionsService = new google.maps.DirectionsService;
  var directionsDisplay = new google.maps.DirectionsRenderer;
  directionsDisplay.setMap(map);

  var origin_input = document.getElementById('depart');
  var destination_input = document.getElementById('destination');
  var modes = document.getElementById('mode-selector');

  var origin_autocomplete = new google.maps.places.Autocomplete(origin_input);
  origin_autocomplete.bindTo('bounds', map);
  var destination_autocomplete =
      new google.maps.places.Autocomplete(destination_input);
  destination_autocomplete.bindTo('bounds', map);
  google.maps.TravelMode.Driving;


  function expandViewportToFitPlace(map, place) {
    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17);
    }
  }

  origin_autocomplete.addListener('place_changed', function() {
    var place = origin_autocomplete.getPlace();
    if (!place.geometry) {
      window.alert("Veuillez selectionner une ville proposée");
      return;
    }
    expandViewportToFitPlace(map, place);

    // If the place has a geometry, store its place ID and route if we have
    // the other place ID
    origin_place_id = place.place_id;
    route(origin_place_id, destination_place_id, travel_mode,
          directionsService, directionsDisplay);
  });

  destination_autocomplete.addListener('place_changed', function() {
    var place = destination_autocomplete.getPlace();
    if (!place.geometry) {
      window.alert("Veuillez selectionner une ville proposée");
      return;
    }
    expandViewportToFitPlace(map, place);

    // If the place has a geometry, store its place ID and route if we have
    // the other place ID
    destination_place_id = place.place_id;
    route(origin_place_id, destination_place_id, travel_mode,
          directionsService, directionsDisplay);
  });

  function route(origin_place_id, destination_place_id, travel_mode,
                 directionsService, directionsDisplay) {
    if (!origin_place_id || !destination_place_id) {
      return;
    }
    directionsService.route({
      origin: {'placeId': origin_place_id},
      destination: {'placeId': destination_place_id},
      travelMode: travel_mode
    }, function(response, status) {
      if (status === google.maps.DirectionsStatus.OK) {
        directionsDisplay.setDirections(response);
      } else {
        window.alert('Directions request failed due to ' + status);
      }
    });
  }
}

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8zSQHYetf1-fRjNQCy7aYDwT4SCR2Xo0&signed_in=true&libraries=places&callback=initMap"
        async defer></script>


@endsection
