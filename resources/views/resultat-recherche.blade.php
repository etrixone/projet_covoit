@extends('layouts.app2') @section('content')

@if( count($trajets)==0 && count($trajetsEtapesDestination) == 0 && count($trajetsEtapesDepart) == 0 )
<div class="message">Aucun trajets ne correspond.</div>
@else
    
<section class="container small-container">

   
    @if (count($trajets) > 0)

        <h4>Voici les Trajets correspondants</h4>               

        @foreach ($trajets as $trajet)

            <div class="form-horizontal form-details">

                <form class=m ethod="get" action="{{ route('details_trajet',['id' => $trajet->ID]) }}" accept-charset="UTF-8">

                    <div class="row">
                        <div class="col-sm-6" style="text-align:center;">
                            <div class="col-sm-12">
                                <p>{{ Carbon\Carbon::parse($trajet->TRJ_DATE_DEPART)->format('d-m-Y')  }}</p>
                            </div>
                            <div class="col-sm-12">
                                <p>1 • <span class="rouge"><strong>Départ</strong></span> : <strong>{{ $trajet->TRJ_DEPART }}</strong></p>
                            </div>
                            <div class="col-sm-12">
                                <p>{{ Carbon\Carbon::parse($trajet->TRJ_HEURE_DEPART)->format('H:i') }}</p>
                            </div>
                            <div class="col-sm-12">
                                <div class="glyphicon glyphicon-arrow-down"></div>
                            </div>
                            <div class="col-sm-12">
                                <p>2 • <span class="rouge"><strong>Étape(s)</strong></span> :
                            </div>
                            @if(!empty($trajet->TRJ_ETAPE1))
                                <div class="col-sm-12">
                                    <strong>{{ $trajet->TRJ_ETAPE1}} </strong></p>
                                </div>
                            @endif
                            @if (!empty($trajet->TRJ_ETAPE2))
                                <div class="col-sm-12">
                                    <strong>{{ $trajet->TRJ_ETAPE2}}</strong></p>
                                </div>
                            @endif
                            @if(empty($trajet->TRJ_ETAPE1) && empty($trajet->TRJ_ETAPE2))
                                <div class="col-sm-12">
                                    <strong>Pas d'étapes</strong></p>
                                </div>
                            @endif
                            <div class="col-sm-12">
                                <div class="glyphicon glyphicon-arrow-down"></div>
                            </div>
                            <div class="col-sm-12">
                                <p>3 • <span class="rouge"><strong>Arrivée</strong></span> : <strong>{{ $trajet->TRJ_DESTINATION}}</strong></p>
                            </div>
                            <div class="col-sm-12">
                                <p>{{ Carbon\Carbon::parse($trajet->TRJ_HEURE_DESTINATION)->format('H:i') }}</p>
                            </div>
                        </div>
                        <div class="col-sm-6" style="padding-left:20px;">
                            <div class="col-sm-12">
                                <p>Temps total du trajet : <strong>duree</strong></p>
                            </div>
                            <div class="col-sm-12">
                                <p>Places disponibles : <strong>{{ $trajet->TRJ_PLACES }}</strong></p>
                            </div>
                            <div class="col-sm-12">
                                <p>Prix demandé : <strong>{{ $trajet->TRJ_PRIX}}</strong></p>
                            </div>
                            <div class="col-sm-12">
                                <p>Flexibilité : <strong>{{ $trajet->TRJ_FLEXIBLE }}</strong></p>
                            </div>
                            <div class="col-sm-12">
                                <p>Taille des bagages : <strong>{{ $trajet->TRJ_BAGAGE}}</strong></p>
                            </div>
                            <div class="col-sm-12">
                                <hr class="hr-details">
                            </div>
                            <div class="col-sm-12">
                                <textarea class="form-control"  rows="5">{{ $trajet->TRJ_INFO}}</textarea>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-sm-6 col-sm-push-2">
                <!--<a href="#">
                        <input type="button" class="btn" value="Retour à la recherche" name="retourTrajet">
                        </a>-->
            </div>
            <div class="col-sm-6">
                <input type="submit" class="btn proposer" value="Réserver ce trajet"/>
            </div>
        </form>
        @endforeach
        @endif

        <br>

        @if (count($trajetsEtapesDepart) > 0)

        <h4>Ces Trajets font étapes à votre lieu de destination</h4>               

        @foreach ($trajetsEtapesDepart  as $trajet)
            <div class="form-horizontal form-details">

                <form class=m ethod="get" action="{{ route('details_trajet',['id' => $trajet->ID]) }}" accept-charset="UTF-8">

                    <div class="row">
                        <div class="col-sm-6" style="text-align:center;">
                            <div class="col-sm-12">
                                <p>{{ Carbon\Carbon::parse($trajet->TRJ_DATE_DEPART)->format('d-m-Y')  }}</p>
                            </div>
                            <div class="col-sm-12">
                                <p>1 • <span class="rouge"><strong>Départ</strong></span> : <strong>{{ $trajet->TRJ_DEPART }}</strong></p>
                            </div>
                            <div class="col-sm-12">
                                <p>{{ Carbon\Carbon::parse($trajet->TRJ_HEURE_DEPART)->format('H:i') }}</p>
                            </div>
                            <div class="col-sm-12">
                                <div class="glyphicon glyphicon-arrow-down"></div>
                            </div>
                            <div class="col-sm-12">
                                <p>2 • <span class="rouge"><strong>Étape(s)</strong></span> :
                            </div>
                            @if(!empty($trajet->TRJ_ETAPE1))
                                <div class="col-sm-12">
                                    <strong>{{ $trajet->TRJ_ETAPE1}} </strong></p>
                                </div>
                            @endif
                            @if (!empty($trajet->TRJ_ETAPE2))
                                <div class="col-sm-12">
                                    <strong>{{ $trajet->TRJ_ETAPE2}}</strong></p>
                                </div>
                            @endif
                            @if(empty($trajet->TRJ_ETAPE1) && empty($trajet->TRJ_ETAPE2))
                                <div class="col-sm-12">
                                    <strong>Pas d'étapes</strong></p>
                                </div>
                            @endif
                            <div class="col-sm-12">
                                <div class="glyphicon glyphicon-arrow-down"></div>
                            </div>
                            <div class="col-sm-12">
                                <p>3 • <span class="rouge"><strong>Arrivée</strong></span> : <strong>{{ $trajet->TRJ_DESTINATION}}</strong></p>
                            </div>
                            <div class="col-sm-12">
                                <p>{{ Carbon\Carbon::parse($trajet->TRJ_HEURE_DESTINATION)->format('H:i') }}</p>
                            </div>
                        </div>
                        <div class="col-sm-6" style="padding-left:20px;">
                            <div class="col-sm-12">
                                <p>Temps total du trajet : <strong>duree</strong></p>
                            </div>
                            <div class="col-sm-12">
                                <p>Places disponibles : <strong>{{ $trajet->TRJ_PLACES }}</strong></p>
                            </div>
                            <div class="col-sm-12">
                                <p>Prix demandé : <strong>{{ $trajet->TRJ_PRIX}}</strong></p>
                            </div>
                            <div class="col-sm-12">
                                <p>Flexibilité : <strong>{{ $trajet->TRJ_FLEXIBLE }}</strong></p>
                            </div>
                            <div class="col-sm-12">
                                <p>Taille des bagages : <strong>{{ $trajet->TRJ_BAGAGE}}</strong></p>
                            </div>
                            <div class="col-sm-12">
                                <hr class="hr-details">
                            </div>
                            <div class="col-sm-12">
                                <textarea class="form-control" rows="5">{{ $trajet->TRJ_INFO}}</textarea>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-sm-6 col-sm-push-2">
                <!--<a href="#">
                        <input type="button" class="btn" value="Retour à la recherche" name="retourTrajet">
                        </a>-->
            </div>
            <div class="col-sm-6">
              <input type="submit" class="btn proposer" value="Réserver ce trajet">
            </div>
        </form>
        @endforeach
        @endif
        <br>
        @if (count($trajetsEtapesDestination) > 0)

        <h4>Ces Trajets font étapes à votre lieu de départ</h4>               

        @foreach ($trajetsEtapesDestination  as $trajet)

            <div class="form-horizontal form-details">

                <form class=m ethod="get" action="{{ route('details_trajet',['id' => $trajet->ID]) }}" accept-charset="UTF-8">

                    <div class="row">
                        <div class="col-sm-6" style="text-align:center;">
                            <div class="col-sm-12">
                                <p>{{ Carbon\Carbon::parse($trajet->TRJ_DATE_DEPART)->format('d-m-Y')  }}</p>
                            </div>
                            <div class="col-sm-12">
                                <p>1 • <span class="rouge"><strong>Départ</strong></span> : <strong>{{ $trajet->TRJ_DEPART }}</strong></p>
                            </div>
                            <div class="col-sm-12">
                                <p>{{ Carbon\Carbon::parse($trajet->TRJ_HEURE_DEPART)->format('H:i') }}</p>
                            </div>
                            <div class="col-sm-12">
                                <div class="glyphicon glyphicon-arrow-down"></div>
                            </div>
                            <div class="col-sm-12">
                                <p>2 • <span class="rouge"><strong>Étape(s)</strong></span> :
                            </div>
                            @if(!empty($trajet->TRJ_ETAPE1))
                                <div class="col-sm-12">
                                    <strong>{{ $trajet->TRJ_ETAPE1}} </strong></p>
                                </div>
                            @endif
                            @if (!empty($trajet->TRJ_ETAPE2))
                                <div class="col-sm-12">
                                    <strong>{{ $trajet->TRJ_ETAPE2}}</strong></p>
                                </div>
                            @endif
                            @if(empty($trajet->TRJ_ETAPE1) && empty($trajet->TRJ_ETAPE2))
                                <div class="col-sm-12">
                                    <strong>Pas d'étapes</strong></p>
                                </div>
                            @endif
                            <div class="col-sm-12">
                                <div class="glyphicon glyphicon-arrow-down"></div>
                            </div>
                            <div class="col-sm-12">
                                <p>3 • <span class="rouge"><strong>Arrivée</strong></span> : <strong>{{ $trajet->TRJ_DESTINATION}}</strong></p>
                            </div>
                            <div class="col-sm-12">
                                <p>{{ Carbon\Carbon::parse($trajet->TRJ_HEURE_DESTINATION)->format('H:i') }}</p>
                            </div>
                        </div>
                        <div class="col-sm-6" style="padding-left:20px;">
                            <div class="col-sm-12">
                                <p>Temps total du trajet : <strong>duree</strong></p>
                            </div>
                            <div class="col-sm-12">
                                <p>Places disponibles : <strong>{{ $trajet->TRJ_PLACES }}</strong></p>
                            </div>
                            <div class="col-sm-12">
                                <p>Prix demandé : <strong>{{ $trajet->TRJ_PRIX}}</strong></p>
                            </div>
                            <div class="col-sm-12">
                                <p>Flexibilité : <strong>{{ $trajet->TRJ_FLEXIBLE }}</strong></p>
                            </div>
                            <div class="col-sm-12">
                                <p>Taille des bagages : <strong>{{ $trajet->TRJ_BAGAGE}}</strong></p>
                            </div>
                            <div class="col-sm-12">
                                <hr class="hr-details">
                            </div>
                            <div class="col-sm-12">
                                <textarea class="form-control" rows="5">{{ $trajet->TRJ_INFO}}</textarea>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-sm-6 col-sm-push-2">
                <!--<a href="#">
                        <input type="button" class="btn" value="Retour à la recherche" name="retourTrajet">
                        </a>-->
            </div>
            <div class="col-sm-6">
              <input type="submit" class="btn proposer" value="Réserver ce trajet"/>
            </div>
        </form>
        @endforeach
        @endif
    

</section>

@endif
@endsection