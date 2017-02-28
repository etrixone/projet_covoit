@extends('layouts.layout')

@section('content')    
 
    <center>
        <h1>Bienvenue sur saliege covoit</h1> 
                <br/><br/>
                

    	<form method="POST" action="{!! url('home') !!}" accept-charset="UTF-8">
		{!! csrf_field() !!}   
	
           <label>Départ : </label> <input id="addresspicker_map" />  
           <label>Destination : </label> <input id="addresspicker_map2" /><br/> 
           
            <input id="locality"  name="depart" readonly="true" type="hidden"> <br/>

            <input id="locality2" name="destination" readonly="true" type="hidden"> <br/>

            <button type="submit" value="Rechercher">Valider</button>

        </form>
                
                <form class="form-inline">
                    <div class="form-group">
                        <label class="sr-only" for="email">Email address:</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd">
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox"> Remember me</label>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
                
                
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                 <button>Logout</button>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                

              
                
             <div id="map"></div>
             <div id="map2"></div>
    </center>
@endsection
