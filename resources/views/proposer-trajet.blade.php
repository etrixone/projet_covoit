@extends('layouts.app2')

@section('content')
    <script>
      $(function() {
 
    var addresspickerMap = $( "#addresspicker_map" ).addresspicker({
        elements: {
            map: "#map",
            lat: "#lat",
            lng: "#lng",
            locality: '#locality',
            country: '#country'
        }
    });
    var gmarker = addresspickerMap.addresspicker( "marker");
    gmarker.setVisible(true);
    addresspickerMap.addresspicker( "updatePosition");
    
    
        var addresspickerMap2 = $( "#addresspicker_map2" ).addresspicker({
        elements: {
            map: "#map2",
            lat: "#lat2",
            lng: "#lng2",
            locality: '#locality2',
            country: '#country2'
        }
    });
    var gmarker = addresspickerMap2.addresspicker( "marker");
    gmarker.setVisible(true);
    addresspickerMap2.addresspicker( "updatePosition");
 
});
  
  </script>
  
</head>
<body>
  
<div class="demo">
  <h1>Recherche ville</h1>


	
	<form action="verif.php" method="get">
      
            <label>Ville : </label> <input id="addresspicker_map" /><br/>   
            <input id="locality" name="nom" readonly="true" > <br/>

            <label>Code postal: </label> <input id="postal_code" name="code_postal"> <br/>
            <label>Département: </label> <input id="administrative_area_level_2" name="departement" readonly="true"> <br/>
            <label>Pays:  </label> <input id="country" name="pays" readonly="true"> <br/>  
            <input id="lat" disabled=disabled type="hidden" name="latitude"> <br/>
            <input id="lng" disabled=disabled type="hidden" name="longitude"> <br/></br>
            
            <label>Ville : </label> <input id="addresspicker_map2" /><br/>   
            <input id="locality2" name="nom2" readonly="true" type="hidden" > <br/>

            <label>Code postal: </label> <input id="postal_code2" name="code_postal2"> <br/>
            
           
            <input id="lat2" disabled=disabled type="hidden" name="latitude2"> <br/>
            <input id="lng2" disabled=disabled type="hidden" name="longitude2"> <br/>
	  
	  
            
            
            <p><input type="submit" value="recuperer infos"></p>
	  
    </div>

    <div class='map-wrapper'>


      <div id="map"></div>
      
    </div>
  </div>


</div><!-- End demo -->

@endsection
