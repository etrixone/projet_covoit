@extends('layouts.app2')

@section('content')   


<div class="container">
    <h4><strong>Voici les Trajets</strong></h4>

    
    <div class="row cadre">
        <div class="col-sm-4 center">
            06/03/2017<br>
            <label class="rouge">1.Départ : </label> <span class="arial" >Béziers</span>
            <div class="glyphicon glyphicon-arrow-right"></div><br>
            8:00
        </div>



        <div class="col-sm-4 center">
            
                <br>
                <label class="rouge">2.Etape : </label>
                <br>
                <span class="arial" >Carcassone<br>perpignan<br>poilhes-montady<br></span>

        </div>

        <div class="col-sm-4 center">
            <br>
            <div class="glyphicon glyphicon-arrow-right"></div>
            <label class="rouge">3.Destination :</label> <span class="arial" > Toulouse</span><br>
            10:30

        </div>
    </div>

    
</div>

    



@endsection


