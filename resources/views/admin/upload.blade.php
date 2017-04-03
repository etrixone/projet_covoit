@section('content')

<html>
    <head>
        <style>
            input[type=file], form {
                margin: 0 auto;
                text-align: center;                
            }
            input{
                margin-top:35px;                
            }
        </style>
    </head>
    
    <body>
    <head>
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
   </head>  
   
        <form action="{{url('admin/csv_upload')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
            Importer un fichier CSV
            <input type="file" name="upload_file"/>
            <input style=""type="submit" value="Valider" name="submit"/>
        </form>
   
        <form method="get" action="{{url('admin/status')}}">
            Activer tous les utilisateurs :
                    <input type="submit" value="Activer/Désactiver tous">
        </form>
        
        <form method="get" action="{{url('admin/deleteAll')}}">
            Supprimer tous les utilisateurs :
                    <input type="submit" value="Supprimer tous">
        </form>
   
        <form method="post" action="{{url('admin/ajouterClasse')}}">
            {{ csrf_field() }}      
            Ajouter une classe :
            <input type="text" name="texte_classe">
            <input type="submit" value="Valider">
        </form>
   
        
        <form method="POST" action="{{url('admin/supprimerClasse')}}">
            {{ csrf_field() }} 
            Supprimer une classe :
                <select name="supprimerClasse"> 
                    <option></option>
                @foreach($classes as $classe)
                    <option> {{$classe->CLS_NOM}} </option>
                @endforeach
                </select>
            <input type="submit" value="Valider">
        </form>
    </body>
</html>
