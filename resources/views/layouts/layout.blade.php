<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Covoit Saliege</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>
    
     <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap -->
    <link href="http://localhost/laravel/covoiturage/public/css/bootstrap.css" rel="stylesheet">
    <link href="http://localhost/laravel/covoiturage/public/css/style.css" rel="stylesheet">
    
    <!-- Import police --> 
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- source pour autocompletion google-->
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyC8zSQHYetf1-fRjNQCy7aYDwT4SCR2Xo0"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="http://localhost/laravel/covoiturage/public/js/jquery.ui.addresspicker.js"></script>
    <link rel="stylesheet" href="http://localhost/laravel/covoiturage/public/css/addresspicker/jquery.ui.all.css">
</head>

<body>
  <div class="container-fluid">
      <header class="row">
        <!--<img src="http://localhost/laravel/covoiturage/public/images/logo3.gif" class="logo">-->
         <div class="barre"></div>  
          <div class="col-md-12">
              
          </div>
      </header>
      <nav class="row">
          <div class="col-md-12">
              <ul>
                  <li class="b1"><a href="#">Rechercher un trajet</a></li>
                  <li class="b2"><a href="#">Mes réservations</a></li>
                  <li class="b3"><a href="#">Proposer un trajet</a></li>
                  <li class="b4"><a href="#">Mes trajets</a></li>
                  <li class="b5"><a href="#">Contact</a></li>
              </ul>
          </div>
      </nav>
      <section class="row">
          <div class="col-md-12">

               @yield('content')
          </div>
      </section>
      <footer class="row">
          <div class="col-md-12">
              <div class="barre-footer"></div>
          </div>
      </footer>
  </div>
   
   
    <!-- Bootstrap core JavaScript
  ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    
</body>
</html>