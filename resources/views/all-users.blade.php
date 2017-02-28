@extends('layouts.app2')

@section('content')

<html>
    <body>
        <table>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
            </tr>
            @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->surname}}</td>
                <td>{{$user->email}}</td>  
            </tr>
            @endforeach 
        </table>
    </body>
</html>

@endsection
