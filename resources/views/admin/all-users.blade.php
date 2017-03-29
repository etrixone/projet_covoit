@section('content')

<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <style>
            body{
                background-color: white;
            }
            table{
                margin-left:auto; 
                margin-right:auto;
                font-style: none;
                border-collapse: collapse;
            }
            th{
                font-weight: bold;
                font-size: 16px;
            }
            tr{
                text-align:center;
            }
            tr, th, td{                
                border: 1px solid black;               
            }
            input{
                background: #f94e27;
                background-image: -webkit-linear-gradient(top, #f94e27, #dd3711);
                background-image: -moz-linear-gradient(top, #f94e27, #dd3711);
                background-image: -ms-linear-gradient(top, #f94e27, #dd3711);
                background-image: -o-linear-gradient(top, #f94e27, #dd3711);
                background-image: linear-gradient(to bottom, #f94e27, #dd3711);
                -webkit-border-radius: 12;
                -moz-border-radius: 12;
                border-radius: 12px;
                font-family: Arial;
                color: #ffffff;
                font-size: 14px;
                padding: 7px 20px;
                margin:5px;
            }
            
        </style>
    </head>
    
    <body>      
        
        <ul>          
            
            <li>
                <a href="{{url('admin/all_users')}}"> Tous </a>
            </li>
            
        <form method="post" action="{{url('admin/classe')}}">
            {{ csrf_field() }}
            <select name="cla" onchange="this.form.submit()"> 
                <option></option>
            @foreach($classes as $classe)
                <option value="{{$classe->CLS_NOM }}"> {{ $classe->CLS_NOM }} </option>
            @endforeach
            </select>
        </form>
        </ul>
        
        <ul>           
            <li>
                <a href="{{url('admin/csv_upload')}}">CSV</a>
            </li>
            <li>
                <a href="{{url('admin/all_users')}}">Liste utilisateurs</a>
            </li>
            <li>
                <a href="{{url('admin/all_trajets')}}">Liste trajets</a>
            </li>
        </ul>
        
        <table border="1">
            <tr>
                <th width="100">Identifiant</th>
                <th width="100">Classe</th>
                <th width="275">Nom & Prénom</th>
                <th width="350">Email</th>
                <th width="200">Dernière connexion</th>
                <th width="75">Statut</th>
                <th width="150">Activer/Désactiver</th>
                <th width="150">Supprimer</th>
            </tr>
            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->classe}}</td>
                <td>{{$user->name}} {{$user->surname}}</td>
                <td>{{$user->email}}</td>  
                <td>{{$user->last_connection}}</td>  
                <td>
                    @if (1==$user->enable)
                    Actif
                    @else
                    Inactif
                    @endif
                </td>  
                <td>
                    <form method="get" action="{{url('admin/status/'.$user->id)}}">
                    <input type="submit">
                    </form>
                </td>
                <td>
                    <form method="get" action="{{url('admin/delete/'.$user->id)}}">
                    <input type="submit" onclick="deleteUser()">
                    </form>
                </td>                
            </tr>
            @endforeach 
        </table>
              
    </body>    
</html>
