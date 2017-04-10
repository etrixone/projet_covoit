<html>
    <head>
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
            ul{
                list-style: none;
                text-align: center;
            }
            li{
                list-style: none;
                display:inline-block;
                text-align: center;
                margin-left: 15px;
            }
            a{
                text-decoration: none;
            }
        </style>
        
        <script>
           
        </script>
        
    </head>
    <body>      
        <ul>           
            <li>
                <a href="{{url('admin/csv_upload')}}">Fonctionnalités générale</a>
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
                <th width="275">Départ</th>
                <th width="350">Arrivée</th>
                <th width="200">Date départ</th>
                <th width="150">Supprimer</th>
            </tr>
            @foreach($trajets as $trajet)
            <tr>
                <td>{{$trajet->id}}</td>
                <td>{{$trajet->TRJ_DEPART}}</td>
                <td>{{$trajet->TRJ_DESTINATION}}</td>  
                <td>{{$trajet->TRJ_DATE_DEPART}}</td> 
                <td>
                    <form method="get" action="{{url('admin/deleteTrajet/'.$trajet->id)}}">
                    <input type="submit" onclick="">
                    </form>
                </td> 
            @endforeach 
        </table>       
    </body>
</html>
