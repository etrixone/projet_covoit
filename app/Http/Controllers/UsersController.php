<?php

namespace App\Http\Controllers;
use DB;
use View;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function showForm()
    {   
        return view('upload');
    }
    
    public function generer_mot_de_passe()
    {
        $mot_de_passe = "";

        $chaine = "abcdefghjkmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ023456789";
        $longeur_chaine = strlen($chaine);

        for($i = 1; $i <= 6; $i++)
        {
            $place_aleatoire = mt_rand(0,($longeur_chaine-1));
            $mot_de_passe .= $chaine[$place_aleatoire];
        }

        return $mot_de_passe;   
    }
    
     public function usersList(Request $request)
    {   
        $upload=$request->file('upload_file');
        $filePath=$upload->getRealPath();
        $file=fopen($filePath, 'r');

        $array = array();
        $index = 0;

        $f = fopen($filePath, 'r');

        while($lg = fgetcsv($f,1000,';')) 
        {
            if($lg && array($lg))
            {
                $array[$index] = $lg;     
                
                $nom = $array[$index][0];
                $prenom = $array[$index][1];
                $email = $array[$index][2];

                //$param = array("name" => $nom, "surname" => $prenom, "email" => $email, "password" => $mdp_hash);
                //$requete = $conn->prepare("INSERT INTO users VALUES (:name,:surname,:email,:password)");
                //$requete->execute($param);
            }
            $index = $index + 1;
        }
        fclose($f);
        var_dump($array);
    }
}
