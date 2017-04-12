<html>
    <head>
       
    </head>
    <body>      
        <h3>Erreur/échec lors de l'import du fichier</h1>
        <p>Vérifier que votre fichier CSV contient 4 colonnes : nom, prénom, mail, classe</p>
        <p>Vérifier que les classes inscrites dans votre fichier CSV sont présentes dans la base de données</p>
        <p>Vérifier que votre fichier CSV soit au bon format : CSV - séparateur ;</p>
        <a href="{!! url('/admin/csv_upload') !!}">Retour</a>
    </body>
</html>
