@extends('layouts.app2') @section('content')

<section class="container small-container">
    <h4><strong>Proposez votre trajet</strong></h4>
    <form method="POST" action="{{ url('proposer_un_trajet') }}" accept-charset="UTF-8">
        {!! csrf_field() !!}
        <div class="form-horizontal form-proposer">
            <div class="row">
                <div class="col-sm-6">
                    <div class="col-sm-4 margin">
                        <label for="dateL">Date</label>
                    </div>
                    <div class="col-sm-7 margin">
                        <input type="text" class="form-control input-sm" id="date" name="date" placeholder="jj/mm/aaaa" required>
                    </div>
                    <div class="col-sm-4">
                        <label for="departL">Votre départ</label>
                    </div>
                    <div class="col-sm-7">
                        <input type="text" class="form-control input-sm" id="depart" name="depart" placeholder="exemple: Bordeaux" required>
                    </div>
                    <div class="col-sm-4">
                        <label for="heureDepartL">Heure prévue</label>
                    </div>
                    <div class="col-sm-7">
                        <input type="time" class="form-control input-sm" name="heureDepart" placeholder="exemple: 12:00" required>
                    </div>
                    <div class="col-sm-4">
                        <div class="glyphicon glyphicon-arrow-down fleche-proposer"></div>
                    </div>
                    <div class="col-sm-7">
                        <br>
                    </div>
                    <div class="col-sm-4">
                        <label for="etapesL">Vos étapes</label>
                    </div>
                    <div class="col-sm-7">
                        <input type="text" class="form-control input-sm" id="etape1" name="etape1" placeholder="exemple : Agen">
                    </div>
                    <div class="col-sm-7 col-sm-offset-4">
                        <input type="text" class="form-control input-sm" id="etape2" name="etape2" placeholder="">
                    </div>
                    <div class="col-sm-4">
                        <div class="glyphicon glyphicon-arrow-down fleche-proposer"></div>
                    </div>
                    <div class="col-sm-7">
                        <br>
                    </div>
                    <div class="col-sm-4">
                        <label for="arriveeL">Votre arrivée</label>
                    </div>
                    <div class="col-sm-7">
                        <input type="text" class="form-control input-sm" id="destination" name="destination" placeholder="exemple : Balma" required>
                    </div>
                    <div class="col-sm-4">
                        <label for="heureArriveeL">Heure prévue</label>
                    </div>
                    <div class="col-sm-7">
                        <input type="time" class="form-control input-sm" name="heureDestination" placeholder="exemple : 12:00" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="col-sm-5">
                        <label for="tempsTrajetL">Flexibilité (en min)</label>
                    </div>
                    <div class="col-sm-7">
                        <input type="number" class="form-control input-sm margin" name="flexible" placeholder="exemple: 15" min="0" max="120" required>
                    </div>
                    <div class="col-sm-5 margin">
                        <label for="placesL">Places disponibles</label>
                    </div>
                    <div class="col-sm-7 margin">
                        <select class="form-control input-sm listeD" name="places">
                            <option selected>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="col-sm-5 margin">
                        <label for="prixDemandeL">Prix demandé</label>
                    </div>
                    <div class="col-sm-7 margin">
                        <input type="number" class="form-control input-sm" name="prix" placeholder="exemple : 10" min="0" max="500" required>
                    </div>
                    <div class="col-sm-5 margin">
                        <label for="tailleBagagesL">Taille des bagages</label>
                    </div>
                    <div class="col-sm-7 margin">
                        <select class="form-control input-sm listeD" name="bagage">
                           
                            <option selected>Moyen</option>
                            <option>Grand</option>
                        </select>
                    </div>
                    <div class="col-sm-12">
                        <hr class="barre-infos">
                    </div>
                    <div class="col-sm-12">
                        <fieldset>Informations complémentaires :</fieldset>
                        <textarea class="form-control" name="informations" rows="3" placeholder="Exemple : Je pars de la place de la victoire à bordeaux, je fais une étape à 10h30 au péage d'Agen et je termine le trajet au lycée Saliège à Balma" required></textarea>
                    </div>
                </div>
            </div>

        </div>
        
      
			<div class="col-sm-6">
				
			</div>
       		<div class="col-sm-6">
				<input type="submit" class="btn proposer" value="Proposer un trajet" name="proposerTrajet">
			</div>
            <input type="text" id="localityDepart" name="localityDepart" class="invisible" />
            <input type="text" id="localityDestination" name="localityDestination" class="invisible" />
            <input type="text" id="localityEtape1" name="localityEtape1" class="invisible" />
            <input type="text" id="localityEtape2" name="localityEtape2" class="invisible" />
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
            center: {
                lat: 43.616669,
                lng: 1.5
            },
            zoom: 13
        });
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        directionsDisplay.setMap(map);

        var origin_input = document.getElementById('depart');
        var destination_input = document.getElementById('destination');
        var etape1_input = document.getElementById('etape1');
        var etape2_input = document.getElementById('etape2');
        //var modes = document.getElementById('mode-selector');

        var options = {
            types: ['(cities)'],
            componentRestrictions: {country: 'fr'}
        };
        var origin_autocomplete = new google.maps.places.Autocomplete(origin_input, options);
        origin_autocomplete.bindTo('bounds', map);
        var destination_autocomplete =
            new google.maps.places.Autocomplete(destination_input, options);
        destination_autocomplete.bindTo('bounds', map);

        var etape1_autocomplete = new google.maps.places.Autocomplete(etape1_input, options);
        var etape2_autocomplete = new google.maps.places.Autocomplete(etape2_input, options);


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
                origin: {
                    'placeId': origin_place_id
                },
                destination: {
                    'placeId': destination_place_id
                },
                travelMode: travel_mode
            }, function(response, status) {
                if (status === google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(response);
                } else {
                    window.alert('Directions request failed due to ' + status);
                }
            });
        }

        function fillInAddressDepart() {
            // Get the place details from the autocomplete object.
            var place = origin_autocomplete.getPlace();
            //init input Form
            document.getElementById('localityDepart').value = '';
            document.getElementById('localityDepart').disabled = false;
            //val=locality -> input locality Depart
            var val = place.address_components[0]['long_name'];
            document.getElementById('localityDepart').value = val;
        }

        function fillInAddressDestination() {
            // Get the place details from the autocomplete object.
            var place = destination_autocomplete.getPlace();
            //init input Form
            document.getElementById('localityDestination').value = '';
            document.getElementById('localityDestination').disabled = false;
            //val=locality -> input locality Depart
            var val = place.address_components[0]['long_name'];
            document.getElementById('localityDestination').value = val;
        }

        function fillInAddressEtape1() {
            // Get the place details from the autocomplete object.
            var place = etape1_autocomplete.getPlace();
            //init input Form
            document.getElementById('localityEtape1').value = '';
            document.getElementById('localityEtape1').disabled = false;
            //val=locality -> input locality Depart
            var val = place.address_components[0]['long_name'];
            document.getElementById('localityEtape1').value = val;
        }

        function fillInAddressEtape2() {
            // Get the place details from the autocomplete object.
            var place = etape2_autocomplete.getPlace();
            //init input Form
            document.getElementById('localityEtape2').value = '';
            document.getElementById('localityEtape2').disabled = false;
            //val=locality -> input locality Depart
            var val = place.address_components[0]['long_name'];
            document.getElementById('localityEtape2').value = val;
        }
        origin_autocomplete.addListener('place_changed', fillInAddressDepart);
        destination_autocomplete.addListener('place_changed', fillInAddressDestination);
        etape1_autocomplete.addListener('place_changed', fillInAddressEtape1);
        etape2_autocomplete.addListener('place_changed', fillInAddressEtape2);
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8zSQHYetf1-fRjNQCy7aYDwT4SCR2Xo0&signed_in=true&libraries=places&callback=initMap" async defer></script>

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="{{ asset('/css/jquery-ui.min.css') }}">

<script>
 $(function() {$( "#date" ).datepicker({
  firstDay: 1,
  altField: "#date",
  closeText: 'Fermer',
  prevText: 'Précédent',
  nextText: 'Suivant',
  currentText: 'Aujourd\'hui',
  monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
  monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
  dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
  dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
  dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
  weekHeader: 'Sem.',
  dateFormat: 'dd/mm/yy'});}); 
 </script>

@endsection