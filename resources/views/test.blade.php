@extends('layouts.layout')

@section('content')    
 
<div class="container small-container">
    <form method="POST" action="{!! url('home') !!}" accept-charset="UTF-8"></form>
    
    <div class="row marge">
        <div class="col-sm-3 col-sm-offset-3"><label>Départ</label></div>  
        <div class="col-sm-3"><input id="addresspicker_map" /></div>   
    </div>
    
    <div class="row marge">
        <div class="col-sm-3 col-sm-offset-3"><label>Destination</label></div>  
        <div class="col-sm-3"><input id="addresspicker_map2" /></div>   
    </div>
    
    <div class="row marge">
        <div class="col-sm-3 col-sm-offset-3"><label>Date</label></div>  
        <div class="col-sm-3"><input type="date" name="date"></div>   
    </div>
    
        <div class="row middle">
            <div class="col-sm-12"><button type="submit" />Rechercher</div>   
    </div>
    
   </form> 
</div>
@endsection
