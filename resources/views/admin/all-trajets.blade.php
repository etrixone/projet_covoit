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
        <table border="1">
            <tr>
                <th width="100">Identifiant</th>
                <th width="275">Départ</th>
                <th width="350">Arrivée</th>
                <th width="200">Date départ</th>
                <th width="150">Supprimer</th>
            </tr>
            @foreach($trajets as $trajet)
            <tr>
                <td>{{$trajet->TRJ_ID}}</td>
                <td>{{$trajet->VIL_NOM}}</td>
                <td>{{$trajet->VIL_NOM}}</td>  
                <td>{{$trajet->TRJ_DATE_DEPART}}</td> 
                <td>
                    <form method="get" action="{{url('admin/deleteTrajet/'.$trajet->TRJ_ID)}}">
                    <input type="submit" onclick="">
                    </form>
                </td> 
            @endforeach 
        </table>       
    </body>
</html>

@endsection
