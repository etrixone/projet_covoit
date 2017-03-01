@extends('layouts.app2')

@section('content')

<html>
    <body>        
        <table border="1">
            <tr>
                <th>Identifiant</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Dernière connexion</th>
                <th>Supprimer</th>
            </tr>
            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->surname}}</td>
                <td>{{$user->email}}</td>  
                <td>{{$user->last_connection}}</td>  
                <td><a href="{{url('admin/delete/{id}')}}">Supprimer</a></td>  
            </tr>
            @endforeach 
        </table>
    </body>
</html>

@endsection
