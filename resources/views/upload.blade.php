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
            country: '#country',
            administrative_area_level_2: '#administrative_area_level_2',
            postal_code: '#postal_code'
            
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
            administrative_area_level_2: '#administrative_area_level_2',
            postal_code: '#postal_code'
        }
    });
    var gmarker = addresspickerMap2.addresspicker( "marker");
    gmarker.setVisible(true);
    addresspickerMap2.addresspicker( "updatePosition");
 
});
  
  </script>
  
<html>
    <body>
        <form action="{{url('/csv_upload')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
            <input type="hidden" name="MAX_FILE_SIZE" value="100000"/>
            <label>Importez un fichier csv</label>
            <input type="file" name="upload_file"/>
            <input class="btn_submit" type="submit" value="Valider" name="submit"/>
        </form>


    </body>
</html>

@endsection
