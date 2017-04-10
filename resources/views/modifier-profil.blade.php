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

            <div class="row">
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Chien1.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Chien1.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Chien2.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Chien2.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Chien3.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Chien3.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Chien4.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Chien4.png">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Ecureuil1.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Ecureuil1.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Ecureuil2.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Ecureuil2.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Ecureuil3.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Ecureuil3.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Ecureuil4.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Ecureuil4.png">
                </div>
            </div>     
            <div class="row">
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Gorille1.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Gorille1.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Gorille2.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Gorille2.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Gorille3.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Gorille3.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Gorille4.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Gorille4.png">
                </div>
            </div>  
            <div class="row">
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Guepard1.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Guepard1.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Guepard2.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Guepard2.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Guepard3.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Guepard3.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Guepard4.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Guepard4.png">
                </div>
            </div>  
            <div class="row">
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Hippo1.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Hippo1.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Hippo2.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Hippo2.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Hippo3.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Hippo3.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Hippo4.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Hippo4.png">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Lezard1.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Lezard1.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Lezard2.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Lezard2.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Lezard3.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Lezard3.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Lezard4.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Lezard4.png">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Lion1.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Lion1.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Lion2.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Lion2.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Lion3.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Lion3.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Lion4.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Lion4.png">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Loup1.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Loup1.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Loup2.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Loup2.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Loup3.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Loup3.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Loup4.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Loup4.png">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Panda1.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Panda1.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Panda2.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Panda2.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Panda3.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Panda3.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Panda4.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Panda4.png">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Papillon1.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Papillon1.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Papillon2.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Papillon2.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Papillon3.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Papillon3.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Papillon4.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Papillon4.png">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Poisson1.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Poisson1.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Poisson2.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Poisson2.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Poisson3.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Poisson3.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Poisson4.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Poisson4.png">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Rhino1.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Rhino1.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Rhino2.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Rhino2.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Rhino3.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Rhino3.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Rhino4.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Rhino4.png">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Souris1.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Souris1.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Souris2.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Souris2.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Souris3.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Souris3.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Souris4.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Souris4.png">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Taureau1.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Taureau1.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Taureau2.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Taureau2.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Taureau3.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Taureau3.png">
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('/images/logo/Taureau4.png') }}" width="50px">
                    <input type="radio" name="logo" value="/images/logo/Taureau4.png">
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <input type="submit" class="btn modifier" value="Confirmer">
        </div>
    </form>

</section>

@endsection
