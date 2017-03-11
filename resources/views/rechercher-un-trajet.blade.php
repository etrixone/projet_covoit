@extends('layouts.app2') @section('content')

<center>
    <h1>Bienvenue sur saliege covoit</h1>
    <br/>
    <br/>
    <form method="POST" action="{!! url('rechercher_un_trajet') !!}" accept-charset="UTF-8">
        {!! csrf_field() !!}

        <div class="flex">
            <label>Départ </label>
            <hr class="flex-barre flex-barre1">
            <input id="depart" type="text" class="form-control input-sm">
            <input id="localityDepart" name="depart" type="hidden">
            <br/>
        </div>

        <div class="flex">
            <label>Destination </label>
            <hr class="flex-barre flex-barre2">
            <input id="destination" type="text" class="form-control input-sm">
            <input id="localityDestination" name="destination" type="hidden">
            <br/>
        </div>

        <div class="flex">
            <label>Date </label>
            <hr class="flex-barre flex-barre3">
            <input type="date" id="date" class="form-control input-sm">
        </div>
        <br>
        <input type="submit" value="Rechercher" class="rechercher"> @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif @if(!empty($resultat))
        <h2>IL Y A DES TRAJETS</h2> @foreach ($resultat as $trajet)
        <p>Depart: {{ $trajet->TRJ_DEPART }} </p>
        <br>
        <p>Destination: {{ $trajet->TRJ_DESTINATION }} </p>
        <br>
        <p>Info: {{ $trajet->TRJ_INFO }} </p>
        <br> @endforeach @endif

    </form>

</center>

<script>
    function initMap() {
        var origin_input = document.getElementById('depart');
        var destination_input = document.getElementById('destination');

        var origin_autocomplete = new google.maps.places.Autocomplete(origin_input);
        var destination_autocomplete =
            new google.maps.places.Autocomplete(destination_input);

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

        origin_autocomplete.addListener('place_changed', fillInAddressDepart);
        destination_autocomplete.addListener('place_changed', fillInAddressDestination);

    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8zSQHYetf1-fRjNQCy7aYDwT4SCR2Xo0&signed_in=true&libraries=places&callback=initMap" async defer></script>


@endsection