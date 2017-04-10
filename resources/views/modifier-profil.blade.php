@extends('layouts.app2') @section('content')    

<section class="container small-container container-profil">
    <form action="{!! url('modifier_profil') !!}" method="post" accept-charset="UTF-8">
        {!! csrf_field() !!}
        <h4><strong>Votre profil</strong></h4>

        <div class="form-profil">

            <img src="{{ asset(Auth::user()->logo) }}" class="img-profil" width="130px">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="text-center">{{ Auth::user()->surname }} {{ Auth::user()->name }}</h2>
                </div>
            </div>
            <br>
            <div class="row">
                <hr class="details-hr" style="width:390px;">
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-push-2">
                    <p class="small-text-profil">Véhicule</p>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-push-2">
                    <p><strong>Marque de la voiture :</strong></p>
                </div>
                <div class="col-sm-4">
                    <p>
                        <select class="form-control input-sm" id="marque" name="marque" style="width:180px;">
                            @foreach($marques as $marque)
                            <option value="{{ $marque->MRQ_NOM }}">{{ $marque->MRQ_NOM }}</option>
                            @endforeach
                        </select>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-push-2">
                    <p><strong>Couleur de la voiture :</strong></p>
                </div>
                <div class="col-sm-4">
                    <p>
                        <select class="form-control input-sm" id="couleur" name="couleur" style="width:180px;">
                            @foreach($couleurs as $couleur)
                            <option value="{{ $couleur->CLR_NOM }}">{{ $couleur->CLR_NOM }}</option>
                            @endforeach
                        </select>
                    </p>
                </div>
            </div>
            <div class="row">
                <hr class="details-hr" style="width:390px; margin-top:30px;">
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-push-2">
                    <p class="small-text-profil">Autres caractéristiques</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-push-2">
                    <p><strong>Fumeur</strong> : <input type="radio" name="fumeur" value="1"> Oui <input type="radio" name="fumeur" value="0" checked="checked"> Non</p>
                </div>
                <div class="col-sm-6">
                    <p><strong>Animaux</strong> : <input type="radio" name="animaux" value="1"> Oui <input type="radio" name="animaux" value="0" checked="checked"> Non</p>
                </div>
            </div>

        </div>
        <div class="col-sm-6">
            <input type="submit" class="btn modifier" value="Confirmer">
        </div>
    </form>

    
    <form action="{!! url('modifier_logo') !!}" method="post" accept-charset="UTF-8">
        {!! csrf_field() !!}
        
        
        <div class="form-profil">


            <div class="row">
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Aigle1.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Aigle1.png" checked="checked">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Aigle2.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Aigle2.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Aigle3.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Aigle3.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Aigle4.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Aigle4.png">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Cerf1.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Cerf1.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Cerf2.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Ce2rf.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Cerf3.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Cerf3.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Cerf4.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Cerf4.png">
                </div>
            </div>


            <div class="row">
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Chat1.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Chat1.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Chat2.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Chat2.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Chat3.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Chat3.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Chat4.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Chat4.png">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Cheval1.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Cheval1.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Cheval2.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Cheval2.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Cheval3.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Cheval3.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Cheval4.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Cheval4.png">
                </div>
            </div>
        </div>
            <div class="col-sm-6">
                <input type="submit" class="btn modifier" value="Confirmer">
            </div>
    </form>

            </section>

            @endsection
