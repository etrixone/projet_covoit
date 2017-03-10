<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
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
       <div class="logo2">
          <img src="{{ asset('/images/Utilisateur2.gif') }}">
           <p class="prenom">{{ Auth::user()->surname }}</p>
           <p class="nom">{{ Auth::user()->name }}</p>
       </div>
        <!--<img src="http://localhost/laravel/covoiturage/public/images/logo3.gif" class="logo">-->
         <div class="barre"></div>
      </header>
      <nav class="row">
          <div>
              <ul>
                  <li class="b1"><a href="{!! url('rechercher') !!}">Rechercher un trajet</a></li>
                  <li class="b2"><a href="#">Mes réservations</a></li>
                  <li class="b3"><a href="{!! url('trajet') !!}">Proposer un trajet</a></li>
                  <li class="b4"><a href="#">Mes trajets</a></li>
                  <li class="b5"><a href="#">Contact</a></li>
              </ul>
          </div>
      </nav>
      <section class="row">
          <div>

               @yield('content')
    
          </div>
      </section>
      <footer class="row">
      
      </footer>
  </div>
   
</body>
</html>
