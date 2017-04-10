@extends('layouts.app2') @section('content')


<div class="container small-container">
    <div class="menu-resp">
        <div class="row">
            <a href="{!! url( 'rechercher_un_trajet') !!}">
                <div class="button-resp button-resp-01 text-center">
                    <p>Rechercher un trajet</p>
                </div>
            </a>
            <a href="{!! url( 'mes_reservations') !!}">
                <div class="button-resp button-resp-02 text-center">
                    <p>Mes réservations</p>
                </div>
            </a>
        </div>
        <div class="row">
            <a href="{!! url( 'proposer_un_trajet') !!}">
                <div class="button-resp button2-resp button-resp-03 text-center">
                    <p>Proposer un trajet</p>
                </div>
            </a>
            <a href="{!! url( 'mes_trajets') !!}">
                <div class="button-resp button2-resp button-resp-04 text-center">
                    <p>Mes trajets</p>
                </div>
            </a>
        </div>
        <div class="row">
            <a href="{!! url( 'contact') !!}">
                <div class="button-resp button3-resp text-center">
                    <p>Contact</p>
                </div>
            </a>
        </div>
    </div>
</div>

@endsection