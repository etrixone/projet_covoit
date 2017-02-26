<?php
$path = dirname(__FILE__);
//$path = realpath($path.'/../');

$name = $_FILES['monfichier']['name'];
$chemin = $path. "/" .$name;

if($name)
{
    $array = array();
    $index = 0;

    $f = fopen($chemin, 'r');

    while($lg = fgetcsv($f,1000,';')) 
    {
        if($lg && array($lg))
        {
            $mdp = Membre::generer_mot_de_passe();
            $mdp_hash = sha2($mdp);
            
            $array[$index] = $lg;     
            
            $conn=Connexion::get();
            $nom = $array[$index][0];
            $prenom = $array[$index][1];
            $email = $array[$index][2];
            $array[$index][3] = $mdp_hash;
            
            $param = array("name" => $nom, "surname" => $prenom, "email" => $email, "password" => $mdp_hash);
            $requete = $conn->prepare("INSERT INTO users VALUES (:name,:surname,:email,:password)");
            $requete->execute($param);
        }
        $index = $index + 1;
        
    }
    fclose($f);
}
else
{
    header("Location: un.php");
}
var_dump($array);


?>