<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

   <?php
	
		$page = $_SERVER['REQUEST_URI'];
      	$page = str_replace("/laravel/covoiturage/public", "",$page);
	
	?>
   
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Saliege-Covoit') }}</title>
        <link rel="icon" href="{!! asset('/images/iconne.ico') !!}"/>

        <!-- Styles -->
        <!-- Bootstrap -->
        <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/style.css') }}" rel="stylesheet">

        <!-- Import police -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">

        <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
        <!-- <link rel="stylesheet" href="http://localhost/laravel/covoiturage/public/css/addresspicker/jquery.ui.all.css">-->

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script>
window.Laravel = {
!!json_encode([
        'csrfToken' => csrf_token(),
        ]) !!
}
;
        </script>

    <!--<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyC8zSQHYetf1-fRjNQCy7aYDwT4SCR2Xo0"></script>-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        <!--<script src="http://localhost/laravel/covoiturage/public/js/jquery.ui.addresspicker.js"></script>-->


    </head>

    <body>
        <div class="container-fluid">
            <header class="row">
                <div class="logo">
                    <img src="{{ asset('/images/Logo2.gif') }}">
                </div>
                <a href="{!! url( 'menu') !!}">
                    <div class="back-menu">
                        <p class="lien-menu">MENU</p>
                        <div class="glyphicon glyphicon-menu-hamburger"></div>
                    </div>
                </a>
                <div class="logo2">
                    <a href="{!! url( 'profil') !!}">
                        <img src="{{ asset(Auth::user()->logo) }}" width="50px">
                    </a>
                    <p class="prenom ">{{ Auth::user()->surname }}</p>
                    <p class="nom ">{{ Auth::user()->name }}</p>
                    <a  href="{{ route('logout') }}" onclick="event.preventDefault();
document.getElementById('logout-form').submit();" >
                        <div class="glyphicon glyphicon-off">
                        </div>
                    </a>
                    <form id="logout-form" action="{{ route( 'logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>

                </div>

                <div class="barre "></div>
            </header>
            <nav class="row ">
                <div>
                    <ul>
                        <li class="b1 <?php //if($page == "rechercher_un_trajet"){echo 'active';} ?>"><a href="{!! url( 'rechercher_un_trajet') !!} ">Rechercher un trajet</a></li>
                        <li class="b2 <?php //if($page == "mes_reservations"){echo 'active';} ?>"><a href="{!! url( 'mes_reservations') !!} ">Mes réservations</a></li>
                        <li class="b3 <?php //if($page == "proposer_un_trajet"){echo 'active';} ?>"><a href="{!! url( 'proposer_un_trajet') !!} ">Proposer un trajet</a></li>
                        <li class="b4 <?php //if($page == "mes_trajets"){echo 'active';} ?>"><a href="{!! url( 'mes_trajets') !!}">Mes trajets</a></li>
                        <li class="b5 <?php //if($page == "contact"){echo 'active';} ?>"><a href="{!! url( 'contact') !!}">Contact</a></li>
                    </ul>
                </div>
            </nav>
            <section class="row ">
                <div>

                    @yield('content')

                </div>
            </section>
            <footer class="row ">
                <div class="text-center footer ">
                    <p><a href="{!! url( 'mentions_legales') !!}">Mentions légales</a></p>
                </div>
            </footer>
        </div>

    </body>

</html>