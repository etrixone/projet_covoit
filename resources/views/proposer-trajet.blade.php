@extends('layouts.app2')

@section('content')

    
  <script>   
      $(function() {
          
     //addresspicker depart     
    var addresspickerMap = $( "#addresspicker_map" ).addresspicker({
        elements: {
                    map: "#map",
                    lat: "#lat",
                    lng: "#lng",
                    locality: '#locality',
                    country: '#country',
                    postal_code: '#postal_code',
                    administrative_area_level_2: "#administrative_area_level_2"

                }
            });
    var gmarker = addresspickerMap.addresspicker( "marker");
    gmarker.setVisible(true);
    addresspickerMap.addresspicker( "updatePosition");
    
    //addresspicker destination
    var addresspickerMap2 = $( "#addresspicker_map2" ).addresspicker({
        elements: {
                    map: "#destination_map",
                    lat: "#destination_lat",
                    lng: "#destination_lng",
                    administrative_area_level_2: "#destination_administrative_area_level_2",
                    locality: '#destination_locality',
                    postal_code: '#destination_postal_code',
                    country: '#destination_country'
                }
            });
    var gmarker = addresspickerMap2.addresspicker("marker");
    gmarker.setVisible(true);
    addresspickerMap2.addresspicker("updatePosition");
    
   
 
});
  </script>
  
<div class="">
  <h1>Proposer un trajet</h1>

	<form action="{!! url('trajet') !!}" method="post">
            {!! csrf_field() !!}  
      
            <label>Départ :    </label> <input id="addresspicker_map" />  
            <input id="locality" name="depart" readonly="true" type="hidden">
            <input id="postal_code" name="code_postal" > 
            <input id="administrative_area_level_2" name="departement" readonly="true"  > 
            <input id="lat" disabled=disabled type="hidden" name="latitude">
            <input id="lng" disabled=disabled type="hidden" name="longitude"><br/> 
            
            <label>Destination : </label> <input id="addresspicker_map2" />  
            <input id="destination_locality" name="destination" readonly="true"  >
            <input id="destination_code_postal_postal_code" name="destination_code_postal"> 
            <input id="destination_administrative_area_level_2" name="destination_departement" readonly="true" >
            <input id="destination_lat" disabled=disabled type="hidden" name="destination_latitude">
            <input id="destination_lng" disabled=disabled type="hidden" name="destination_longitude"> <br/></br>

            <label>Infos : </label>
            <textarea name="info" rows="4" cols="50"/></textarea>

        <p><button type="submit" value="recuperer infos">Valider !</button> </p>
            
              @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
	  
    </div>

    <div class='map-wrapper'>


      <div id="map"></div>
      
    </div>
  </div>


</div><!-- End demo -->

@endsection
