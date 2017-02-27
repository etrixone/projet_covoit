<!doctype html>
<html>
<head>
    <?php include ('head.php'); ?>
    
    <style type="text/css">
        body
        {
            background:url("images/back-connexion.jpg") top no-repeat;
            background-size:cover;
            width:100%;
            height:100%;
            margin: auto;
            color:white;
            font-family: "Open Sans Condensed", Arial;
        }
        
        .form
        {
            position:absolute;
            left:50%;
            top:50%;
            width:300px;
            height:350px;
            margin-left:-150px;
            margin-top:-175px;
            border-radius:20px;
            background-color:#b42026;
            opacity: 0.6;
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
        
    </style>
</head>

<body>
  
  <div class="container-fluid">
      <div class="form">
             <img src="images/logo-saliegecovoit.gif">
             <form action="#" method="post">
             <hr>
             <h2>CONNEXION</h2>
             Pseudo <br><input type="text" name="pseudo" class="field"><br>
             Mot de passe <br><input type="password" name="password" class="field">
             </form><br>
          <p><a href="#"><span class="txt1">Mot de passe oublié ?</span></a></p>
      </div>
  </div>
   
   
    <!-- Bootstrap core JavaScript
  ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    
</body>
</html>