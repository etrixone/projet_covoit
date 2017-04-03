<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Covoit Saliege</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
    <!-- Import police --> 
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <style type="text/css">
        body
        {
            background:url("{{ asset('images/back-connexion1.jpg') }}") no-repeat;
            background-size:cover;
            background-position: 0 0;
            width:100%;
            /*height:100%;*/
            margin: auto;
            color:white;
            font-family: "Open Sans Condensed", Arial;
        }
        
        .form
        {
            position:absolute;
            left:50%;
            top:40%;
            width:300px;
            height:auto;
            margin-left:-150px;
            margin-top:-175px;
            border-radius:20px;
            background-color:#b42026;
            opacity: 0.8;
        }
        
        .form img
        {
            position:absolute;
            margin: auto;
            top:10px;
            left:0;
            right:0;
            padding:0px;
            width:40%;
        }
        
        form
        {
            text-align:center;
            margin-top:50%;
        }
        
        .field
        {
            border-radius:10px;
            color:black;
        }
        
        .txt1
        {
            margin-left:5%;
            margin-bottom:5%;
        }
                
        a
        {
            text-decoration:none;
            color:white;
        }
        
        a:hover
        {
            text-decoration:none;
            color:white;
        }
        
        hr
        {
            color:white;
            width:60%;
        }
        
        input {
            padding:3px;
            outline: none;
            
        }
        
        button {
            border-radius: 5px;
            margin-top: 10px;
            background-color: white;
            color: black;
            
        }
        
    </style>
</head>

<body>
  
  <div class="container-fluid">
      <div class="form">
             <img src="{{ asset('images/logo-saliegecovoit.gif') }}">
             <form action="{{ route('login') }}" method="POST">
                 {{ csrf_field() }}
             <hr>
             <h2>CONNEXION</h2>
             Email <br><input type="email" name="email" class="field" value="{{ old('email') }}" required autofocus>
             @if ($errors->has('email'))
             <span class="help-block">
                 <strong>{{ $errors->first('email') }}</strong>
             </span>
             @endif
             <br>
             Mot de passe <br><input type="password" name="password" id="password" class="field" required><br>
            <button type="submit">
                Login
            </button>
             </form><br>

          <p><a href="{{ route('password.request') }}"><span class="txt1">Mot de passe oublié ?</span></a></p>
          
      </div>
  </div>
   
   
    <!-- Bootstrap core JavaScript
  ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    
</body>
</html>