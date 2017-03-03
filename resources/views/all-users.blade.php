@extends('layouts.app2')

@section('content')

<html>
    <head>
    </head>
    <body>    
        <table border="1">
            <tr>
                <th>Identifiant</th>
                <th>Nom & Prénom</th>
                <th>Email</th>
                <th>Dernière connexion</th>
                <th>Supprimer</th>
            </tr>
            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}} {{$user->surname}}</td>
                <td>{{$user->email}}</td>  
                <td>{{$user->last_connection}}</td>  
                <td>
                    <form method="get" action="{{url('admin/delete/'.$user->id)}}">
                    <input type="submit">
                    </form>
                </td>  
            </tr>
            @endforeach 
        </table>
    </body>
</html>

@endsection
