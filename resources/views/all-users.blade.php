@extends('layouts.app2')

@section('content')

<html>
    <head>
        <style>
            body{
                background-color: white;
            }
            .atoz{
                display:inline-block;
            }
            table{
                margin-left:auto; 
                margin-right:auto;
            }
            th{
                font-weight: bold;
                font-size: 16px;
            }
            table, tr, th, td{
                text-align:center;
                border-color: black; 
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
        
        <script>
            function deleteUser()
            {
                if (confirm("Etes-vous sûr de supprimer cet utilisateur?"))
                {
                    return true;
                }
                else 
                {
                   return false;
                }
            }
        </script>
        
    </head>
    <body>          
        <ul class="atoz">
            <li>
                <a href="{{url('admin/all_users')}}"> Tous </a>
            </li>
            @foreach($letters as $letter)
            <li>
                <a href="{{url('admin/getUsers/'.$letter)}}"> {{$letter}} </a>
            </li>
            @endforeach
        </ul>
        <table border="1">
            <tr>
                <th width="100">Identifiant</th>
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
                <td>{{$user->name}} {{$user->surname}}</td>
                <td>{{$user->email}}</td>  
                <td>{{$user->last_connection}}</td>  
                <td>{{$user->enable}}</td>  
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
        <form method="get" action="{{url('admin/status')}}">
                    <input type="submit" value="Activer/Désactiver tous">
        </form>
        
        <form method="get" action="{{url('admin/deleteAll')}}">
                    <input type="submit" value="Supprimer tous">
        </form>
    </body>
</html>

@endsection
