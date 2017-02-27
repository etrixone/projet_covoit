<?php

namespace App\Http\Controllers;

use DB;
use View;
use App\User;
use App\Ville;
use App\Trajet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return redirect('/home');
    }
    
    public function admin() {
        return view('admin.index');
    }

    public function home() {
        return view('home');
    }

    public function recherche(Request $request) {

        $this->validate($request, ['depart' => 'required', 'destination' => 'required']);

        return "resultat recherche";
    }

    //$recherche = DB::table('trajets')->where('depart','=',$request->input('depart'))->get();
    /* foreach ($recherche as $trajet){
      echo 'Trajet : ', $trajet->depart, '->' ,$trajet->destination, '<br/>';

      } */

    // return View::make('trajet')->with('depart', $recherche);
    // 

    public function trajet() {

        return view('proposer-trajet');
    }

    public function ajoutTrajet(Request $request) {
        $this->validate($request, ['depart' => 'required', 'destination' => 'required']);

        $depart = $this->ajoutVille($request->depart, $request->departement, $request->longitude, $request->latitude);
        $destination = $this->ajoutVille($request->destination, $request->destination_departement, $request->destination_longitude, $request->destination_latitude);

        $trajet = new Trajet;
        $trajet->vil_id_depart = $depart;
        $trajet->vil_id_arrivee = $destination;
        $trajet->trj_info = $request->info;
        $trajet->usr_id = Session::get('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d');
        $trajet->save();

         return "trajet enregistré";
    }

    public function ajoutVille($nom, $departement, $longitude, $latitude) {
        $ville = Ville::where('vil_nom', $nom)->first();
        $id = null;
        if (isset($ville)) {
            $id = $ville->vil_id;
        } else {
            $tmp = new Ville;
            $tmp->vil_nom = $nom;
            $tmp->vil_departement = $departement;
            $tmp->vil_longitude = $longitude;
            $tmp->vil_latitude = $latitude;
            $tmp->save();
            $ville = Ville::where('vil_nom', $nom)->select('vil_id')->first();
            $id = $ville->vil_id;
        }
        return $id;
    }
    
    

}
