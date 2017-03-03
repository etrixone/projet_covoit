@extends('layouts.app2')

@section('content')

<html>
    <head>
        
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
        <table border="1">
            <tr>
                <th>Identifiant</th>
                <th>Nom & Prénom</th>
                <th>Email</th>
                <th>Dernière connexion</th>
                <th>Etat du compte</th>
                <th>Activé/Désactivé</th>
                <th>Supprimer</th>
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
    </body>
</html>

@endsection
